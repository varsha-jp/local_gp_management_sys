<!DOCTYPE html>
<?php
include("connect.php");
include("header.php");
if(isset($_POST['submit']))
{
    echo"update";
    $sql = "UPDATE patients SET  dob='$_POST[dob]', name ='$_POST[patientname]', age='$_POST[age]', nhs_number='$_POST[nhs_num]', address='$_POST[address]', gender='$_POST[gender]', history='$_POST[history]' WHERE patientID = '$_POST[patientid]'";
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
    <title>Edit Patient</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body class="patient-reg-body">
    <h1 class="landing-h1">Edit Patient Details</h1>
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
        
        <form action="" method="post" class="patient-reg-form">
        <div>
                <div class="input">
                    <div>
                        <label>PATIENT'S ID</label>
                            <input type="text" name="patientid" id="patientid" class="form-appt" placeholder="Patient's ID" required/><br>
                        <label>PATIENT'S NAME</label>
                            <input type="text" name="patientname" id="patientname" class="form-appt" placeholder="Patient's Name" required/><br>
                        <label>NHS Number</label>
                            <input type="text" name="nhs_num" id="nhs_num" class="form-appt" placeholder="NHS Number" required/><br>
                        <label>AGE</label>
                            <input type="age" name="age" id="age" class="form-appt" placeholder="Age" required/><br>
                        <label>ADDRESS</label>
                            <input type="text" name="address" id="address" class="form-appt" placeholder="Address" required/><br>
                        <label>CONTACT NUMBER</label>
                            <input type="text" name="contact-number" id="contact-number" class="form-appt" placeholder="Contact Number" required/><br>
                        <label>GENDER</label>
                            <input type="text" name="gender" id="gender" class="form-appt" placeholder="Gender" required/><br>
                        <label>DATE OF BIRTH</label>
                            <input type="text" name="dob" id="dob" class="form-appt" placeholder="Date of Birth" required/><br>
                        <label>HISTORY</label>
                            <input type="text" name="history" id="history" class="form-appt" placeholder="History" required/><br>
                    <div>
                        <label>
                            <input type="submit" name="submit" id="submit" value="Edit" />
                        </label>
                    </div>
                </div>
    </form>
        </div>
    </div>
</body>
</html>