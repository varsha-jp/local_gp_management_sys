<!DOCTYPE html>
<?php
include("connect.php");
include("header.php");
?>

<html>
<head>
    <title>About Us</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body class="about-body">
    <!-- <h1 class="landing-h1">The Clinic Management System</h1> -->
    <h4>About Us</h4>
    <div>
        <table class="about-table">
        
            <?php
            $sql_doc_list = "SELECT * from doctors";
            $r_sql_doc_list=mysqli_query($con,$sql_doc_list);
            while($row1 = mysqli_fetch_array($r_sql_doc_list))
            {
                echo "<tr>
                <th class='about-tab-tr width='150'><img src='doctor_images/$row1[license_number].png' width='200' height='200'></th>
                <th class='about-tab-tr width='150'>
                $row1[name]<br>
                Doctor's ID:    $row1[doctorID]<br>
                Contact Number:    $row1[ph_number]<br>
                License Number:    $row1[license_number]<br>
                </th>
                </tr>";
            }
            ?>            
        </table>
        </div>
</body>
</html>