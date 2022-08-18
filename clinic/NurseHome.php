<!DOCTYPE html>
<?php
include("connect.php");
include("header.php");
session_start();
?>
<html>
<head>
    <title>Nurse Home</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body class="doc-home-body">
    <h1 class="landing-h1">Hello Nurse <?php 
        $j = $_SESSION['nurseid'];
        // echo $j;
        $sql = "SELECT name FROM nurses WHERE nurseID = '$j'";
        $sql1 = mysqli_query($con, $sql);
        $r = mysqli_fetch_array($sql1);
        echo $r['name']; ?></h1>
    <table class="landing-tab">
        <!-- <tr>
            <th width="150">Home</th>
            <th width="150">Services</th>
            <th width="150">Suppport</th>
            <th width="150">About</th>
            <th width="150">Feedback</th>
        </tr> -->
        <tr>
            <th><button class="landing-button" onclick="document.location = 'UpdateApptStatus.php'">Update Appointment Status</button></th>
            <th><button class="landing-button" onclick="document.location = 'UpdatePrescStatus.php'">Update Prescription Status</button></th>
            <th><button class="landing-button" onclick="document.location = 'NurseProfile.php'">View Profile</button></th>
        </tr>
    </table>
</body>
</html>