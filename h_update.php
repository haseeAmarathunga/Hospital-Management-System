<!DOCTYPE html>
<html>
<head>
  <title>Test Results</title>
</head>
<body style="background-color: #006064;">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css" type="text/css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div id="header" style="height: 150px;">
    <div>

      <ul id="navigation">
        <li>
          <a href="h_index.php">Home</a>
        </li>
        <li class="active">
          <a href="h_patients.php">Patients</a>
        </li>
        <li>
          <a href="h_wards.php">Wards</a>
        </li>
        <li>
          <a href="h_doctors.php">Doctors</a>
        </li>
        <li>
          <a href="h_tests.php">Tests</a>
        </li>
      </ul>
    </div>
</div>

<?php
session_start();



//connecting database
$db = mysqli_connect("localhost","root", "","hospital_sys") or die("Error connecting to database");


if(isset($_POST['name-btn'])){
        
        $mypid = mysql_real_escape_string($_POST['pid']);
        $myname = mysql_real_escape_string($_POST['name']);

        

        
        $sql = "UPDATE patient SET name='$myname' WHERE pid='$mypid'";
        
        mysqli_query($db,$sql);
        
  

    }
if(isset($_POST['nic-btn'])){
        
        $mypid = mysql_real_escape_string($_POST['pid']);
        $mynic = mysql_real_escape_string($_POST['nic']);

        

        
        $sql = "UPDATE patient SET nic='$mynic' WHERE pid='$mypid'";
        
        mysqli_query($db,$sql);
        
  

}
if(isset($_POST['contact-btn'])){
        
        $mypid = mysql_real_escape_string($_POST['pid']);
        $mycontact = mysql_real_escape_string($_POST['contact']);

        

        
        $sql = "UPDATE patient SET contact='$mycontact' WHERE pid='$mypid'";
        
        mysqli_query($db,$sql);
        
  

    }

if(isset($_POST['adrs-btn'])){
        
        $mypid = mysql_real_escape_string($_POST['pid']);
        $myadrs = mysql_real_escape_string($_POST['adrs']);

        

        
        $sql = "UPDATE patient SET address='$myadrs' WHERE pid='$mypid'";
        
        mysqli_query($db,$sql);
        
  

}

if(isset($_POST['age-btn'])){
        
        $mypid = mysql_real_escape_string($_POST['pid']);
        $myage = mysql_real_escape_string($_POST['age']);

        

        
        $sql = "UPDATE patient SET age='$myage' WHERE pid='$mypid'";
        
        mysqli_query($db,$sql);
        
  

}

if(isset($_POST['gender-btn'])){
        
        $mypid = mysql_real_escape_string($_POST['pid']);
        $mygender = mysql_real_escape_string($_POST['gender']);

        

        
        $sql = "UPDATE patient SET gender='$mygender' WHERE pid='$mypid'";
        
        mysqli_query($db,$sql);
        
  

}

if(isset($_POST['ward-btn'])){
        
        $mypid = mysql_real_escape_string($_POST['pid']);
        $myward = mysql_real_escape_string($_POST['ward']);

        

        
        $sql = "UPDATE patient SET ward='$myward' WHERE pid='$mypid'";
        
        mysqli_query($db,$sql);
        
  

}



$db->close();

?>
<div class="form-style-5"  >
          <form method="POST" action="h_update.php" >
          <fieldset >
          <legend ><span class="number">1</span>Mark Test Results</legend>
          
          <input type="text" name="pid" placeholder="Patient ID *">
          <input type="text" name="name" placeholder="Name *">
          <input id ="button" type="submit" name="name-btn" value="Update" />

          <input type="text" name="nic" placeholder="NIC *">
          <input id ="button" type="submit" name="nic-btn" value="Update" />

          <input type="text" name="contact" placeholder="Contact *">
          <input id ="button" type="submit" name="contact-btn" value="Update" />

          <input type="text" name="adrs" placeholder="Address *">
          <input id ="button" type="submit" name="adrs-btn" value="Update" />

          <input type="text" name="age" placeholder="Age *">
          <input id ="button" type="submit" name="age-btn" value="Update" />

          <select id="gender" name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
          <input id ="button" type="submit" name="gender-btn" value="Update" />

          <input type="text" name="ward" placeholder="Ward *">
          <input id ="button" type="submit" name="ward-btn" value="Update" />

          </fieldset>
          
          </form>
</div>

</body>
</html>