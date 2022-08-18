<!DOCTYPE html>
<?php
include("connect.php");
include("header.php");
if (isset($_POST['submit']))
{
    $sql = "UPDATE medicines SET name='$_POST[medicinename]', quantity='$_POST[medquan]', cost='$_POST[medcost]' WHERE medicineID = '$_POST[medicineid]'";
    if ($con->query($sql) == TRUE) 
    {
        echo "Medicine updated";
    } 
    else 
    {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
?>
<html>
<head>
    <title>Edit Medicine</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body class="patient-reg-body">
    <h1 class="landing-h1">Edit Medicine Details</h1>
    <div>
        <!-- <table class="landing-tab">
            <tr>
                <th width="150">Home</th>
                <th width="150">Services</th>
                <th width="150">Support</th>
                <th width="150">About</th>
                <th width="150">Feedback</th>
            </tr>
        </table> -->
        <div>
            
        <form action="" method="post" class="patient-reg-form">
            <div class="input">
            <label>MEDICINE'S ID <input type="text" name="medicineid" id="medicineid" class="form" placeholder="Medicine's ID" />
                </label><br>
            <label>MEDICINE'S NAME <input type="text" name="medicinename" id="medicinename" class="form" placeholder="Medicine's Name" />
                </label><br>
                <label>
                MEDICINE'S QUANTITY <input type="text" name="medquan" id="medquan" class="form" placeholder="Medicine's Quantity" />
                </label><br>
                <label>
                MEDICINE'S COST <input type="number" name="medcost" id="medcost" class="form" placeholder="Medicine's Cost" />
                </label><br>
                <label>
                    <input type="submit" name="submit" id="submit" value="Edit Medicine" />
                </label>
            </div>
    </form>
        </div>
    </div>
</body>
</html>