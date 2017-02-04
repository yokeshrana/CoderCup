<?php
/**
 * Created by PhpStorm.
 * User: fragger
 * Date: 2/4/17
 * Time: 9:37 PM
 */

session_destroy();
header('Location:login.php?action=logout');

?>