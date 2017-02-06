<?php
require_once('includes/bootstrap.php');

if (isLoggedin()) {
    header('Location:index.php');
    die();
} else if (isset($_POST['username']) && isset($_POST['password'])) {

    $con = dbConnect();
    $username = mysqli_real_escape_string($con, trim($_POST['username']));
    $password = mysqli_real_escape_string($con, trim($_POST['password']));

    if(!isContestOnline($con) && $username!='admin')
    {
        header('location:login.php?error=contestoff');
        die();
    }


    $sql = "SELECT username FROM users WHERE username='" . $username . "' AND password='" . $password . "'";

    $result = mysqli_query($con, $sql);

    echo mysqli_error($con);

    if (mysqli_num_rows($result) > 0) {
        if ($username == 'admin') //If admin tried logging in
        {
            $_SESSION['admin'] = true;
            header('Location:admin/index.php');
        } else {
            $_SESSION['username'] = $username;
            setFirstStampForUser($con, $username);
            header('Location:index.php?welcome=1');
        }
    } else //Login details did not match
    {
        if ($username == 'admin')
            header('Location:login.php?error=admin');
        //echo($sql); die($result);
        else
            header('Location:login.php?error=invalid');
    }

}

?>

<html>
<head>
    <title>CoderCup-Login</title>
    <link rel="stylesheet" href="css/materialize.min.css">
    <style>
        body {
            background: #649173; /* fallback for old browsers */
            background: -webkit-linear-gradient(to left, #649173, #DBD5A4); /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to left, #649173, #DBD5A4); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

        }

        .heading-container {
            margin: auto;
            margin-top: 100px;
            width: 400px;
            background-color: #3e4a6a;
            padding: 2px 10px;
            border-radius: 8px 8px 0 0;
            box-shadow: grey 12px 12px 6px;
        }

        .main-container {
            margin: auto;
            margin-top: 15px;
            width: 400px;
            padding: 10px;
            background-color: #e5dde4;
            min-height: 300px;
            border-radius: 0 0 8px 8px;
            box-shadow: grey 12px 12px 6px;
        }

        .alert {
            color: darkgreen;
            width: 100%;
            text-align: center;
            font-weight: bold;
        }

        .alert-warn {
            width: 100%;
            text-align: center;
            color: darkred;
            font-weight: bold;
        }

        .form-container {
            margin: 40px 80px;
        }

        .input-field input{
            margin-bottom:2px;
        }

        .footer {
            position: absolute;
            bottom: 3px;
            width: 100%;
            margin: auto;
            text-align: center;
            color: whitesmoke;
            background-color: #2c2c2c;
        }

        input {
            padding: 3px !important;
            padding-left: 8px !important;
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


    </style>
</head>

<body>
<div class="heading-container">
    <h5 align="center" style="color:white;font-family: mono, sans-serif">&lt/CoderCup&gt Login</h5>
</div>
<div class="main-container">
    <div class="alert-warn">
        <?php
        if (isset($_GET['error']) && $_GET['error'] == 'contestoff')
            echo 'Contest is offline. Try later!';
        if (isset($_GET['error']) && $_GET['error'] == 'invalid')
            echo 'Incorrect Credentials!';
        else if (isset($_GET['error']) && $_GET['error'] == 'unauthorized')
            echo 'Login First!';
        else if (isset($_GET['error']) && $_GET['error'] == 'admin')
            echo 'Admin Se Mazak Nahi Bhai!';
        ?>
    </div>
    <div class="alert">
        <?php
        if (isset($_GET['action']) && $_GET['action'] == 'logout')
            echo 'Logged Out Successfully!';
        ?>
    </div>
    <div class="form-container">
        <form class="col s12" action="login.php" method="post">
            <div class="input-field">
                <input class="browser-default" type="text" placeholder="Username" name="username">
            </div>
            <div class="input-field">
                <input class="browser-default" type="password" placeholder="Password"
                       name="password">
            </div><br>
            <button class="btn-flat indigo darken-1 white-text right">Login</button>


        </form>
    </div>
</div>
<div class="footer">Shashank Singh, Yokesh Rana - 2017</div>
</body>

</html>
