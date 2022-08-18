<!DOCTYPE html>
<?php
include("connect.php");
include("header.php");
session_start();
?>

<html>
<head>
    <title>Patient Home</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body class="patient-home-body">
    <h1 class="landing-h1">Hello <?php 
        $j = $_SESSION['patientid'];
        // echo $j;
        $sql = "SELECT name FROM patients WHERE patientID = '$j'";
        $sql1 = mysqli_query($con, $sql);
        $r = mysqli_fetch_array($sql1);
        echo $r['name']; ?> </h1>
    <table class="landing-tab">
        <!-- <tr>
            <th width="150">Home</th>
            <th width="150">Services</th>
            <th width="150">Suppport</th>
            <th width="150">About</th>
            <th width="150">Feedback</th>
        </tr> -->
        <tr>
            <th><button class="landing-button" onclick="document.location = 'BookAppointment.php'">Book Appointment</button></th>
            <th><button class="landing-button" onclick="document.location = 'ViewDocHours.php'">Avaliable Doctors</button></th>
            <th><button class="landing-button" onclick="document.location = 'PrescriptionStatus.php'">View Prescription</button></th>
            <th><button class="landing-button" onclick="document.location = 'PatientProfile.php'">View Profile</button></th>
        </tr>
    </table>
</body>
</html>