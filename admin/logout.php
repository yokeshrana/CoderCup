<?php

require_once ('../includes/bootstrap.php');
unset($_SESSION['admin']);
session_destroy();

header('Location:../login.php?action=logout');

?>