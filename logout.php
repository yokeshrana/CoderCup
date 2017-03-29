<?php

require_once ('includes/bootstrap.php');
unset($_SESSION['username']);
session_destroy();

header('Location:login.php?action=logout');

?>