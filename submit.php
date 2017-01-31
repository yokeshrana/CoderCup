<?php

require_once('includes/bootstrap.php');

//if(!isLoggedin())
//    header('location:login.php');

include('header.php');


if (isset($_GET['TleError'])) {
    echo("<div class=\"alert alert-warning\">\nTime limit exceeded!\n</div>");
}
if (isset($_GET['CompilationError'])) {
    echo("<div class=\"alert alert-error\">\n<strong>Compilation Errors:</strong>
<br/>\n<pre>\n" . $_SESSION['CompilationError'] . "\n</pre>\n</div>");

} else if (isset($_GET['WAError'])) {
    echo("<div class=\"alert alert-error\">\nWrong Answer!\n</div>");

} else if (isset($_GET['ServerError'])) {
    echo("<div class=\"alert alert-error\">\nFailed to reach compiler socket!\n</div>");

}

$con = dbConnect();
?>

<h1>
    <small>Submit Solution</small>
</h1>

<?php
// display the problem statement
if (isset($_GET['id']) and is_numeric($_GET['id'])) {
    $query = "SELECT * FROM problems WHERE id='" . $_GET['id'] . "'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    include('markdown.php');
    $out = $row['text'];
    echo("<hr/>\n<h1>" . $row['title'] . "</h1>\n");
    echo($out);
    ?>
    <br/><span class="label label-info">Time Limit: <?php echo($row['time'] / 1000); ?> seconds</span>
    <hr/>
    <?php
    // get the peviously submitted solution if exists
    if (is_numeric($_GET['id'])) {
        $query = "SELECT * FROM submissions WHERE (problem_id='" . $_GET['id'] . "' AND username='" . $_SESSION['username'] . "')";
        $result = mysqli_query($con, $query);
        $num = mysqli_num_rows($result);
        $fields = mysqli_fetch_assoc($result);
    }
    ?>
    <form class="form" method="post" action="postsubmit.php">
        <?php if ($num == 0)
            echo('<input type="hidden" name="submissionType" value="new"/>');
        else
            echo('<input type="hidden" name="submissionType" value="change"/>');
        ?>
        <input type="hidden" name="id" value="<?php if (is_numeric($_GET['id'])) echo($_GET['id']); ?>"/>

        <div class="btn-group">
            <div id="blank"></div>
            <b>Language</b> : <select name="language">
                <option value="c">C</option>
                <option value="cpp">C++</option>
                <option value="java">Java</option>
                <option value="python">Python</option>
            </select>
        </div>
        <br/>
        <div>
            Filename: <input style="height: 27px;" type="text" id="filename" name="filename"
                             value="<?php if (!($num == 0)) echo($fields['filename']); ?>"/>
        </div>
        <br/><b>Paste your program below:</b><br/><br/>
        <textarea style="font-family: mono; height:400px;" class="span9" name="solution_code"
                  id="text"><?php if (!($num == 0)) echo($fields['solution']); ?></textarea><br/>

        <input type="submit" value="Submit" class="btn btn-danger">

    </form>
    <?php
}
?>
</div> <!-- /container -->
