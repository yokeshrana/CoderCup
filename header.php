<?php
$title = '';
?>
<html xmlns="http://www.w3.org/1999/html">

<head>
    <title>CoderCup</title>
    <link href="css/materialize.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <!--    <link href="css/bootstrap-responsive.css" rel="stylesheet">-->
    <style>
        body {
            font-family: "Lato", sans-serif;
            min-width: 1400px;
        / / background-color: #ff6599;
        / / color: #fff;

            background: #abbaab; /* fallback for old browsers */
            background: -webkit-linear-gradient(to left, #abbaab, #ffffff); /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to left, #abbaab, #ffffff); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }

        .sidenav {
            display: block;
            float: left;
            height: 100%;
            width: 250px;
            position: fixed;
            /*z-index: 1;*/

            background-color: #1d2731;
            /*overflow-x: hidden;*/
            /*transition: 0.5s;*/
            padding-top: 160px;
            box-shadow: grey 15px 2px 10px;

        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            margin-bottom: 7px;
            text-decoration: none;
            font-size: 18px;
            color: #e4dddd;
            border-bottom: 1px solid #736868;
            display: block;
            transition: 0.3s
            width: 100%;

        }

        .sidenav a:hover, .offcanvas a:focus {
            color: #bfb1be;
        }

        .main-container {
            display: inline-block;
            padding-left: 20px;
            margin-top: 10px;
            margin-left: 320px;
            width: 800px;
        }
    </style>
</head>

<body>
<div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper blue-grey darken-3">
            <a href="#!" class="brand-logo text-black"
               style="font-family: mono, sans-serif">&nbsp&lt/CoderCup&gt</span></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="#">Logged in as : <?php echo $_SESSION['username']; ?></a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </div>
    </nav>
</div>
<div>
    <div class="sidenav z-depth-5">
        <!--    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>-->
        <a href="index.php">Problems</a>
        <a href="submissions.php">Submissions</a>
        <a href="#">Scoreboard</a>
    </div>

    <div class="main-container">


