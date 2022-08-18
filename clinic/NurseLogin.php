<!DOCTYPE html>
<?php
session_start();
include("connect.php");
include("header.php");
if(!empty($_POST['submit']))
{
    $pass = $_POST['password'];
    $pass = md5($pass);
    $mysql = "SELECT * FROM nurses WHERE nurseID = '$_POST[nurseid]' AND password = '$pass' ";
    $sql1 = mysqli_query($con, $mysql);
    if(mysqli_num_rows($sql1) == 1)
    {
        $res = mysqli_fetch_array($sql1);
        $_SESSION['nurseid'] = $res['nurseID'];
        header("Location: NurseHome.php");
    }
    else
    {
        echo"<h1> TRY AGAIN !</h1>";
    }
}
?>
<html>
<head>
    <title>Nurse Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body class="doc-login-body">
    <h1 class="landing-h1">Hello Nurse</h1>
    <form action="" method="post">
    <div class="patient-reg-form-input">
        <div><label> NURSE ID </label>
            <input type="text" name="nurseid" id="nurseid" class="form-login" placeholder="Nurse ID" />
        </div>
        <div> <label> PASSWORD </label>
            <input type="password" name="password" id="password" class="form-login" placeholder="Password" />
        </div>
        <div>
        <input type="submit" name="submit" id="submit" value="Login"/>
        </div>
    </div>
    </form>
</body>
</html>