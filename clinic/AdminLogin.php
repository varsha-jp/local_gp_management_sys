<!DOCTYPE html>
<?php
include("header.php");
session_start();
include("connect.php");
if(!empty($_POST['submit']))
{
    $pass = $_POST['password'];
    $pass = md5($pass);
    // echo "$pass <br>";
    $mysql = "SELECT * FROM admin WHERE adminID = '$_POST[adminid]' AND password = '$pass' ";
    // $sid = $_POST[doctorid];
    // echo "$mysql<br>";
    $sql1 = mysqli_query($con, $mysql);
    // echo $sql1;
    if(mysqli_num_rows($sql1) == 1)
    {
        $res = mysqli_fetch_array($sql1);
        $_SESSION['adminid'] = $res['adminID'];
        header("Location: AdminHome.php");
    }
    else
    {
        echo"<h1> TRY AGAIN !</h1>";
    }
}
?>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body class="doc-login-body">
    <h1 class="landing-h1">Hello Admin</h1>
    <div class="patient-reg-form-input">
    <form action="" method="post">
        <div class="input">
                <div>
                    <input type="text" name="adminid" id="adminid" class="form-login" placeholder="Username" />
                </div>
                <div>
                    <input type="password" name="password" id="password" class="form-login" placeholder="Password" />
                </div>
                <input type="submit" name="submit" id="submit" value="Login"/>
                </div>
        </div>
</form>
    </div>
</body>
</html>