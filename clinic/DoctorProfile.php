<!DOCTYPE html>
<?php
include("connect.php");
include("header.php");
session_start();
?>
<html>
<head>
    <title>Doctor Profile</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body class="patient-profile-body">
    <h1 class="landing-h1">Clinic Management System</h1>
    <h5>Doctor Profile</h5>
    <table class="profile-table">
    <?php
        //  $sql = "SELECT * FROM hours WHERE doctorID = '$_SESSION[doctorid]'";
        $sql = "SELECT * FROM doctors WHERE doctorID = '$_SESSION[doctorid]'";
        $sql1 = mysqli_query($con,$sql);
        $res = mysqli_fetch_array($sql1);
        echo"
            <tr>
                <th width='150'>Doctor ID</th>
                <td> $res[doctorID] </td>
            </tr>
            <tr>
                <th width='150'>Doctor's Name</th>
                <td> $res[name] </td>
            </tr>
            <tr>
                <th width='150'>License Number</th>
                <td> $res[license_number] </td>
            </tr>
            <tr>
                <th width='150'>Contact Number</th>
                <td> $res[ph_number] </td>
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