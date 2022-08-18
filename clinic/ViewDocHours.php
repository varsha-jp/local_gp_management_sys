<!DOCTYPE html>
<?php
include("connect.php");
include("header.php");
// session_start();
?>
<html>
<head>
    <title>Avaiable Hours</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body class="view-doc-hours-body">
    <h1 class="landing-h1">All Available Doctors</h1>
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
        <table class="view-doc-hours-tab">
            <tr>
                <th width="150">DOCTOR ID</th>
                <th width="150">DOCTOR'S NAME</th>
                <th width="150">DATE</th>
                <th width="150">START TIME</th>
                <th width="150">END TIME</th>
            </tr>
            <?php
             $sql = "SELECT * FROM hours WHERE date > CURDATE() ORDER BY date";
             $sql1 = mysqli_query($con,$sql);
             while($res = mysqli_fetch_array($sql1))
             { 
                 $sql2 = "SELECT * FROM doctors WHERE doctorID = '$res[doctorID]'";
                 $res_name=mysqli_query($con,$sql2);
                 $r_n = mysqli_fetch_array($res_name);
                 echo"
                 <tr> 
                 <th> $res[doctorID] </th>
                 <th> $r_n[name]</th>
                 <th> $res[date] </th>
                 <th> $res[start_time] </th>
                 <th> $res[end_time] </th>
                 </tr>";
             }
            ?>
    </table>
    <p>
            
    </p>
    <form>
        <input type="button" value="Back" onclick="history.back()">
    </form>
</body>
</html>