<!DOCTYPE html>
<?php
session_start();
include("connect.php");
include("header.php");
    // $var = 'block';
        
if(isset($_POST['submit']))
{

    //Counting the appoitnments for the given date
    $sql_date="SELECT date FROM appointments WHERE patientID = '$_SESSION[patientid]' AND date='$_POST[appt_date]' AND doctorID = '$_POST[doctorid]'";
    $result = mysqli_query($con,$sql_date);
    $rowcount = mysqli_num_rows($result);

    //If there are no active appointment for the given date
    if($rowcount == 0)
    {
        //Selecting patients name for SQL insert query
        $sql_p = "SELECT * FROM patients WHERE patientID = '$_SESSION[patientid]'";
        $sql_p_q = mysqli_query($con,$sql_p);
        $r_p = mysqli_fetch_array($sql_p_q);

        //Inserting new appointment into the appointments table
        $sql_in_a = "INSERT INTO appointments( patientname, date, time, symptoms, patientID, doctorID, status) VALUES ('$r_p[name]','$_POST[appt_date]','$_POST[appt_time]','$_POST[symptoms]','$_SESSION[patientid]', '$_POST[doctorid]', 'active')";

        if ($con->query($sql_in_a) == TRUE) 
        {
            echo "<script type='text/javascript'>alert('Appointment booked successfully');</script>";
            // header(PatientHome.php);
        } 
        else 
        {
            echo "Appointment already booked for " .$_POST['appt_date']. " with ". $_POST['doctorid'];
        }
    }
    else
    {
        //Update if an appointment with the doctor is already made for the given date
        $sql_update = "UPDATE appointments SET date='$_POST[appt_date]', time='$_POST[appt_time]', symptoms = '$_POST[symptoms]', doctorID ='$_POST[doctorid]' WHERE patientID = '$_SESSION[patientid]' AND doctorID = '$_POST[doctorid]'";

        if ($con->query($sql_update) == TRUE) 
        {
            echo "<script type='text/javascript'>alert('New hours successfully updated');</script>";
        } 
        else
        {
            echo "Error: " . $sql_update . "<br>" . $con->error;
        }
    }
}
?>
<?php 
 
