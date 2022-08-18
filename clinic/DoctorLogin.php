<!DOCTYPE html>
<?php
session_start();
include("connect.php");
include("header.php");
if(!empty($_POST['submit']))
{
    // $password = $_POST['password'];
    // $password = md5($password);
    // $password = md5()
    // $pass = mysqli_real_escape_string($con$_POST['password']);
    $pass = $_POST['password'];
    $pass = md5($pass);

    // echo "$pass <br>";
    $mysql = "SELECT * FROM doctors WHERE doctorID = '$_POST[doctorid]' AND password = '$pass' ";
    // $sid = $_POST[doctorid];
    // echo "$mysql<br>";
    $sql1 = mysqli_query($con, $mysql);
    // echo $sql1;
    if(mysqli_num_rows($sql1) == 1)
    {
        $res = mysqli_fetch_array($sql1);
        $_SESSION['doctorid'] = $res['doctorID'];
        header("Location: DoctorHome.php");
    }
    else
    {
        echo"<h1> TRY AGAIN !</h1>";
    }
}
?>
<html>
<head>
    <title>Doctor Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body class="doc-login-body">
    <h1 class="landing-h1">Doctor Login</h1>
    <div>
    <form action="" method="post">
        <div class="patient-reg-form-input">
            <div><label> DOCTOR ID </label>
                    <input type="text" name="doctorid" id="doctorid" class="form-login" placeholder="Doctor ID" />
            </div>
                <div> <label> PASSWORD </label>
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