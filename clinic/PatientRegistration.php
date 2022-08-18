<!DOCTYPE html>
<?php
include("connect.php");
include("header.php");
if(isset($_POST['submit']))
{
$sql = "INSERT INTO patients(name,password, dob, age, nhs_number,ph_number, address, gender, history) VALUES ('$_POST[patientname]',MD5('$_POST[password]'),'$_POST[dob]','$_POST[age]','$_POST[nhs_num]', '$_POST[ph_num]','$_POST[address]', '$_POST[gender]','$_POST[history]')";



    if ($con->query($sql) == TRUE) 
    {
        $sqlp2 = "SELECT * FROM patients WHERE nhs_number = '$_POST[nhs_num]' AND dob = '$_POST[dob]' AND ph_number = '$_POST[ph_num]'";
        $res_pname = mysqli_query($con,$sqlp2);
        $r_pn = mysqli_fetch_array($res_pname);
        echo "<script type='text/javascript'>alert('Registered successfully! Please note your Patient ID is $r_pn[patientID]');</script>";
    } 
    else 
    {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
?>
<html>
<head>
    <title>Patient Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body class="patient-reg-body">
    <h1 class="landing-h1">Registration for New Patients</h1>
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
        <div class="patient-reg-form-input">
            <form method="post" name="register" id="register" class="patient-reg-form" onsubmit="return ValidateEmpty()">
                <label> PATIENT'S NAME </label>
                    <input type="text" name="patientname" id="patientname" oninvalid="this.setCustomValidity('Please enter valid name')" pattern="[A-Za-z ]+" placeholder="Patient's Name" required/><br>
                <label> PASSWORD </label>
                    <input type="password" name="password" id="password" placeholder="Password" required/><br>
                <label> NHS NUMBER </label>
                    <input type="text" name="nhs_num" id="nhs_num" oninvalid="this.setCustomValidity('Please enter valid NHS number)" pattern="[0-9]{7}" placeholder="NHS Number" required/><br>
                <label> ADDRESS </label>
                    <input type="text" name="address" id="address" placeholder="Address" required/><br>
                <label> CONTACT NUMBER </label>
                    <input type="tel" name="ph_num" id="ph_num" pattern="[0-9]{10}" oninvalid="this.setCustomValidity('Please enter valid contact number)" placeholder="Contact Number" required/><br>
                <label> AGE </label>
                    <input type="text" name="age" id="age" pattern="[0-9]{2}" oninvalid="this.setCustomValidity('Please enter valid age)" placeholder="Age" required/><br>
                <label for="gender"> GENDER </label>
                    <select name="gender" id="gender">
                    <option value=""></option>
                        <option value="Female">Female</option>
                        <option value="Male">Male</option>
                        <option value="Other">Other</option>
                    </select><br>
                
                <!-- <input type="radio" id="fe" name="gender" value="Female">
                        <label for="fe">Female</label>
                    <input type="radio" id="ma" name="gender" value="Male">
                        <label for="ma">Male</label><br> -->
                
                <!-- <input type="text" name="gender" id="gender" placeholder="Gender" required/><br> -->
                <label> DATE OF BIRTH </label>
                    <input type="date" name="dob" id="dob" placeholder="Date of Birth" required/><br>
                <label> HISTORY </label>
                    <input type="text" name="history" id="history" placeholder="History" required/><br>
                <label>
                    <input type="submit" name="submit" id="submit" value="REGISTER" /><br>
                </label>
            </form>
        </div>
    </div>
</body>
</html>


