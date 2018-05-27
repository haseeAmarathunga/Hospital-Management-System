<!DOCTYPE html>
<html>
<head>
	<title>Add / Remove Tests From Patients</title>
</head>
<body style="background-color: #006064;">
<link rel="stylesheet" href="css/style.css" type="text/css">
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
          <a href="admin_main.php">Home</a>
        </li>
        <li>
          <a href="h_patients.php">Patients</a>
        </li>
        <li>
          <a href="h_wards.php">Wards</a>
        </li>
        <li>
          <a href="h_doctors.php">Doctors</a>
        </li>
        <li  class="active">
          <a href="h_tests.php">Tests</a>
        </li>
      </ul>
    </div>
</div>
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

    $query1 = "SELECT * FROM tests ORDER BY test_id";
    $result  = $db->query($query1);
    $result2 = mysqli_query($db, $query1);

    $query = "SELECT * FROM patient ORDER BY pid";
    $result  = $db->query($query);
    $result1 = mysqli_query($db, $query);

    $query3 = "SELECT * FROM test_on_patients ORDER BY p_id";
    $result  = $db->query($query3);
    $result3 = mysqli_query($db, $query3);

$db->close();

?>

<div style="column-count: 2">
<div class="form-style-5" style="margin-left: 20px;" >
          <form method="POST" action="h_addremovetests.php" >
          <fieldset >
          <legend ><span class="number">1</span>Add Tests for Patient</legend>
          <select id="tstid" name="tid">
            <option>Test ID *</option>
            <?php while($row1 = mysqli_fetch_array($result2)):;?>
            <option value='<?php echo $row1[0]; ?>'><?php echo $row1[0]; ?></option>
            <?php endwhile; ?>
          </select>
          <select id="ptid" name="pid">
            <option>Patient ID</option>
            <?php while($row2 = mysqli_fetch_array($result1)):;?>
            <option value='<?php echo $row2[0]; ?>'><?php echo $row2[0]; ?></option>
            <?php endwhile; ?>
          </select>
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
<div class = "form-style-5" style=" max-width: 1000px;" >
  <legend ><span class="number">1</span>Test Results</legend>
  <table class="table table-striped" >
    <tr class="success">
      <th>Test ID</th>
      <th>Patient ID</th> 
      <th>Due Date</th> 
      <th>Consultant</th> 
      <th>Examiner</th> 
      <th>Result</th>      
    </tr>
    <?php while($row3 = mysqli_fetch_array($result3)):;?>
    <tr>
      <td><?php echo $row3[0]; ?></td>
      <td><?php echo $row3[1]; ?></td> 
      <td><?php echo $row3[2]; ?></td>   
      <td><?php echo $row3[3]; ?></td>
      <td><?php echo $row3[4]; ?></td>   
      <td><?php echo $row3[5]; ?></td>
    </tr>
    <?php endwhile; ?>
  </table>
</div>

</body>
</html>