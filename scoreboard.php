<?php
require_once('includes/bootstrap.php');
include('header.php');

?>
<div class="custom-table-container">
    <p align="center" style="font-size:25px; color: #2c2c2c">Scoreboard</p>
    <hr>
    <table class="bordered centered">
        <thead>
        <tr class="grey darken-1 white-text">
            <th data-field="title">Name</th>
            <th data-field="attempts">Solved-problems</th>

        </tr>
        </thead>


        <?php
        $query = "SELECT username,COUNT(problem_id) as solved  FROM submissions where statusCode=2  GROUP BY username ORDER BY COUNT(problem_id) DESC";
        $results = mysqli_query($con, $query);
        if ($results->num_rows > 0) {
    while($row = $results->fetch_assoc()) {
        echo "<tr> <td> ".$row["username"]."</td> <td> " .$row["solved"]."</td> </tr>";
    }
} else {
    echo "0 results";
}

        ?>




        <tbody>
  </div>
