<?php

require_once('includes/bootstrap.php');

//if(!isLoggedin())
//    header('location:login.php');

include('header.php');


if (isset($_GET['TleError'])) {
    echo("<div class=\"alert alert-warning\">\nTime limit exceeded!! Optimize Ur Code!!\n</div>");
}
if (isset($_GET['CompilationError'])) {
    echo("<div class=\"alert alert-error\">\n<strong>Compilation Errors:</strong>
<br/>\n<pre>\n" . $_SESSION['CompilationError'] . "\n</pre>\n</div>");

} else if (isset($_GET['WAError'])) {
    echo("<div class=\"alert alert-error\">\nWrong Answer!\n</div>");

} else if (isset($_GET['ServerError'])) {
    echo("<div class=\"alert alert-error\">\nFailed to reach compiler socket Contact Administrator!\n</div>");

}

$con = dbConnect();
?>

<div class="card">
    <div class="card-content z-depth-5" style="padding-left:30px">
    <span class="card-title blue-text text-darken-4">Submit Your Code</span>

    <?php
    // display the problem statement
    if (isset($_GET['id']) and is_numeric($_GET['id']))
    {
        $query = "SELECT * FROM problems WHERE id='" . $_GET['id'] . "'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        include('markdown.php');
        $out = $row['text'];
        echo("<hr/>\n<h4>" . $row['title'] . "</h4>");
        ?>
        <span class="time-limit right">Time Limit: <?php echo($row['time'] / 1000); ?> seconds</span>
        <br>
        <?php
        echo($out);
        ?>
        <br>
        <br>
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

            <div class="row">
                <div class="input-field col s6">
                    <b>Filename</b> <input style="height: 27px;" required type="text" id="filename" name="filename"
                                           value="<?php if (!($num == 0)) echo($fields['filename']); ?>"/>

                </div>
                <div class="input-field col s6">

                <?php
                        $query="Select language from users where username='".$_SESSION['username']."'";
                         $result=mysqli_query($con,$query);
                         $row=mysqli_fetch_assoc($result);
                         $lang=$row['language'];

                 ?>


                    <b>Language</b>
                    <select class="browser-default" name="language">
                        <option <?php if($lang==1)echo" selected='selected' " ;?> value="c">C</option>
                        <option <?php if($lang==2)echo" selected='selected' " ;?>value="cpp">C++</option>
                        <option <?php if($lang==3)echo" selected='selected' " ;?>value="java">Java </option>
                        <option <?php if($lang==4)echo" selected='selected' " ;?>value="python">Python</option>

                    </select>

                </div>
            </div>

            <b>Paste your program below:</b><br/>
            <textarea style="font-family: mono; font-size: 14px;height:350px; padding: 10px" name="solution_code"
                      id="text"><?php if (!($num == 0)) echo($fields['solution']); ?></textarea><br/>
            </br>
            <input type="submit" value="Submit" class="btn-flat teal darken-3 white-text">


        </form>
        </div>
</div>
<?php
}
?>
<?php include('footer.php'); ?>