?>
<DOCTYPE html>
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
    <form>
                 <a href = 'PatientHome.php' style="padding-top: 20px;">
                         <input type='button' class='back' value='Back'>
                         </a>
                 </form>
    <div>
    <?php     
    
    //Checking for active appointments for the patient in session
     $sql_active = "SELECT * FROM appointments WHERE patientID = '$_SESSION[patientid]' AND status = 'active' ";
     $sql_active_q = mysqli_query($con,$sql_active);
     $rowcount1 = mysqli_num_rows($sql_active_q);   

    //Display active appointments for patient in session
    if($rowcount1 > 0)
    {
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
                
            //Fetching from appointments table
             while($res_active = mysqli_fetch_array($sql_active_q))
             { 
                 //Query to retrive doctor's details
                 $sql_doc_name = "SELECT * FROM doctors WHERE doctorID = '$res_active[doctorID]'";
                 $sql_doc_name_q=mysqli_query($con,$sql_doc_name);
                 $r_doc_name = mysqli_fetch_array($sql_doc_name_q);

                 //Query to retrive patient's details
                 $sql_p_det = "SELECT * FROM patients WHERE patientID = '$_SESSION[patientid]'";
                 $sql_p_det_q=mysqli_query($con,$sql_p_det);
                 $r_p_det = mysqli_fetch_array($sql_p_det_q);
                 
                 echo"
                 <tr> <form action='BookAppointment.php'>
                 <th> $res_active[patientID] </th>
                 <th> $r_p_det[name]</th>
                 <th> $res_active[doctorID] </th>
                 <th> $r_doc_name[name]</th>
                 <th> $r_p_det[ph_number] </th>
                 <th> $res_active[date] </th>
                 <th> $res_active[time] </th>
                 <th> $res_active[symptoms] </th>
                 </form> </th>
                 </tr>
                 ";
             }
             echo "
             </table>
                 <p>
            
                 </p>";
    }
    else
    {
        echo"<h4>No Active Appointments</h4>";
    }
    ?>
    </div>

        
            <!-- <form method="post" name="bookappointment" id="appointment" class="book-appt-form" onsubmit=""> -->
            <h5>Book New Appointment or Update Existing </h5>
            
            <!-- Display patient's name -->

                <h4> PATIENT'S NAME <?php
                    $sql_p_name = "SELECT * FROM patients WHERE patientID = '$_SESSION[patientid]'";
                    $sql_p_name_q = mysqli_query($con,$sql_p_name);
                    $r_p_name = mysqli_fetch_array($sql_p_name_q);
                    echo "$r_p_name[name]";
                ?></h4>
                
            <!-- Form to select a doctor to view their avaliable hours -->
            
            <div>
            <form id="doctor_div" class="book-appt-form" method="post" action="" >   
                <h5>Find Doctor</h5>
                <label> DOCTOR </label>
                <?php
                    echo"<select name='doctorid' required>
                    <option value=''></option>";
                    $sql_doc_list = "SELECT * from doctors";
                    $r_sql_doc_list=mysqli_query($con,$sql_doc_list);
                    while($row1 = mysqli_fetch_array($r_sql_doc_list))
                    {
                        echo "<option value='$row1[doctorID]'> $row1[name] </option>";
                    }
                    echo "</select>";
                ?>
                <input type="submit" name="submit2" id="submit2" value="Search"/><br>
            </form>
            <div>
                    <!-- <input type="text" name="doctorid" oninvalid="this.setCustomValidity('Please enter valid Doctor ID')" pattern="[0-9]+" id="doctorid" placeholder="Doctor's ID" required/><br> -->


                       
            <?php 
            if(isset($_POST['submit2']))
            {
                $sql_d_n = "SELECT * FROM doctors WHERE doctorID = '$_POST[doctorid]'";
                $sql_d_n_q=mysqli_query($con,$sql_d_n);
                $r_d_n = mysqli_fetch_array($sql_d_n_q);

                echo"
                <div id='doctor_date'>
                <form class= 'book-appt-form' method='post' action=''>
                    <h5>Select Date for Dr. $r_d_n[name]</h5>
                    <label> AVAILABLE DATES </label>
                    
                    <select name='appt_date' required>
                        <option value=''></option>";
                        $sql_date_list = "SELECT * from hours WHERE doctorID = '$_POST[doctorid]' AND date > CURDATE()";
                        $r_sql_date_list=mysqli_query($con,$sql_date_list);
                        while($row3 = mysqli_fetch_array($r_sql_date_list))
                        {
                            echo "<option value='$row3[date]'> $row3[date] </option>";
                        }
                echo "</select>
                    <button class='appt-button' type='submit' name='submit1' id='submit1' value='$_POST[doctorid]'/>Select</button>
                </form>
                </div>
                ";
            }
            ?>



