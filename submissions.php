<?php

require_once('includes/bootstrap.php');

//if(!isLoggedin())
//    header('location:login.php');

include('header.php');

$con = dbConnect();

?>

<div class="custom-table-container">
    <p align="center" style="font-size:25px; color: #2c2c2c">Submissions</p>
    <hr>
    <table class="bordered centered">
        <thead>
        <tr class="grey darken-1 white-text">
            <th data-field="title">Problem</th>
            <th data-field="attempts">Attempts</th>
            <th data-field="status">Status</th>
        </tr>
        </thead>
        <tbody>

<!-- Details of all submissions-->
        <?php
        $query = "SELECT problem_id, statusCode, attempts FROM submissions WHERE username='".$_SESSION['username']."'";
        $results = mysqli_query($con, $query);
            while($row = mysqli_fetch_assoc($results)) {
            $sql = "SELECT title FROM problems WHERE id=".$row['problem_id'];
            $res = mysqli_query($con, $sql);
            if(mysqli_num_rows($res) != 0) {
            $field = mysqli_fetch_assoc($res);

                if($row['statusCode']==1) $status = '<span class="custom-label-status-nattempted">Attempted</span>';
                else if($row['statusCode']==2) $status = '<span class="custom-label-status-solved">Solved</span>';
                $url = "submit.php?id=".$row['problem_id'];

                echo "
                <tr>
                    <td><a href=\"{$url}\" style='font-size: 18px; color:darkblue'> {$field['title']} </a></td>
                    <td>{$row['attempts']}</td>
                    <td>$status</td>
                </tr>
                ";
            }
            }
        ?>

        </tbody>
    </table>
</div>
