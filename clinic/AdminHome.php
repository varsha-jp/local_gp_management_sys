<!DOCTYPE html>
<?php
include("header.php");
?>
<html>
<head>
    <link rel="stylesheet" href="style.css"/>
    <title>Admin Home</title>
</head>
<body class="doc-home-body">
    <h1 class="landing-h1" >Hello Admin</h1>
    <table class="landing-tab">
        <!-- <tr>
            <th width="150">Home</th>
            <th width="150">Services</th>
            <th width="150">Suppport</th>
            <th width="150">About</th>
            <th width="150">Feedback</th>
        </tr> -->
        <tr>
            <th><button class="landing-button" onclick="document.location = 'EditDoctor.php'">Edit Doctors</button></th>
            <th><button class="landing-button" onclick="document.location = 'AddDoctor.php'">Add Doctors</button></th>
            <th><button class="landing-button" onclick="document.location = 'EditPatient.php'">Edit Patients</button></th>
            
        </tr>
        <tr> 
            <th><button class="landing-button" onclick="document.location = 'EditNurse.php'">Edit Nurses</button></th>
            <th><button class="landing-button" onclick="document.location = 'AddNurse.php'">Add Nurse</button></th>
        </tr>
        <tr>
        <th><button class="landing-button" onclick="document.location = 'AddMedicine.php'">Add Medicine</button></th>
        <th><button class="landing-button" onclick="document.location = 'EditMedicine.php'">Edit Medicine</button></th>
    </tr>
    </table>
</body>
</html>