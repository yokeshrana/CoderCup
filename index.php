<?php

require_once('includes/bootstrap.php');



include('header.php');

if (isset($_GET['success']))
    echo("<div class=\"alert alert-success\">\nCongratulations! Your code has been submitted\n</div>");
?>

<div class="cards-container" style="margin-right:100px">
    <div class="collapsible-header purple darken-4 z-depth-5 white-text"><b>AVAILABLE PROBLEMS &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTime-remaining :<span id="timer_text">2:00</span></b></div>
    <br>

<!--    Start Listing All problems-->
  <div  ></div>

    <?php
    $query = "SELECT * FROM problems";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) == 0)
        echo(" <div class=\"card-panel\">None</div>"); // no problems are there
    else {
        while ($row = mysqli_fetch_assoc($result)) {
//            echo("<li><a href=\"submit.php?id=" . $row['id'] . "\">" . $row['title'] . $tag . "</a></li>\n");
            $url = "submit.php?id=".$row['id'];
            $text = htmlentities(shortenText($row['text']));

            //Determine whether the problem has been solved or just attempted for this user
            $sql = "SELECT statusCode FROM submissions WHERE (username='".$_SESSION['username'].
                "' AND problem_id='".$row['id']."')";
            $res = mysqli_query($con, $sql);
            $status = "";
            // decide the attempted or solve tag
            if(mysqli_num_rows($res) !== 0) {
                $res = mysqli_fetch_assoc($res);
                if($res['statusCode'] == 1)
                    $status = " <span class=\"custom-label-status-attempted\">Attempted</span>";
                else if($res['statusCode'] == 2)
                    $status = " <span class=\"custom-label-status-solved\">Solved</span>";
            }
            else
                $status = "<span class=\"custom-label-status-nattempted\">Not Attempted</span>";


            echo "
    <div class=\"card indigo darken-1 z-depth-4 white-text\" style=\"box-shadow: grey 10px 9px 3px;margin-bottom:30px;\">
        <div class=\"card-content\">
        <a href=\"{$url}\" target='_blank'>
            <span class='card-title white-text'>
                {$row['title']}
            </span>
        </a>
        <hr>
            <p>{$text}</p>
        </div>
        <div class=\"card-action grey lighten-3\">
            <a href=\"{$url}\" target='_blank' class='blue-text text-darken-4'>Click to solve this</a>
            <a class=\"right\">{$status}</a>
        </div>


    </div>
            ";
        }
    }
    ?>
    </ul>
</div>

<script type="text/javascript" >
var timeoutHandle;
//DEFINING OF SESSION REMAINING !!!!
function timelimit(minutes) {
    var seconds = 60;
    var mins = minutes;
    function update() {
        var counter = document.getElementById("timer_text");
        var current_minutes = mins-1
        seconds--;
        counter.innerHTML =current_minutes.toString() + ":" + (seconds < 10 ? "0" : "") + String(seconds);
        if( seconds > 0 ) {
            timeoutHandle=setTimeout(update, 1000);
        } else {
            if(mins > 1){
               setTimeout(function () { timelimit(mins - 1); }, 1000);
            }
        }
    }
    //UPDATE METHOD TO UPDATE AT REGULAR INTERVALS
    update();
}
timelimit(Math.floor(<?php echo getRemTimeForUser($con, $_SESSION['username']); ?>/60));
</script>

<?php include('footer.php'); ?>
