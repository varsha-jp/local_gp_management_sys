<?php
session_start();
include("connect.php");
include("header.php");
if(isset($_POST['submit']))
{
    $sql2="SELECT date FROM appointments WHERE patientID = '$_SESSION[patientid]' AND date='$_POST[appt_date]' AND doctorID = '$_POST[doctorid]'";
    $result = mysqli_query($con,$sql2);
    $rowcount1 = mysqli_num_rows($result);
    if($rowcount1 == 0)
    {
    $sql = "SELECT * FROM patients WHERE patientID = '$_SESSION[patientid]'";
    $sql1 = mysqli_query($con,$sql);
    $r = mysqli_fetch_array($sql1);
    $sql = "INSERT INTO appointments( patientname, date, time, symptoms, patientID, doctorID, status) VALUES ('$r[name]','$_POST[appt_date]','$_POST[appt_time]','$_POST[symptoms]','$_SESSION[patientid]', '$_POST[doctorid]', 'active')";
    if ($con->query($sql) == TRUE) 
    {
        echo "<script type='text/javascript'>alert('Appointment booked successfully');</script>";
        header(PatientHome.php);
    } 
    else 
    {
        echo "Appointment already booked for " .$_POST['appt_date']. " with ". $_POST['doctorid'];
    }
}
else{
    $sql2 = "UPDATE appointments SET date='$_POST[appt_date]', time='$_POST[appt_time]', symptoms = '$_POST[symptoms]', doctorID ='$_POST[doctorid]' WHERE patientID = '$_SESSION[patientid]' AND doctorID = '$_POST[doctorid]'";
    if ($con->query($sql2) == TRUE) 
{
    echo "<script type='text/javascript'>alert('New hours successfully updated');</script>";
} 
else{
    echo "Error: " . $sql . "<br>" . $con->error;
}
}
}
?>
<html>
<head>
    <title>Book Appointment</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body class="book-appt">
    <h1 class="landing-h1">Book an Appointment</h1>
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
    </div> -->
    <div>
    <?php       
     $sql = "SELECT * FROM appointments WHERE patientID = '$_SESSION[patientid]' AND status = 'active' ";
     $sql1 = mysqli_query($con,$sql);
     $rowcount = mysqli_num_rows($sql1);   
    if($rowcount > 0){
        echo"
    <h5>Current Appointments</h5>
                    <table class='view-doc-hours-tab'>
            <tr>
                <th width='150'>PATIENT ID</th>
                <th width='150'>PATIENT'S NAME</th>
                <th width='150'>DOCTOR ID</th>
                <th width='150'>DOCTOR NAME</th>
                <th width='150'>CONTACT NUMBER</th>
                <th width='150'>APPOINTMENT DATE</th>
                <th width='150'>APPOINTMENT TIME</th>
                <th width='150'>SYMPTOMS</th>
            </tr>";            
             while($res = mysqli_fetch_array($sql1))
             { 
                 $sql2 = "SELECT * FROM doctors WHERE doctorID = '$res[doctorID]'";
                 $res_name=mysqli_query($con,$sql2);
                 $r_n = mysqli_fetch_array($res_name);

                 $sqlp2 = "SELECT * FROM patients WHERE patientID = '$res[patientID]'";
                 $res_pname=mysqli_query($con,$sqlp2);
                 $r_pn = mysqli_fetch_array($res_pname);
                 echo"
                 <tr> <form action='BookAppointment.php'>
                 <th> $res[patientID] </th>
                 <th> $r_pn[name]</th>
                 <th> $res[doctorID] </th>
                 <th> $r_n[name]</th>
                 <th> $r_pn[ph_number] </th>
                 <th> $res[date] </th>
                 <th> $res[time] </th>
                 <th> $res[symptoms] </th>
                 </form> </th>
                 </tr>
                 
                 ";
             }
             echo "
             </table>

                 <p>
            
                 </p>
             <form>
                         <input type='button' value='Done' onclick='history.back()'>
                 </form>";
            }
            else{
                echo"<h4>No Active Appointments</h4>";
            }
            ?>
                </div>
        <div>
            <form method="post" name="bookappointment" id="appointment" class="book-appt-form" onsubmit="">
            <h5>Book New Appointment or Update Existing </h5>
                <h4> PATIENT'S NAME <?php
                    $sql = "SELECT * FROM patients WHERE patientID = '$_SESSION[patientid]'";
                    $sql1 = mysqli_query($con,$sql);
                    $r = mysqli_fetch_array($sql1);
                    echo "$r[name]";
                ?></h4>
                
                <form method="post" action="">
                    
                <h5>Find Doctor</h5>

                <label> DOCTOR </label>
                <?php
                echo"<select name='doctorid' required>
                <option value=''></option>";
                $sql_q = "SELECT * from doctors";
                $r_sql_q=mysqli_query($con,$sql_q);
                while($row1 = mysqli_fetch_array($r_sql_q)){
                    echo "<option value='$row1[doctorID]'> $row1[name] </option>";
                }
                echo "</select>";
                ?>
                
                <input type="submit" name="submit1" id="submit1" value="Search"/><br>
                </form>
                    <!-- <input type="text" name="doctorid" oninvalid="this.setCustomValidity('Please enter valid Doctor ID')" pattern="[0-9]+" id="doctorid" placeholder="Doctor's ID" required/><br> -->

                <!--  -->

    <?php
        if(isset($_POST['submit1']))
        {
            echo "
            <form action='BookAppointment.php' method='post' class='book-appt-form'>

            <label> DOCTOR'S ID</label>
            <input type='text' name='doctorid' id='doctorid' placeholder='Doctors ID' maxlength='0' required/><br>
    
            <label>SYMPTOMS</label>
            <input type='text' name='symptoms' id='symptoms' placeholder='Symptoms' required /><br>
    
            <label> APPOINTMENT DATE </label>
                <input type='text' name='appt_date' id='appt_date' placeholder='yyyy-mm-dd' maxlength='0' required/><br>
    
            <label> APPOINTMENT TIME </label>
                <input type='text' name='appt_time' id='appt_time' maxlength='0' required /><br>
                            
            <button class='appt-button' type='submit' name='submit' id='submit' value=''/>Book</button>
    
        </form>

<h4>Click on a time and date below</h4>
            <table id='table-appt' class='book-appt-tab'>
            <tr>
                <th width='150'>DOCTOR ID</th>
                <th width='150'>DOCTOR NAME</th>
                <th width='150'>APPOINTMENT TIME</th>
                <th width='150'>APPOINTMENT DATE</th>
            </tr>";
            $sql = "SELECT * FROM hours WHERE doctorID = '$_POST[doctorid]'";
            $sql1 = mysqli_query($con,$sql);
             while($res = mysqli_fetch_array($sql1))
             { 
                 $sql2 = "SELECT * FROM doctors WHERE doctorID = '$res[doctorID]'";
                 $res_name=mysqli_query($con,$sql2);
                 $r_n = mysqli_fetch_array($res_name);

                $x = date('H:i:s', strtotime($res['start_time']));
                $y = date('H:i:s', strtotime($res['end_time']));
                $d = $x;

                // echo $d;
                // echo $y;
                
               while($d != $y)
                {   
                    $d = date('H:i:s', strtotime( $d. ' +10 minutes'));
                    echo"
                    <tr> 
                    <th> $r_n[doctorID] </th>
                    <th> $r_n[name] </th>
                    <th> $d </th>
                    <th> $res[date] </th>
                    </tr>";
                }
            }
        echo "</table>
        
        <script type='text/javascript'>
            var tab = document.getElementById('table-appt');
            for(var a=1; a<tab.rows.length;a++)
            {
                tab.rows[a].onclick = function()
            {
                document.getElementById('doctorid').value=this.cells[0].innerHTML;
                document.getElementById('appt_time').value=this.cells[2].innerHTML;
                document.getElementById('appt_date').value=this.cells[3].innerHTML;
                // document.getElementById('doctorid').value=this.cells[0].innerHTML;
            };
            }
            </script>"; 
        }
    ?>
        </form>
    </div>
</body>
</html>


