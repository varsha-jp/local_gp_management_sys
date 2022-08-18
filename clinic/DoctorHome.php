<!DOCTYPE html>
<?php
include("connect.php");
include("header.php");
session_start();
?>

<html>
<head>
    <title>Doctor Home</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body class="doc-home-body">
    <h1 class="landing-h1">Hello Dr.<?php 
    $j = $_SESSION['doctorid'];
    // echo $j;
    $sql = "SELECT name FROM doctors WHERE doctorID = '$j'";
    $sql1 = mysqli_query($con, $sql);
    $r = mysqli_fetch_array($sql1);
    echo $r['name']; ?>
    </h1>
    <table class="landing-tab">
        <!-- <tr>
            <th width="150">Home</th>
            <th width="150">Services</th>
            <th width="150">Suppport</th>
            <th width="150">About</th>
            <th width="150">Feedback</th>
        </tr> -->
        <tr>
            <th><button class="landing-button" onclick="document.location = 'ViewApptDoc.php'">View Appointment</button></th>
            <th><button class="landing-button" onclick="document.location = 'DocAvailableHours.php'">Edit Avaliable Hours</button></th>
            <th><button class="landing-button" onclick="document.location = 'DoctorProfile.php'">View Profile</button></th>
        </tr>
    </table>
</body>
</html>