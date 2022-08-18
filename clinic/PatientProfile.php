<!DOCTYPE html>
<?php
include("connect.php");
include("header.php");
session_start();
?>
<html>
<head>
    <title>Pateint Profile</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body class="patient-profile-body">
    <h1 class="landing-h1">Welcome to the Clinic Management System</h1>
    <h5>Patient Profile</h5>
    <table class="profile-table">
<?php
        //  $sql = "SELECT * FROM hours WHERE doctorID = '$_SESSION[doctorid]'";
         $sql = "SELECT * FROM patients WHERE patientID = '$_SESSION[patientid]'";
         $sql1 = mysqli_query($con,$sql);
         $res = mysqli_fetch_array($sql1);
             echo"
             <tr>
                <th width='150'>Patient ID</th>
                <td> $res[patientID] </td>
             </tr>
             <tr>
                <th width='150'>Patient's Name</th>
                <td> $res[name] </td>
             </tr>
             <tr>
                <th width='150'>NHS Number</th>
                <td> $res[nhs_number] </td>
             </tr>
             <tr>
             <th width='150'>Address</th>
                <td> $res[address] </td>
             </tr>
             <tr>
             <th width='150'>Contact Number</th>
                 <td> $res[ph_number] </td>
             </tr>
             <tr>
             <th width='150'>Age</th>
                <td> $res[age] </td>
             </tr>
             <tr>
             <th width='150'>Gender</th>
                <td> $res[gender] </td>
             </tr>
             <tr>
             <th width='150'>Date of Birth</th>
                <td> $res[dob] </td>
                </tr>
                <tr>
             <th width='150'>History</th>
             <td> $res[history] </td>
             </tr>";
        ?>
        </table>
        <p>
            
        </p>
        <form>
                <input type="button" value="Back" onclick="history.back()">
        </form>
</body>
</html>