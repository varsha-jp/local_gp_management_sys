<!DOCTYPE html>
<?php
include("connect.php");
include("header.php");
if(isset($_POST['submit']))
{
    echo"insert";
$sql = "INSERT INTO nurses(name,password,  license_number, ph_number) VALUES ('$_POST[nursename]',MD5('$_POST[password]'),'$_POST[nurselic]','$_POST[nurseph]')";
    if ($con->query($sql) == TRUE) 
    {
        echo "New record created successfully";
    } 
    else 
    {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
?>
<html>
<head>
    <title>Add Nurse</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body class="patient-reg-body">
    <h1 class="landing-h1">Add New Nurse</h1>
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
        <!-- <h4>Add New Nurse</h4> -->
        <div>
            <form action="" method="post" class="patient-reg-form">
            <label>NURSE'S NAME</label>
                <input type="text" name="nursename" id="nursename" class="form" placeholder="Nurse's Name" required /><br>
            <label>NURSE'S PASSWORD</label>
                <input type="password" name="password" id="password" class="form" placeholder="Nurse's Password" required/><br>
            <label>NURSE'S LICENSE NUMEBR</label>
                <input type="text" name="nurselic" id="nurselic" class="form" placeholder="Nurse's License Number" required/><br>
            <label>NURSE'S CONTACT NUMEBR</label>
                <input type="text" name="nurseph" id="nurseph" class="form" placeholder="Nurse's Contact Number" required/><br>
                <label>
                    <input type="submit" name="submit" id="submit" value="Add Nurse" />
                </label>
    </form>
    <div>
    </div>
</body>
</html>