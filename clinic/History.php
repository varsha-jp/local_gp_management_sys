<!DOCTYPE html>
<?php
include("connect.php");
include("header.php");
session_start();   
$var2 = $_GET['var'];            
?>
<html>
<head>
    <title>History of Appointments</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body class="history-body">
    <h1 class="landing-h1">Previous Appointments</h1>
        <!-- <table class="landing-tab">
            <tr>
                <th width="150">Home</th>
                <th width="150">Services</th>
                <th width="150">Suppport</th>
                <th width="150">About</th>
                <th width="150">Feedback</th>
            </tr>
        </table><br> -->

        <div>
        <a href = "ViewApptDoc.php">
            <input class="back" type="button" value="Back">
        </a>
        </div>

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
            </tr>
            <?php
             $sql = "SELECT * FROM appointments WHERE doctorID = '$_SESSION[doctorid]' AND patientID = '$var2' AND status = 'active' ";
             $sql1 = mysqli_query($con,$sql);
            //  $res = mysqli_fetch_array($sql1);
            //  print_r($sql1);

             $sql2 = "SELECT * FROM doctors WHERE doctorID = '$_SESSION[doctorid]'";
             $res_name=mysqli_query($con,$sql2);
             $r_n = mysqli_fetch_array($res_name);

             while($res = mysqli_fetch_array($sql1))
             { 
                 $sqlp2 = "SELECT * FROM patients WHERE patientID = '$var2'";
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
                 </form> </th>
                 
                 </tr>";
             }
            ?>
        </table>
        <from action="" method="GET">
        <p>

</p>
            <button class ="button-his" onclick="document.location = 'IssuePrescription.php?var=<?php echo"$var2";?>'">Issue Prescription</button>
        
    </form>
    
    <p>

</p>
        <table class="view-doc-hours-tab">
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
            </tr>
            <?php
            
            // if(isset($_GET['submit'])){
            //     $var = $_GET['submit'];
            //     echo"$_GET[submit]";
            // }
              
             $sql = "SELECT * FROM appointments WHERE status = 'completed' AND patientID = '$var2' ";
            //  echo $var2;
             $sql1 = mysqli_query($con,$sql);
             while($res = mysqli_fetch_array($sql1))
             { 
                 $sql2 = "SELECT * FROM doctors WHERE doctorID = '$res[doctorID]'";
                 $res_name=mysqli_query($con,$sql2);
                 $r_n = mysqli_fetch_array($res_name);

                 $sqlp2 = "SELECT * FROM patients WHERE patientID = '$var2'";
                 $res_pname=mysqli_query($con,$sqlp2);
                 $r_pn = mysqli_fetch_array($res_pname);
                 
                 echo"
                
                 <tr> 
                 <th> $res[appointmentID]</th>
                 <th> $var2 </th>
                 <th> $r_pn[name]</th>
                 <th> $res[doctorID] </th>
                 <th> $r_n[name]</th>
                 <th> $r_pn[ph_number] </th>
                 <th> $res[date] </th>
                 <th> $res[time] </th>
                 <th> $res[symptoms] </th>
                 
                               
                 </tr>";
             }
            ?>
        </table>
</body>
</html>