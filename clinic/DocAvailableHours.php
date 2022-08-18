<!DOCTYPE html>
<?php
include("connect.php");
include("header.php");
session_start();
if (isset($_POST['submit']))
{
    // $sql = "SELECT * FROM doctors WHERE doctorID = '$_SESSION[doctorid]'";
    // $sql3 = mysqli_query($con, $sql);
    // $res = mysqli_fetch_array($sql3);
    // echo"insert";
    $sql1="SELECT date FROM hours WHERE doctorID = '$_SESSION[doctorid]' AND date='$_POST[date]'";
    $result = mysqli_query($con,$sql1);
    $rowcount1 = mysqli_num_rows($result);
    if($rowcount1 == 0)
    {
        $sql = "INSERT INTO hours(doctorID, start_time, end_time, date) VALUES ('$_SESSION[doctorid]','$_POST[stime]','$_POST[etime]', '$_POST[date]')";
        if ($con->query($sql) == TRUE) 
        {
            echo "<script type='text/javascript'>alert('New hours added successfully');</script>";
            // header(DoctorHome.php);
        } 
        else 
        {
            echo "<script type='text/javascript'>alert('New hours unsuccessfully');</script>";
        }
    }
    else 
    {
        $sql2 = "UPDATE hours SET start_time='$_POST[stime]', end_time='$_POST[etime]' WHERE doctorID = '$_SESSION[doctorid]' AND date='$_POST[date]'";
        if ($con->query($sql2) == TRUE) 
        {
            echo "<script type='text/javascript'>alert('New hours updated successfully');</script>";

        } 
        else{
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
}
?>
<html>
<head>
    <title>Doctor's Available Hours</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body class="view-doc-hours-body">
    <h1 class="landing-h1">Edit Available Hours</h1>
    <!-- <div>
        <table class="landing-tab">
            <tr>
                <th width="150">Home</th>
                <th width="150">Services</th>
                <th width="150">Suppport</th>
                <th width="150">About</th>
                <th width="150">Feedback</th>
            </tr>
        </table>
        <div> -->
        <div>
        <a href = "DoctorHome.php" style="padding-top: 32px">
            <input class="back" type="button" value="Back">
        </a>
        </div>
                <div>
                    <h5>Current Available Hours</h5>
                    <table class="view-doc-hours-tab">
                        <tr>
                            <th width="150">DOCTOR ID</th>
                            <th width="150">DOCTOR's NAME</th>
                            <th width="150">DATE</th>
                            <th width="150">START TIME</th>
                            <th width="150">END TIME</th>
                        </tr>
                        <?php
                         $sql = "SELECT * FROM hours WHERE doctorID = '$_SESSION[doctorid]' AND date > CURDATE() ORDER BY date";
                         $n = "SELECT * FROM doctors WHERE doctorID = '$_SESSION[doctorid]'";
                         $sql1 = mysqli_query($con,$sql);
                         $sql_n = mysqli_query($con,$n);
                         $r = mysqli_fetch_array($sql_n);
                         while($res = mysqli_fetch_array($sql1))
                         {
                             echo"
                             <tr>
                             <th> $res[doctorID] </th>
                             <th> $r[name] </th>
                             <th> $res[date] </th>
                             <th> $res[start_time] </th>
                             <th> $res[end_time] </th>
                             </tr>";
                         }
                        ?>
                    </table>
                </div>
                <h4>Add New Hours</h4>
                <form class="book-appt-form" method="post" name="doc-avahours" id="doc-avahours" onsubmit="">
                <div>
                    <div>
                    <label>DATE</label>
                    <input type="date" name="date" id="date"/><br>
                        <label>START TIME</label>
                            <input type="time" name="stime" id="stime" class="form-ava" placeholder="Start Time" />
                            <label>END TIME</label>
                            <input type="time" name="etime" id="etime" class="form-ava" placeholder="End Time" />                    </div>
                    <div>
                        <label>
                            <input type="submit" name="submit" id="submit" value="ADD" />
                        </label>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>