<!-- <input type='submit' name='submit1' id='submit1' value='Select'/><br> -->


    <!-- When the doctors name id selected the following php code generates the avaliable appointments -->
    <?php
    error_reporting(E_ALL & ~E_NOTICE);
        if(isset($_POST['submit1']))
        {
            //This form is auto populated by clicking the required appointment on the table

            $doc_id= $_POST['submit1'];

            $sql_d_n = "SELECT * FROM doctors WHERE doctorID = '$doc_id'";
                $sql_d_n_q=mysqli_query($con,$sql_d_n);
                $r_d_n = mysqli_fetch_array($sql_d_n_q);

                echo"
                <div id='doctor_date' style='display:block'>
                <form class= 'book-appt-form' method='post' action=''>
                    <h5>Select Date for Dr. $r_d_n[name]</h5>
                    <label> AVAILABLE DATES </label>
                    
                    <select name='appt_date' required>
                        <option value=''></option>";
                        $sql_date_list = "SELECT * from hours WHERE doctorID = '$doc_id' AND date > CURDATE()";
                        $r_sql_date_list=mysqli_query($con,$sql_date_list);
                        while($row3 = mysqli_fetch_array($r_sql_date_list))
                        {
                            echo "<option value='$row3[date]'> $row3[date] </option>";
                        }
                echo "</select>
                    <button class='appt-button' type='submit' name='submit1' id='submit1' value='$doc_id'/>Select</button>
                </form>
                </div>
                ";

            

            // echo $doc_id;
            echo "
            <div>
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
            </div>

            <h4>Click on a Time below and fill in your Symptoms</h4>
                <table id='table-appt' class='book-appt-tab'>
                <tr>
                    <td style='display:none;' width='150'>APPOINTMENT TIME</td>
                    <td style='display:none;' width='150'>APPOINTMENT TIME</td>
                    <th width='150'>APPOINTMENT TIME</th>
                    <td style='display:none;' width='150'>APPOINTMENT DATE</td>
                </tr>";
            
            //Query to dispaly selected doctors details
            $sql_doc = "SELECT * FROM doctors WHERE doctorID = $doc_id";
            $sql_doc_q=mysqli_query($con,$sql_doc);
            $r_doc = mysqli_fetch_array($sql_doc_q);

            // For Doctor's ID  = $r_doc[doctorID] 
            echo "<h4> Dr. $r_doc[name]'s avaliable appointments on $_POST[appt_date]</h4>";

            //Query to obtain doctors avaliable hours
            $sql_hours = "SELECT * FROM hours WHERE doctorID = $doc_id AND date = '$_POST[appt_date]'";
            $sql_hours_q = mysqli_query($con,$sql_hours);
            $r_hours_date = mysqli_fetch_array($sql_hours_q);

            $sql_r = "SELECT * FROM appointments WHERE doctorID = $doc_id AND date = '$_POST[appt_date]'";
            $res_r = mysqli_query($con,$sql_r);

            // print_r($r_r);
            // foreach ($r_r as $a){
            // echo "$a <br>";
            // }
            // echo "$r_r[0] <br>";
            // echo "$r_r[1] <br>";
            
            $rowcount2 = mysqli_num_rows($res_r);
            $rowcount3 = mysqli_num_rows($sql_hours_q);

            // echo $r_r;
            // echo "$rowcount2 <br>";

            $array_active_appt=[];

            if($rowcount2 > 0)
            { 
                while($r_r = mysqli_fetch_array($res_r))
                {
                    // echo "$r_r[time] <br>";
                    $a=date('H:i:s', strtotime($r_r['time']));
                    array_push($array_active_appt, $a );
                }
            }

            $x=0;
            $y=0;
            $d=0;

            // $array_dates[]=[];

            // while($res_hours = mysqli_fetch_array($sql_hours_q))
            //  { 
            //     $a=date('H:i:s', strtotime($res_hours['date']));
            //     array_push($array_dates, $a );
            //  }

            $x = date('H:i:s', strtotime($r_hours_date['start_time']));
            $y = date('H:i:s', strtotime($r_hours_date['end_time']));
            $d=$x;
            // echo "$x <br>";
            // echo "$y <br>";
            $in=0;

            $array_intervals=[$d];

            // print_r($array_intervals);
            while($d < $y)
            {
                $d = date('H:i:s', strtotime( $d. ' +10 minutes'));
                array_push($array_intervals, $d );
                $in++;
                // echo "$d <br>";
            }
            // echo $int;
            // print_r($array_intervals);
            // print_r($array_active_appt);
            // echo "<br>";

            $array_final=array_diff($array_intervals, $array_active_appt);

            // print_r($array_final);
            // $final_count=count($array_final);

            //While loop to obtain doctors avaliable hours
            
                // echo $d;
                // echo $y;
                
                for ($i=0; $i<$in; $i++)
                {
                    // for ($j=1; $j<=1; $j++)
                    // {
                    
                    // echo $array_active_appt[$i];
                    // $d = $x;

                    // echo "$d <br>";

                    //While loop to create 10 minute intervals for appointments for the start and end time from the hours table
                    // while($d != $y)
                    // {   
                    //     $d = date('H:i:s', strtotime( $d. ' +10 minutes'));

                    //     // echo "$d <br>";
                    //     // echo "$array_active_appt[$i] <br>";

                        if($array_final[$i] != '')
                        {
                            //doctor ID, date and name as is required to fill the form
                            echo"
                            <tr> 
                            <td style='display:none;'> $r_doc[doctorID] </td>
                            <td style='display:none;'>  $r_doc[name] </td>
                            <th> $array_final[$i] </th>
                            <td style='display:none;'> $r_hours_date[date] </td>
                            </tr>";
                            // echo "$d <br>";
                        }
                        else
                        {
                            continue;
                        }
                    // }
                }
            // }

            //JavaScript to fill the form automatically
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
             <!-- </form> -->
        </div>
</body>
</html>
<script type='text/javascript'>
        var doc_name_submit = document.getElementById('submit2');
        
        doc_name_submit.onclick = function(){
            console.log('Hello world!');
            var doc_name_submit_form = document.getElementById('doctor_div');
            doc_name_submit_form.style.display = 'none';
        }

</script>
               