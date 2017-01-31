<?php
/* Includes all common functions to be used throughout the application */

session_start();

function isLoggedin()
{
    return isset($_SESSION['username']);
}

function dbConnect()
{
    include('params.php');
    return mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);
}

function unifyEOL($text) //unifies line endings so that it won't result in problems for different platforms
{
    $s1 = str_replace("\n\r", "\n", $text);
    return str_replace("\r", "", $s1);

}


?>