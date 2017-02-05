<?php

require_once "../includes/bootstrap.php";
include "header.php";

if(isset($_POST['formSubmit']))
{
    if(isset($_POST['id']) && is_numeric($_POST['id'])) //modification case
    {

    }

}


?>

<div class="card">
    <div class="card-content indigo lighten-5">
        <div class="card-title">Problems</div>
        <hr>

        <div class="problem-container">
            <div class="card add-new-prob-container">
                <div class="card-content">
                    <div style="font-size:17px"><u>Add new problem</u></div>
                    <div class="form-container row">
                        <form method="post" action="problems.php">
                            <input type="hidden" name="formSubmit">
                            <?php
                                if(isset($_GET['modifyId']) && is_numeric($_GET['modifyId']))
                                {
                                    echo "<input type=\"hidden\" name=\"id\" value=\"{$_GET['modifyId']}\">";
                                }
                            ?>
                            <div class="row">
                                <div class="left-input-detail col s3 center">Problem Title</div>
                                <div class="col s8">
                                    <input name="title" type="text" placeholder="Title" required
                                           value="<?php echo "" ?>" ;>
                                </div>
                            </div>
                            <div class="row">
                                <div class="left-input-detail col s3 center">Problem Description<br>with sample I/O
                                </div>
                                <div class="col s8">
                                    <div class="">
                                        <textarea name="text" style="height: 300px; padding: 8px;" class="browser-default" rows="10" required></textarea>
                                    </div>
                                </div>
                            </div>


                            <button class="btn-small right teal darken-4 white-text" type="submit">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>

