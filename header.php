<?php
$_SESSION['username']='ssinghmy';

?>


<html>

<head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <style>
        body {
            font-family: "Lato", sans-serif;
            min-width: 1400px;
            background-color: #ff6599;
            //color:#fff;
        }

        .sidenav {
            display:block;
            float: left;
            height: 100%;
            width: 230px;
            position: fixed;
            /*z-index: 1;*/

            background-color: #1d2731;
            /*overflow-x: hidden;*/
            /*transition: 0.5s;*/
            padding-top: 160px;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            margin-bottom:7px;
            text-decoration: none;
            font-size: 18px;
            color: #e4dddd;
            border-bottom: 1px solid #736868;
            display: block;
            transition: 0.3s
            width:100%;
        }

        .sidenav a:hover, .offcanvas a:focus {
            color: #bfb1be;
        }


        .main-container{
            display: inline-block;
            padding-left: 20px;
            margin-top: 70px;
            margin-left:250px;
        }
    </style>
</head>

<body>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner" style="background-color: #1d2731">
        <div class="container" >
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="#"><-- CoderCup ---></a>

            <button class="btn-danger" style="float: right; margin:0; padding: 9px;">Logout</button>
            <span class="lead" style="float: right; margin-right:10px;"><?php echo $_SESSION['username'];?></span>
        </div>
    </div>
</div>
<div>
    <div class="sidenav">
        <!--    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>-->
        <a href="#">Problems</a>
        <a href="#">Submissions</a>
        <a href="#">Scoreboard</a>
    </div>

    <div class="main-container">


