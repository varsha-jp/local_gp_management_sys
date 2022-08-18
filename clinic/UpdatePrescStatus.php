<!DOCTYPE html>
<?php
include("connect.php");
include("header.php");
session_start();

if(isset($_POST['submit']))
{
    $mysql = "UPDATE prescriptions SET status ='inactive' WHERE prescriptionID = '$_POST[submit]' ";
    $sql1 = mysqli_query($con, $mysql);
    if ($con->query($mysql) == TRUE) 
        {
            echo "<script type='text/javascript'>alert('Prescripiton Deactivated');</script>";
            // header(DoctorHome.php);
        } 
        else 
        {
            echo "<script type='text/javascript'>alert('Prescripiton unsuccessfully');</script>";
        }
}
?>
<html>
<head>
    <title>View Active Prescripitons</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body class="view-doc-hours-body">
    <h1 class="landing-h1">All Active Prescripitons</h1>
        <!-- <table class="landing-tab">
            <tr>
                <th width="150">Home</th>
                <th width="150">Services</th>
                <th width="150">Suppport</th>
                <th width="150">About</th>
                <th width="150">Feedback</th>
            </tr>
        </table> -->
        <p>
            
            </p>
            <div>
        <a href = "NurseHome.php" style="padding-top: 32px">
            <input class="back" type="button" value="Back">
        </a>
        </div>

        <form method="post" action="">
    <h5>Find Patient</h5>
    <input type="text" name="search" id="search" placeholder="Patient ID"/>
                <input type="submit" name="submit1" id="submit1" value="Search"/><br>


                <p>


</p>
    <?php
        if(isset($_POST['submit1']))
        {
            // $mysql = "SELECT * FROM prescriptions WHERE status ='active' AND patientID = '$_POST[search]' ";
            // $sql1 = mysqli_query($con, $mysql);
            echo "<table class='view-doc-hours-tab'>
            <tr>
            <th width='150'>PRESCRIPTION ID </th>
            <th width='150'>PATIENT ID</th>
            <th width='150'>PATIENT NAME</th>
            <th width='150'>DOCTOR ID</th>
            <th width='150'>DIAGNOSIS</th>
            <th width='150'>MEDICINE NAME</th>
            <th width='150'>DOSE</th>
            <th width='150'>STATUS</th>
            </tr>";
            $pid = $_POST['search'];
             $sql = "SELECT * FROM prescriptions WHERE status = 'active' AND patientID = '$pid' ";
             $sql1 = mysqli_query($con,$sql);
             while($res = mysqli_fetch_array($sql1))
             { 
                //  $sql2 = "SELECT * FROM doctors WHERE doctorID = '$res[doctorID]'";
                //  $res_name=mysqli_query($con,$sql2);
                //  $r_n = mysqli_fetch_array($res_name);

                 $sqlp2 = "SELECT * FROM patients WHERE patientID = '$pid'";
                 $res_pname=mysqli_query($con,$sqlp2);
                 $r_pn = mysqli_fetch_array($res_pname);

                 $sqlp2 = "SELECT * FROM medicines WHERE medicineID = '$res[medicineID]'";
                 $res_med=mysqli_query($con,$sqlp2);
                 $r_m = mysqli_fetch_array($res_med);
                 echo"
                 <tr> <form action='UpdateApptStatus.php' method='post'>

                 <th> $res[prescriptionID] </th>
                 <th> $res[patientID] </th>
                 <th> $r_pn[name]</th>
                 <th> $res[doctorID] </th>
                 <th> $res[diagnosis] </th>
                 <th> $r_m[name] </th>
                 <th> $res[dose] </th>
                 <th><button class ='complete' type='submit' name='submit' id='submit' value='$res[appointmentID]'/>Deactivate</button></th>
                 </form>
                 </tr>";
             }
        echo "</table>";
        }
    ?>
    <p>


    </p>
    </form>

        <table class="view-doc-hours-tab">
        <tr>
            <th width="150">PRESCRIPTION ID </th>
            <th width="150">PATIENT ID</th>
            <th width="150">PATIENT NAME</th>
            <th width="150">DOCTOR ID</th>
            <th width="150">DOCTOR NAME</th>
            <th width="150">DIAGNOSIS</th>
            <th width="150">MEDICINE NAME</th>
            <th width="150">DOSE</th>
            <th width="150">STATUS</th>
        </tr>
        <?php
        $sql = "SELECT * FROM prescriptions WHERE status = 'active'";
        $sql1 = mysqli_query($con,$sql);
        while($res = mysqli_fetch_array($sql1))
        {
                 $sql2 = "SELECT * FROM doctors WHERE doctorID = '$res[doctorID]'";
                 $res_name=mysqli_query($con,$sql2);
                 $r_n = mysqli_fetch_array($res_name);

                 $sqlp2 = "SELECT * FROM patients WHERE patientID = '$res[patientID]'";
                 $res_pname=mysqli_query($con,$sqlp2);
                 $r_pn = mysqli_fetch_array($res_pname);

                 $sqlp2 = "SELECT * FROM medicines WHERE medicineID = '$res[medicineID]'";
                 $res_med=mysqli_query($con,$sqlp2);
                 $r_m = mysqli_fetch_array($res_med);
        echo"
        <tr>
        <form action='UpdatePrescStatus.php' method='post'>
        <th> $res[prescriptionID] </th>
        <th> $res[patientID] </th>
        <th> $r_pn[name] </th>
        <th> $res[doctorID] </th>
        <th> $r_n[name] </th>
        <th> $res[diagnosis] </th>
        <th> $r_m[name] </th>
        <th> $res[dose] </th>
        <th><button class ='complete' type='submit' name='submit' id='submit' value='$res[prescriptionID]'/>Deactivate</button></th>
        </form>
        </tr>";
        }
        ?>
        </table>
</body>
</html>