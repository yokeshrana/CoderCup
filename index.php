<?php

require_once ('includes/bootstrap.php');

//if(!isLoggedin())
//    header('location:login.php');

include ('header.php');

$con = dbConnect();

if(isset($_GET['success']))
    echo("<div class=\"alert alert-success\">\nCongratulations! Your code has been submitted\n</div>");
?>
Problems<br/><br/>
<ul class="nav nav-list">
    <li class="nav-header">AVAILABLE PROBLEMS</li>
    <?php
    // list all the problems from the database
    $query = "SELECT * FROM problems";
    $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result)==0)
        echo("<li>None</li>\n"); // no problems are there
    else {
        while($row = mysqli_fetch_assoc($result)) {
            if(isset($_GET['id']) and $_GET['id']==$row['sl']) {
                $selected = $row;
                echo("<li class=\"active\"><a href=\"#\">".$row['title'].$tag."</a></li>\n");
            } else
                echo("<li><a href=\"submit.php?id=".$row['id']."\">".$row['title'].$tag."</a></li>\n");
        }
    }
    ?>
</ul>

<?php include ('footer.php'); ?>
