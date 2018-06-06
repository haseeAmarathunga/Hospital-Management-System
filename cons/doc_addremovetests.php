<!DOCTYPE html>
<html>
<head>
	<title>Add / Remove Tests From Patients</title>
</head>
<body style="background-color: #006064;">
<link rel="stylesheet" href="css/style.css" type="text/css">
<?php
session_start();



//connecting database
$db = mysqli_connect("localhost","root", "","hospital_sys") or die("Error connecting to database");


if(isset($_POST['add-test-btn'])){
        $mytid = mysql_real_escape_string($_POST['tid']);
        $mypid = mysql_real_escape_string($_POST['pid']);
        $myddate = mysql_real_escape_string($_POST['ddate']);
        $mycnslt = mysql_real_escape_string($_POST['cnslt']);
        $myexmin = mysql_real_escape_string($_POST['exmin']);
        

        
        $sql = "INSERT INTO test_on_patients(t_id,p_id,duedate,consultant,examiner) VALUES('$mytid','$mypid','$myddate','$mycnslt','$myexmin')";
        
        mysqli_query($db,$sql);
        
  

    }
if(isset($_POST['rem-test-btn'])){
        $myrtid = mysql_real_escape_string($_POST['rtid']);
        $myrpid = mysql_real_escape_string($_POST['rpid']);


        
        $sql = "DELETE FROM test_on_patients WHERE t_id='$myrtid' AND p_id='$myrpid'";
        
        mysqli_query($db,$sql);
        
  

    } 



$db->close();

?>

<div style="column-count: 2">
<div class="form-style-5" style="margin-left: 20px;" >
          <form method="POST" action="h_addremovetests.php" >
          <fieldset >
          <legend ><span class="number">1</span>Add Tests for Patient</legend>
          <input type="text" name="tid" placeholder="Test ID *">
          <input type="text" name="pid" placeholder="Patient ID *">
          <input type="text" name="ddate" placeholder="Due Date *">
          <input type="text" name="cnslt" placeholder="Consultant *">
          <input type="text" name="exmin" placeholder="Examined By *">
          </fieldset>
          <input id ="button" type="submit" name="add-test-btn" value="Add" />
          </form>
</div>
<div class="form-style-5" style="margin-left: 20px;" >
          <form method="POST" action="h_addremovetests.php" >
          <fieldset >
          <legend ><span class="number">1</span>Remove Tests from Patient</legend>
          <input type="text" name="rtid" placeholder="Test ID *">
          <input type="text" name="rpid" placeholder="Patient ID *">
          </fieldset>
          <input id ="button" type="submit" name="rem-test-btn" value="Remove" />
          </br>
          </br>
          </br>
          </br>
          </br>
          </br>
          </br>
          </br>
          </br>
          </br>
          </form>
</div>
</div>


</body>
</html>