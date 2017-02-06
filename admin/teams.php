<?php
require_once('../includes/bootstrap.php');
$con = dbConnect();
?>
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
            background: -webkit-linear-gradient(to left, #abbaab, #ffffff); /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to left, #abbaab, #ffffff); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }
        .main-container{
            margin:0 200px;
            padding:20px 30px;
            border-left: 1px solid black;
            border-right: 1px solid black;
            border-bottom: 1px solid black;
        }
        .left-input-detail{
            margin-top:10px;
            font-weight: bold;

        }

         .btn{
        margin:0px auto;
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
                <li><a href="changepass.php">Change Password</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </div>
    </nav>
</div>
<div >
  <div class="card " style=" position:fixed; right:10px">
            <div class="card-content indigo lighten-5"><br>
                        <div class="card-title center">
                                         ADD TEAM
                                       </div><hr><br><br>
                                       <div class="form-container row">
                                           <form method="post" action="teams.php">
                                               <div class="row">
                                                   <div class="left-input-detail col s4 center">TEAM NAME</div>
                                                   <div class="col s8">
                                                       <input name="teamname" type="text" placeholder="Enter Team Name  "  ;>

                                                   </div>
                                               </div>
                                               <div class="row">
                                                   <div class="left-input-detail col s4 center">TEAM PASSWORD</div>
                                                   <div class="col s8">
                                                       <input name="teampassword" type="text" placeholder="Enter Team Password  "  ;>

                                                   </div>
                                               </div>
                                               <!-- <div class="row">
                                                   <div class="left-input-detail col s4 center">TEAM EMAIL ID</div>
                                                   <div class="col s8">
                                                       <input name="teamEmailid" type="text" placeholder="Enter Email Id  "  ;>

                                                   </div> -->


                                               <button class="btn right green darken-4 white-text" style="margin-right:140" name="form-submit" type="submit">ADD</button>
                                                    <br><br>
                                                 <?php
                                         if ( isset( $_POST['form-submit'] ) ) {
                                           $username = $_POST['teamname'];
                                           $password = $_POST['teampassword'];
                                           if($username==0||$password==0)
                                           {
                                             echo("<div class=\"alert alert-warning\">\nSOME ERROR EXIST CONTACT CORDINATORS!\n</div>");
                                           }else{
                                           $sql = "INSERT INTO users ". "(username,password)". "VALUES('$username','$password')";
                                           $doquery= mysqli_query($con, $sql);

                                           if($doquery)
                                            {
                                                echo("<div class=\"alert alert-success\">\nSUCCESFULLY INSERTED INTO DATABASE\n</div>");
                                            }else {
                                            echo("<div class=\"alert alert-warning\">\nSOME ERROR EXIST CONTACT CORDINATORS!\n</div>");
                                            }
                                          } }
                                                            ?>




                                           </form>
                                       </div>



             </div>
  </div>
  </div>
<div style="width:68%">
  <div class="custom-table-container">
      <p align="center" style="font-size:25px; color: #2c2c2c">Teams</p>
      <hr>
      <table class="bordered centered">
          <thead>
          <tr class="grey darken-1 white-text">
              <th ><pre>       Team Name      </pre> </th>
              <th ><pre>           Password            </pre> </th>
              <th ></th>

          </tr>
          </thead>
          <?php
          $query = "SELECT username ,password FROM users";
          $results = mysqli_query($con, $query);
          if ($results->num_rows > 0) {
      while($row = $results->fetch_assoc()) {
          echo "<tr> <td > ".$row["username"]."</td> <td> " .$row["password"]."</td> ";?>

<td >
  <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#changepass">Change Password</button>
  <div id="changepass" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">CHANGE PASSWORDr</h4>
      </div>
      <div class="modal-body">
        <p>body</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</td></tr>

            <?php
      }
  } else {
      echo "NO DATABASE PRESENT";
  }

          ?>




          <tbody>
    </div>


</div>


</div>
<!-- endmain -->
<?php include "footer.php"; ?>
