<?php

require_once ('includes/bootstrap.php');

//if(!isLoggedin())
//    header('location:login.php');

include ('header.php');

$con = dbConnect();

if(isset($_GET['success']))
    echo("<div class=\"alert alert-success\">\nCongratulations! You have solved the problem successfully.\n</div>");
?>
Below is a list of available problems for you to solve.<br/><br/>
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
//            $sql = "SELECT status FROM submissions WHERE (username='".$_SESSION['username']."' AND problem_id='".$row['sl']."')";
//            $res = mysqli_query($con,$sql);
            $tag = "";
//            // decide the attempted or solve tag
//            if(mysqli_num_rows($res) !== 0) {
//                $r = mysqli_fetch_assoc($res);
//                if($r['status'] == 1)
//                    $tag = " <span class=\"label label-warning\">Attempted</span>";
//                else if($r['status'] == 2)
//                    $tag = " <span class=\"label label-success\">Solved</span>";
//            }
            if(isset($_GET['id']) and $_GET['id']==$row['sl']) {
                $selected = $row;
                echo("<li class=\"active\"><a href=\"#\">".$row['title'].$tag."</a></li>\n");
            } else
                echo("<li><a href=\"submit.php?id=".$row['id']."\">".$row['title'].$tag."</a></li>\n");
        }
    }
    ?>
</ul>
