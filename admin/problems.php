<?php
require_once('../includes/bootstrap.php');
$con = dbConnect();
?>
<?php
$con = dbConnect();

if (!isAdminLoggedIn())
    header('Location:../login.php?error=admin');
include('header.php');
echo '<div class="main-container">';
?>


<?php 
if(isset($_POST['preview-problem']))
    {$_SESSION['title']=$_POST['title'];
  
    $_SESSION['justshowtext']=$_POST['text'];
  echo '<script>window.open("problempreview.php")</script>';  }

 ?>



<?php 
if(isset($_POST['add-problem']))
   {$title=$_POST['title'];
   $text=$_POST['text'];
    $input=$_POST['input'];
   $output=$_POST['output'];

   $query="INSERT INTO problems ". "(title,text,input,output)". "VALUES('$title','$text'
                                           ,'$input','$output')";

   $res=mysqli_query($con,$query);
   if($res)
    echo '<script>alert("Success");</script>';
}

 ?>

    <div class="card">
        <div class="card-content indigo lighten-5">
            
            <hr>
<div style="text-align:center"><h4 ><u> ADD PROBLEM </u></h1></div>
<form method="post">
<b> ENTER TITLE :: </b><input type="text" name="title" width="200px" >
<b> ENTER PROBLEM IN HTML FORMAT :: </b><textarea style="height:300px; border: 2px solid blue-black" name="text"  ></textarea> 
<div style="display: inline-block;"><b> ENTER INPUT TEST CASE :: </b><textarea style="border: 2px solid blue-black " name="input"  ></textarea>  </div>

<div style="display: inline-block;"><b> ENTER OUTPUT TEST CASE :: </b><textarea style="border: 2px solid blue-black "" name="output"  ></textarea>  </div>
<button  name="add-problem " style="display: inline-block;" class="btn " type=submit> ADD PROBLEM </button>
<button  class=" btn right" name="preview-problem" style="display: inline-block;" type=submit> PREVIEW PROBLEM</button>
</form>






<?php include "footer.php"; ?>
