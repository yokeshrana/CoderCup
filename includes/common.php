<?php
/* Includes all common functions to be used throughout the application */

session_start();

function isAdminLoggedIn()
{
    return isset($_SESSION['admin']) && $_SESSION['admin']==true;
}

function isLoggedin()
{
    return isset($_SESSION['username']) ;
}

function dbConnect()
{
    include('params.php');
    return mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);
}

function setFirstStampForUser($con, $username){
    $timestamp = date('Y-m-d H:i:s');
    $sql = "SELECT value from settings WHERE param = 'isOnline'";
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result)>0)
    {
        $row= mysqli_fetch_assoc($result);
        if($row['timestarted']==0)
        {
            $sql = "UPDATE users SET timeStarted='1', firststamp='{$timestamp}' WHERE username = '{$username}'";
            mysqli_query($con, $sql);
        }
    }

}
function getRemTimeForUser($con, $username)
{
    $currentTimestamp = strtotime(date('Y-m-d H:i:s'));
    $firststamp = null;
    $sql = "SELECT firststamp from users WHERE username = '{$username}'";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result)>0) {
        $row = mysqli_fetch_assoc($result);
        $firststamp = $row['firststamp'];
    }

    $firststamp = strtotime($firststamp);

    return $firststamp+(getContestTimelimit($con)*60) - $currentTimestamp;
}

function getContestTimelimit($con)
{
    $defaultTimelimit = 120; //in minutes

    $sql = "SELECT value from settings WHERE param = 'timelimit'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $timelimit = $row['value'];
    } else //the parameter is not present
    {
        $timelimit = $defaultTimelimit;
        $sql = "INSERT INTO settings(param, value) VALUES('timelimit', '"."$timelimit')";
        mysqli_query($con, $sql);
    }

    return $timelimit;
}

function isContestOnline($con)
{
    $defaultOnlineStatus = 0;
    $sql = "SELECT value from settings WHERE param = 'isOnline'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
       $onlineStatus = $row['value'];
    } else //the parameter is not present
    {
        $onlineStatus = $defaultOnlineStatus;
        $sql = "INSERT INTO settings(param, value) VALUES('isOnline', '"."$onlineStatus')";
        mysqli_query($con, $sql);
    }

    return $onlineStatus;
}
function setContestOnline($con)
{
    $sql = "UPDATE settings SET value='1' WHERE param = 'isOnline'";
    mysqli_query($con, $sql);
}
function setContestOffline($con)
{
    $sql = "UPDATE settings SET value='0' WHERE param = 'isOnline'";
    mysqli_query($con, $sql);
}

function unifyEOL($text) //unifies line endings so that it won't result in problems for different platforms
{
    $s1 = str_replace("\n\r", "\n", $text);
    return str_replace("\r", "", $s1);

}

function shortenText($text)
{
    $shortenLength = 150;

    if (strlen($text)>$shortenLength)
    {
        return substr($text, 0, $shortenLength).'...';
    }
    else return $text;

}


?>