<!DOCTYPE html>
<?php
include("connect.php");
include("header.php");
if(isset($_POST['submit']))
{
$sql = "INSERT INTO medicines(name,quantity,cost) VALUES ('$_POST[medicinename]','$_POST[medquan]','$_POST[medcost]')";
if ($con->query($sql) == TRUE) 
{
    echo "<script type='text/javascript'>alert('New medicine added successfully');</script>";
    // header(DoctorHome.php);
} 
else 
{
    echo "<script type='text/javascript'>alert('New medicine unsuccessfully');</script>";
}
}
?>
<html>
<head>
    <title>Add Medicine</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body class="patient-reg-body">
    <h1 class="landing-h1">Add New Medicine</h1>
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
        <!-- <h4>Add New Medicine</h4> -->
        <div>
            <form action="" method="post" class="patient-reg-form">
            <label>MEDICINE'S NAME</label>
                <input type="text" name="medicinename" id="medicinename" class="form" placeholder="Medicine's Name" required/><br>
            <label>MEDICINE'S QUANTITY</label> 
                <input type="text" name="medquan" id="medquan" class="form" placeholder="Medicine's Quantity" required/><br>
            <label>MEDICINE'S COST</label>
                <input type="number" name="medcost" id="medcost" class="form" placeholder="Medicine's Cost" required/><br>
                <label>
                    <input type="submit" name="submit" id="submit" value="Add Medicine" required/>
                </label>
    </form>
    <div>
    </div>
</body>
</html>