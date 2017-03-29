<?php
/*  Script for checking and evaluating code after it has been submitted
    This script will redirect the code to the compiler server
*/

require_once('includes/bootstrap.php');

$con = dbConnect();

//$query = "SELECT * FROM prefs";
//$result = mysql_query($query);
//$accept = mysql_fetch_array($result);
//$query = "SELECT status FROM users WHERE username='".$_SESSION['username']."'";
//$result = mysql_query($query);
//$status = mysql_fetch_array($result);
//if (!preg_match("/^[^\\/?* :;{}\\\\]+\\.[^\\/?*: ;{}\\\\]{1,4}$/", $_POST['filename']))
//    header("Location: solve.php?ferror=1&id=".$_POST['id']); // invalid filename
//// check if the user is banned or allowed to submit and SQL Injection checks

if(is_numeric($_POST['id'])) {
    $solutionCode = mysqli_real_escape_string($con, $_POST['solution_code']);
    //die($solutionCode);
    $filename = mysqli_real_escape_string($con, $_POST['filename']);
    $language = mysqli_real_escape_string($con, $_POST['language']);
    //check if entries are empty

        if($_POST['submissionType']=='new')
            // add to database if it is a new submission
            $query = "INSERT INTO `submissions` ( `problem_id` , `username`, `solution`, `filename`, `lang`) VALUES ('".$_POST['id']."', '".$_SESSION['username']."', '".$solutionCode."', '".$filename."', '".$language."')";
        else {
            // update database if it is a re-submission
            $tmp = "SELECT attempts FROM submissions WHERE (problem_id='".$_POST['id']."' AND username='".$_SESSION['username']."')";
            $result = mysqli_query($con, $tmp);
            $fields = mysqli_fetch_assoc($result);
            $query = "UPDATE submissions SET lang='".$language."', attempts='".($fields['attempts']+1)."', solution='".$solutionCode."', filename='".$filename."' WHERE (username='".$_SESSION['username']."' AND problem_id='".$_POST['id']."')";
        }
        mysqli_query($con, $query);

        //Start a connection to the Java Compiler Service running on some host

        $socket = fsockopen($compHost, $compPort);

        if($socket) {

            fwrite($socket, $_SESSION['username']."\n");//adding username functionality 
            fwrite($socket, $_POST['filename']."\n"); //Writing to the compiler socket the name of source file
            $query = "SELECT time, input, output FROM problems WHERE id='".$_POST['id']."'";
            $result = mysqli_query($con, $query);
            $fields = mysqli_fetch_assoc($result);
            fwrite($socket, $fields['time']."\n");
            $solution = str_replace("\n", '$_n_$', unifyEOL($_POST['solution_code']));
            fwrite($socket, $solution."\n");
            $input = str_replace("\n", '$_n_$', unifyEOL($fields['input']));
            fwrite($socket, $input."\n");
            fwrite($socket, $language."\n");
            $status = fgets($socket);
            $contents = "";
            while(!feof($socket))
                $contents = $contents.fgets($socket);
            if($status == 0) {
                // Case of compilation error
                $query = "UPDATE submissions SET statusCode=1 WHERE (username='".$_SESSION['username']."' AND problem_id='".$_POST['id']."')";
                mysqli_query($con, $query);
                $_SESSION['CompilationError'] = trim($contents);
                header("Location: submit.php?CompilationError=1&id=".$_POST['id']);
            } else if($status == 1) {
                //Some true output received from the server

                if(trim($contents) == trim(unifyEOL($fields['output']))) {//done to ensure that the field matches with output
                    // the expected output matched with the actual output
                    $query = "UPDATE submissions SET statusCode=2 WHERE (username='".$_SESSION['username']."' AND problem_id='".$_POST['id']."')";
                    mysqli_query($con, $query);
                    header("Location: index.php?success=1");
                } else {
                    // Output mismatch => Wrong Answer
                    $query = "UPDATE submissions SET statusCode=1 WHERE (username='".$_SESSION['username']."' AND problem_id='".$_POST['id']."')";
                    mysqli_query($con, $query);
                    header("Location: submit.php?WAError=1&id=".$_POST['id']);
                }
            } else if($status == 2) {
                //Time limit exceeded
                $query = "UPDATE submissions SET statusCode=1 WHERE (username='".$_SESSION['username']."' AND problem_id='".$_POST['id']."')";
                mysqli_query($con, $query);
                header("Location: submit.php?TleError=1&id=".$_POST['id']);
            }
        } else
            header("Location: submit.php?ServerError=1&id=".$_POST['id']); // compiler server not running
}
?>
