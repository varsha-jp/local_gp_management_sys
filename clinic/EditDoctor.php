<!DOCTYPE html>
<?php
include("connect.php");
include("header.php");
if (isset($_POST['submit']))
{
    $sql = "UPDATE doctors SET name='$_POST[doctorname]', ph_number='$_POST[contact_number]', license_number='$_POST[license]' WHERE doctorID = '$_POST[doctorid]'";
    if ($con->query($sql) == TRUE) 
    {
        echo "Doctor record updated";
    } 
    else 
    {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
?>
<html>
<head>
    <title>Edit Doctor</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body class="patient-reg-body">
    <h1 class="landing-h1">Edit Doctor Details</h1>
    <!-- <div>
        <table class="landing-tab">
            <tr>
                <th width="150">Home</th>
                <th width="150">Services</th>
                <th width="150">Suppport</th>
                <th width="150">About</th>
                <th width="150">Feedback</th>
            </tr>
        </table>
        <div> -->
            
        <form action="" method="post" class="patient-reg-form">
            <div class="input">
                    <label>DOCTOR'S ID</label>
                        <input type="text" name="doctorid" id="doctorid" class="form-appt" placeholder="Doctor's ID" required/>
                    <label>DOCTOR'S NAME</label>
                        <input type="text" name="doctorname" id="doctorname" class="form-appt" placeholder="Doctor's Name" required/>
                    <label>CONTACT NUMBER</label>
                        <input type="text" name="contact_number" id="contact_number" class="form-appt" placeholder="Contact Number" required />
                    <label>LICENSE NUMBER</label>
                        <input type="text" name="license" id="license" class="form-appt" placeholder="License Number" required/>
                <input type="submit" name="submit" id="submit" value="Edit" />
            </div>
    </form>
        </div>
    </div>
</body>
</html>