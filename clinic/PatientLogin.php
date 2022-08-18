<!DOCTYPE html>
<?php
session_start();
include("connect.php");
include("header.php");
if(!empty($_POST['submit']))
{
    $pass = $_POST['password'];
    $pass = md5($pass);
    $mysql = "SELECT * FROM patients WHERE patientID = '$_POST[patientid]' AND password = '$pass' ";
    $sql1 = mysqli_query($con, $mysql);
    if(mysqli_num_rows($sql1) == 1)
    {
        // echo"hello";
        $res = mysqli_fetch_array($sql1);
        $_SESSION['patientid'] = $res['patientID'];
        header("Location: PatientHome.php");
    }
    else
    {
        echo"<h1> TRY AGAIN !</h1>";
    }
}
?>
<html>
<head>
    <title>Patient Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body class="patient-login-body">
    <h1 class="landing-h1">Patient Login</h1>
    <div>
    <form action="" method="post">
         <div class="patient-login">
                <div>
                <label> USERID </label>
                    <input type="text" name="patientid" id="patientid" class="form-login" placeholder="UserID" />
                </div>
                <div>
                <label> PASSWORD </label>
                    <input type="password" name="password" id="password" class="form-login" placeholder="Password" />
                </div>
                <div>
                <input type="submit" name="submit" id="submit" value="Login"/>
                </div>
         </div>
</form>
    </div>
</body>
</html>