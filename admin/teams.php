<?php
require_once('../includes/bootstrap.php');
$con = dbConnect();
?>
<?php
$con = dbConnect();

if (!isAdminLoggedIn())
    header('Location:../login.php?error=admin');

include('header.php');
?>


<body>

<div >
  <div class="card " style=" position:fixed; right:5px ;left:70%">
            <div class="card-content indigo lighten-5">
                        <div class="card-title center">
                          ADD TEAM</div><hr>
                                       <div class="form-container row">
                                           <form method="post" action="teams.php">
                                               <div class="row">
                                                   <div class="left-input-detail col s4 center">TEAM NAME</div>
                                                   <div class="col s8">
                                                       <input name="teamname" type="text" placeholder="Enter Team Name  "  ;>

                                                   </div>
                                               </div>
                                               <div class="row">
                                                   <div class="left-input-detail col s4 center">TEAM PASSWORDS</div>
                                                   <div class="col s8">
                                                       <input name="teampassword" type="text" placeholder="Enter Team Password  "  ;>

                                                   </div>
                                                </div>
                                                   <div class="row">
                                                       <div class="left-input-detail col s4 center">TEAM MEMBER 1</div>
                                                       <div class="col s8">
                                                           <input name="user1" type="text" placeholder="Team Member 1"  ;>

                                                       </div>
                                                   </div>
                                                       <div class="row">
                                                           <div class="left-input-detail col s4 center">TEAM MEMBER 2</div>
                                                           <div class="col s8">
                                                               <input name="user2" type="text" placeholder="Team Member 1"  ;>
                                                               </div>
                                                           </div>
                                                           <div class="row">
                                                               <div class="left-input-detail col s4 center">TEAM MEMBER 3</div>
                                                               <div class="col s8">
                                                                   <input name="user3" type="text" placeholder="Team Member 1"  ;>

                                                               </div>
                                                           </div>

                                                   </div>

                                               <!-- <div class="row">
                                                   <div class="left-input-detail col s4 center">TEAM EMAIL ID</div>
                                                   <div class="col s8">
                                                       <input name="teamEmailid" type="text" placeholder="Enter Email Id  "  ;>

                                                   </div> -->
                                                   <!-- php code for ban -->
                                                   <?php

                                                   if(isset($_POST['ban-submit'])){

                                                    $status=$_POST['status'];
                                                    if($status==1)
                                                    $status=0;
                                                    else
                                                    if($status==0)
                                                    $status=1;
                                                     $username=$_POST['username'];

                                                   $query = "UPDATE users Set status='$status' WHERE username='$username'";
                                                   $res = mysqli_query($con, $query);
                                                   if($res){
                                                     // echo "SUCCESS";
                                                   }else {
                                                     // echo "fasilure";
                                                   }
                                                        }
                                                   ?>
                                                   <!-- endhere -->
                                                   <!-- php code for changepass -->
                                                   <?php

                                                   if(isset($_POST['changepass-submit'])){
                                                     $username=$_POST['username'];
                                                    $password=$_POST['newpassword'];
                                                   $query = "UPDATE users Set password='$password' WHERE username='$username'";
                                                   $res = mysqli_query($con, $query);
                                                   if($res){
                                                     // echo "SUCCESS";
                                                   }else {
                                                     // echo "fasilure";
                                                   }
                                                        }
                                                   ?>
                                                   <!-- endhere -->
                                                   <form class="form-inline well" >
                                                   <div class="form-group">
                                                   <button class="btn right green darken-4 white-text" style="margin-right:140" name="form-submit" type="submit">ADD </button>
                                                   </div>
                                                   <div class="form-group">
                                                     <select class="browser-default" style="width:55px;" name="language">
                                                         <option  value="1">C</option>
                                                         <option value="2">C++</option>
                                                         <option  value="3">Java</option>
                                                         <option  value="4">Python </option>

                                                     </select>
                                                   </select>
                                                   </div>
                                                   </form>
                                                    <br><br>
                                                 <?php
                                         if ( isset( $_POST['form-submit'] ) ) {
                                          $username = $_POST['teamname'];
                                          $password = $_POST['teampassword'];
                                          $user1 = $_POST['user1'];
                                          $user2= $_POST['user2'];
                                          $user3= $_POST['user3'];
                                          $language=$_POST['language'];
                                           $sql = "INSERT INTO users ". "(username,password,name1,name2,name3,language)". "VALUES('$username','$password'
                                           ,'$user1','$user2','$user3','$language')";
                                           $doquery= mysqli_query($con, $sql);

                                           if($doquery)
                                            {
                                                echo("<div class=\"alert alert-success\">\nSUCCESFULLY INSERTED INTO DATABASE\n</div>");
                                            }else {
                                              echo $doquery;
                                            echo("<div class=\"alert alert-warning\">\nSOME ERROR EXIST CONTACT CORDINATORS!\n</div>");
                                            }
     }
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
              <th data-field="title"><pre>      TEAM NAME      </pre> </th>
              <th data-field="attempts"><pre>   PASSWORD     </pre> </th>
               <th data-field="attempts"><pre>   BAN STATUS    </pre> </th>
              <th data-field="attempts"><pre>   CHANGE PASSWORD    </pre> </th>

          </tr>
          </thead>
          <?php
          $query = "SELECT username ,password,status FROM users";
          $results = mysqli_query($con, $query);
          if ($results->num_rows > 0) {
      while($row = $results->fetch_assoc()) {
          echo "<tr> <td > ".$row["username"]."</td> <td> " .$row["password"]."</td> <td> ";?>
            <form action="teams.php" method="post">
              <input type="hidden" name="username" value="<?php echo $row["username"] ?>" > <!-- used for the ban feature-->
                <input type="hidden" name="status" value="<?php echo $row["status"] ?>" > <!-- used for the ban feature-->
   <button class="btn  green darken-4 white-text"  name="ban-submit" type="submit"><?php if($row['status']==1)echo"NOT BANNED";else echo"BANNED";?></button>
</form>
<td >




<form class="" action="teams.php" method="post">
    <input type="hidden" name="username" value="<?php echo $row["username"] ?>" >
  <input type="text" name="newpassword" placeholder="Change Password">
  <button class="btn-sm  green darken-4 white-text"  name="changepass-submit" type="submit" class="btn btn-primary" >GO</button>
</form>

</td>                             </tr>

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
