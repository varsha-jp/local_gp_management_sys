<!DOCTYPE html>
<?php
include("connect.php");
include("header.php");
session_start();
?>

<html>
<head>
    <title>Prescription Status</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body class="view-doc-hours-body">
    <h1 class="landing-h1">Status of Prescription</h1>
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
        <h4>Prescriptions</h4>
        <div>
            <form method="post" name="viewstatus" id="viewstatus" onsubmit="">
                    <h5> PATIENT ID <?php echo $_SESSION['patientid']; ?><br>
                    PATIENT'S NAME <?php 
                         $j = $_SESSION['patientid'];
                         // echo $j;
                         $sql = "SELECT name FROM patients WHERE patientID = '$j'";
                         $sql1 = mysqli_query($con, $sql);
                         $r = mysqli_fetch_array($sql1);
                         echo $r['name']; 
                         ?></h5>
                <div>
                    <table class="view-doc-hours-tab">
                        <tr>
                            <th width="150">PRESCRIPTION ID </th>
                            <th width="150">DOCTOR NAME</th>
                            <th width="150">DIAGNOSIS</th>
                            <th width="150">MEDICINE NAME</th>
                            <th width="150">DOSE</th>
                            <th width="150">STATUS</th>
                        </tr>
                        <?php
                         $sql = "SELECT * FROM prescriptions WHERE patientID = '$_SESSION[patientid]' ORDER BY status";
                         $sql1 = mysqli_query($con,$sql);

                         while($res = mysqli_fetch_array($sql1))
                         {
                            $sqlp2 = "SELECT * FROM medicines WHERE medicineID = '$res[medicineID]'";
                            $res_med=mysqli_query($con,$sqlp2);
                            $r_m = mysqli_fetch_array($res_med);

                            $sql2 = "SELECT * FROM doctors WHERE doctorID = '$res[doctorID]'";
                            $res_name=mysqli_query($con,$sql2);
                            $r_n = mysqli_fetch_array($res_name);

                             echo"
                             <tr>
                             <th> $res[prescriptionID] </th>
                             <th> $r_n[name] </th>
                             <th> $res[diagnosis] </th>
                             <th> $r_m[name] </th>
                             <th> $res[dose] </th>
                             <th> $res[status] </th>
                             </tr>";
                         }
                        ?>
                    </table>
                    </table>
                </div>
            </form>
        </div>
        <div>
            <form>
                <input type="button" value="Back" onclick="history.back()">
            </form>
        </div>
    </div>
</body>
</html>