<?php
if (!isAdminLoggedIn())
    header('Location:../login.php?error=admin');

$con = dbConnect();
?>

<html>
<head>
    <title>Admin-CoderCup</title>
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" href="../css/materialize.min.css">

    <style>
        body{
            background: #abbaab; /* fallback for old browsers */
            background: -webkit-linear-gradient(to left, #180000 , #080000 ); /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to left, #180000 , #080000 ); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }
        .main-container{
            margin:0 200px;
            padding:20px 30px;

        }
        .left-input-detail{
            margin-top:10px;
            font-weight: bold;

        }
        input::-webkit-input-placeholder {
            color: #2d5bff !important;
        }

        input:-moz-placeholder { /* Firefox 18- */
            color: red !important;
        }

        input::-moz-placeholder { /* Firefox 19+ */
            color: red !important;
        }

        input:-ms-input-placeholder {
            color: red !important;
        }

        input{
            height:40px !important;
        }
    </style>
</head>

<body>
<div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper blue-grey darken-3">
            <a href="#" class="brand-logo text-black"
               style="font-family: mono, sans-serif">&nbsp&lt/Admin&gt</span></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="index.php">Contest Settings</a></li>
                <li><a href="problems.php">Problems</a></li>
                <li><a href="teams.php">Teams</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </div>
    </nav>
</div>
