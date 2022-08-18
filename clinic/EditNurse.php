<!DOCTYPE html>
<?php
include("connect.php");
include("header.php");
if (isset($_POST['submit']))
{
    echo"update";
    $sql = "UPDATE nurses SET name='$_POST[nursename]', license_number='$_POST[license]', ph_number='$_POST[contact_number]' WHERE nurseID='$_POST[nurseid]'";
    if ($con->query($sql) == TRUE) 
    {
        echo "Record updated";
    } 
    else 
    {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
?>
<html>
<head>
    <title>Edit Nurse</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body class="patient-reg-body">
    <h1 class="landing-h1">Edit Nurse Details</h1>
    <div>
        <!-- <table class="landing-tab">
            <tr>
                <th width="150">Home</th>
                <th width="150">Services</th>
                <th width="150">Suppport</th>
                <th width="150">About</th>
                <th width="150">Feedback</th>
            </tr>
        </table> -->
        <div>
        <form action="" method="post" class="patient-reg-form">
                <label>NURSE'S ID</label>
                    <input type="text" name="nurseid" id="nurseid" class="form-appt" placeholder="Nurse's ID" /><br>
                <label>NURSE'S NAME</label>
                    <input type="text" name="nursename" id="nursename" class="form-appt" placeholder="Nurse's Name" /><br>
                <label>CONTACT NUMBER</label>
                    <input type="text" name="contact_number" id="contact_number" class="form-appt" placeholder="Contact Number" /><br>
                <label>LICENSE NUMBER</label>
                    <input type="text" name="license" id="license" class="form-appt" placeholder="License Number" /><br>
                <label><input type="submit" name="submit" id="submit" value="Edit" /></label>
                    
    </form> 
        </div>
    </div>
</body>
</html>