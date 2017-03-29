<!DOCTYPE html>
<html>
<head>
	<title>PROBLEM PREVIEW </title>
	<link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" href="../css/materialize.min.css">
</head>
<body>

<div style=" max-width: 75%; margin:0 auto;>
  <div class="card">
    <div class="card-content z-depth-5" style="padding-left:30px">
        <span class="card-title blue-text text-darken-4">Problem Preview </span>
        <?php
        session_start();
        echo("<hr/>\n<h4>" . $_SESSION['title'] . "</h4>");?>
        <br>
        <?php
        echo $_SESSION['justshowtext'];
        ?>
        <br>
        <br>
        <hr/>





    </div>


 </div>   
</div>
</body>
</html>