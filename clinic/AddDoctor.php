<!DOCTYPE html>
<?php
include("connect.php");
include("header.php");
if(isset($_POST['submit']))
{
$sql = "INSERT INTO doctors(name,ph_number,license_number,password) VALUES ('$_POST[doctorname]','$_POST[doctorph]','$_POST[doctorlic]', MD5('$_POST[password]'))";
    if ($con->query($sql) == TRUE) 
    {
        echo "<h4>New record created successfully</h4>";
    } 
    else 
    {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
?>
<html>
<head>
    <title>Add Doctor</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body class="patient-reg-body">
    <h1 class="landing-h1">Add New Doctor</h1>
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
        <!-- <h4>Add New Doctor</h4> -->
        <div>
            <form action="" method="post" class="patient-reg-form">
            <label>DOCTOR'S NAME</label>
                <input type="text" name="doctorname" id="doctorname" class="form" placeholder="Doctor's Name" required /><br>
            <label>DOCTOR'S LICENSE NUMEBR</label> 
                <input type="text" name="doctorlic" id="doctorlic" class="form" placeholder="Doctor's License Number" required /><br>
            <label>DOCTOR'S PASSWORD</label>
                <input type="password" name="password" id="password" class="form" placeholder="Doctor's Password" required/><br>
            <label>DOCTOR'S CONTACT NUMEBR</label>
                <input type="text" name="doctorph" id="doctorph" class="form" placeholder="Doctor's Contact Number" required/><br>
                <label><input type="submit" name="submit" id="submit" value="Add Doctor" /></label>
    </form>
    <div>
    </div>
</body>
</html>