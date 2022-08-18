<!DOCTYPE html>
<?php
include("connect.php");
include("header.php");
session_start();
$var2 = $_GET['var'];
// error_reporting(E_ALL ^ E_WARNING);
if(isset($_POST['submit']))
{
    // echo"insert";
    $sql_appt = "SELECT * FROM appointments WHERE doctorID = '$_SESSION[doctorid]' AND patientID = '$var2' AND status = 'active' ";
    $sql1_appt = mysqli_query($con,$sql_appt);
    $r_appt = mysqli_fetch_array($sql1_appt);

    $sql = "INSERT INTO prescriptions(appointmentID, dose, medicineID, diagnosis, patientID, doctorID, status) VALUES ('$r_appt[appointmentID]','$_POST[dose]','$_POST[medicineid]','$_POST[diagnosis]','$var2','$_SESSION[doctorid]', 'active')";
    if ($con->query($sql) == TRUE) 
        {
            echo "<script type='text/javascript'>alert('Prescription issused successfully');</script>";
            // header(DoctorHome.php);
        } 
        else 
        {
            echo "<script type='text/javascript'>alert('Prescription unsuccessfully');</script>";
        }
}
?>
<html>
<head>
    <title>Issue Prescription</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body class="ip-body">
        <div>
        <a href = "DoctorHome.php" style="padding-top: 33px ;">
            <input class="back" type="button"  value="Back">
        </a>
        </div>
    <h1 class="landing-h1">Issue Prescription</h1>
    <!-- <div>
        <table class="landing-tab">
            <tr>
                <th width="150">Home</th>
                <th width="150">Services</th>
                <th width="150">Suppport</th>
                <th width="150">About</th>
                <th width="150">Feedback</th>
            </tr>
        </table>
        <div> -->
                    <?php 
                 $sql2 = "SELECT * FROM doctors WHERE doctorID = '$_SESSION[doctorid]'";
                 $res_name=mysqli_query($con,$sql2);
                 $r_n = mysqli_fetch_array($res_name);

                 $sqlp2 = "SELECT * FROM patients WHERE patientID = '$var2'";
                 $res_pname=mysqli_query($con,$sqlp2);
                 $r_pn = mysqli_fetch_array($res_pname);
                 echo"
                 <div>
                        <h5>
                            DOCTOR'S ID  $r_n[doctorID] <br>
                            DOCTOR'S NAME $r_n[name]
                        </h5>
                    </div>
                    <div>
                        <h5>
                            PATIENT'S ID  $var2 <br>
                            PATIENT'S NAME $r_pn[name]
                        </h5>
                    </div>";
                    ?>
            <form class="book-appt-form" method="post" name="issuepres" id="issuepres" onsubmit="">
                <label>MEDICINE NAME</label>
                <?php
                echo"<select name='medicineid'>";
                $sql_q = "SELECT * from medicines";
                $r_sql_q=mysqli_query($con,$sql_q);
                while($row1 = mysqli_fetch_array($r_sql_q)){
                    echo "<option value='$row1[medicineID]'> $row1[name] </option>";
                }
                echo "</select>";
                ?><br>
                    <!-- <input type="text" name="medname" id="medname" class="form-pres" placeholder="Medicine Name" /> -->
                <label>DOSE</label>
                    <input type="text" name="dose" id="dose" class="form-pres" placeholder="Dose" /><br>
                <label>DIAGNOSIS</label>
                    <input type="text" name="diagnosis" id="diagnosis" class="form-pres" placeholder="Diagnosis" />
                    <input type="submit" name="submit" id="submit" value="Issue" />
                </div>
            </form>
        </div>
    </div>
</body>
</html>