<?php
require_once('../includes/bootstrap.php');
$con = dbConnect();

if (isset($_POST['timelimit'])) {
    $timelimit = mysqli_real_escape_string($con, $_POST['timelimit']);
    $sql = "UPDATE settings SET value='" . $timelimit . "' WHERE param='timelimit'";
    mysqli_query($con, $sql);

    $isOnline = isset($_POST['isOnline'])?'1':'0';
    if($isOnline=='1') setContestOnline($con);
    else setContestOffline($con);

} else {
//Prep variables
    $timelimit=getContestTimelimit($con);
    $isOnline=isContestOnline($con);
}

include('header.php');
echo '<div class="main-container">';
?>

    <div class="card">
        <div class="card-content indigo lighten-5">
            <div class="card-title">Settings</div>
            <hr>
            <div class="form-container row">
                <form method="post" action="index.php">
                    <div class="row">
                        <div class="left-input-detail col s4 center">Time Limit of Contest (minutes)</div>
                        <div class="col s5">
                            <input name="timelimit" type="number" placeholder="Time of Contest"
                                   value="<?php echo "$timelimit" ?>" ;>
                        </div>
                    </div>
                    <div class="row">
                        <div class="left-input-detail col s4 center">Contest Status (On/Offline)</div>
                        <div class="col s5">
                            <div class="switch">
                                <label>
                                    Off
                                    <input name="isOnline" type="checkbox" <?php echo $isOnline?"checked":"" ?>>
                                    <span class="lever"></span>
                                    On
                                </label>
                            </div>
                        </div>
                    </div>


                    <button class="btn-small right teal darken-4 white-text" type="submit">Save</button>
                </form>
            </div>
        </div>


    </div>


<?php include('footer.php');
