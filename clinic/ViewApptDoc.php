<!DOCTYPE html>
<?php
include("connect.php");
include("header.php");
session_start();
if(isset($_GET['submit']))
{
    $var1=$_GET['submit'];
    header("Location: History.php?var=$var1");
    // $mysql = "UPDATE appointments SET status ='completed' WHERE appointmentID = '$_POST[submit]' ";
    // $sql1 = mysqli_query($con, $mysql);
    // echo" $_POST[submit]";
}


?>
<html>
<head>
    <title>View Appointments</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body class="view-doc-hours-body">
    <h1 class="landing-h1">All Active Appointments</h1>
    <div>
        <a href = "DoctorHome.php" style="padding-top: 0px;">
            <input class="back" type="button" value="Back">
        </a>
        </div>    
    <!-- <table class="landing-tab">
            <tr>
                <th width="150">Home</th>
                <th width="150">Services</th>
                <th width="150">Suppport</th>
                <th width="150">About</th>
                <th width="150">Feedback</th>
            </tr>
        </table><br> -->
        <table class="view-doc-hours-tab" >
            <tr>
                
            <th width="150">APPOINTMENT ID</th>
                <th width="150">PATIENT ID</th>
                <th width="150">PATIENT'S NAME</th>
                <th width="150">DOCTOR ID</th>
                <th width="150">DOCTOR NAME</th>
                <th width="150">CONTACT NUMBER</th>
                <th width="150">APPOINTMENT DATE</th>
                <th width="150">APPOINTMENT TIME</th>
                <th width="150">SYMPTOMS</th>
                <th width="150">HISTORY</th>
                <th width="150">APPOINTMENT HISTORY</th>
            </tr>
            <?php
            error_reporting(E_ALL ^ E_WARNING);
             $sql = "SELECT * FROM appointments WHERE doctorID = '$_SESSION[doctorid]' AND status = 'active' AND date >= CURDATE() ORDER BY date ";
             $sql1 = mysqli_query($con,$sql);

             $sql2 = "SELECT * FROM doctors WHERE doctorID = '$_SESSION[doctorid]'";
             $res_name=mysqli_query($con,$sql2);
             $r_n = mysqli_fetch_array($res_name);

             while($res = mysqli_fetch_array($sql1))
             { 
                 $sqlp2 = "SELECT * FROM patients WHERE patientID = '$res[patientID]'";
                 $res_pname=mysqli_query($con,$sqlp2);
                 $r_pn = mysqli_fetch_array($res_pname);
                 echo"
                 <tr> <form action='ViewApptDoc.php' method='GET'>
                 <th> $res[appointmentID]</th>
                 <th> $res[patientID] </th>
                 <th> $r_pn[name]</th>
                 <th> $res[doctorID] </th>
                 <th> $r_n[name]</th>
                 <th> $r_pn[ph_number] </th>
                 <th> $res[date] </th>
                 <th> $res[time] </th>
                 <th> $res[symptoms] </th>
                 <th> $r_pn[history] </th>
                 <th> <button class ='button-his' type='submit' name='submit' id='submit' value='$res[patientID]'/>History</button></th>
                 </form> </th>
                 
                 </tr>";
             }
            ?>
        </table>
</body>
</html>