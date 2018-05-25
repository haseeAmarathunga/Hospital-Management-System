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


if(isset($_POST['add-test-btn'])){
        $mytid = mysql_real_escape_string($_POST['tid']);
        $mypid = mysql_real_escape_string($_POST['pid']);
        $myresult = mysql_real_escape_string($_POST['result']);

        

        
        $sql = "UPDATE test_on_patients SET result='$myresult' WHERE t_id='$mytid' AND p_id='$mypid'";
        
        mysqli_query($db,$sql);
        
  

    }
$query = "SELECT * FROM test_on_patients ORDER BY p_id";
$result  = $db->query($query);
$result1 = mysqli_query($db, $query);



$db->close();

?>
<div class="form-style-5"  >
          <form method="POST" action="h_testresults.php" >
          <fieldset >
          <legend ><span class="number">1</span>Mark Test Results</legend>
          <input type="text" name="tid" placeholder="Test ID *">
          <input type="text" name="pid" placeholder="Patient ID *">
          <input type="text" name="result" placeholder="Result *">
          
          </fieldset>
          <input id ="button" type="submit" name="add-test-btn" value="Add" />
          </form>
</div>
<div class = "form-style-5" style=" max-width: 1000px;" >
  <legend ><span class="number">1</span>Test Results</legend>
  <table class="table table-striped" >
    <tr class="success">
      <th>Test ID</th>
      <th>Patient ID</th> 
      <th>Result</th>      
    </tr>
    <?php while($row1 = mysqli_fetch_array($result1)):;?>
    <tr>
      <td><?php echo $row1[0]; ?></td>
      <td><?php echo $row1[1]; ?></td> 
      <td><?php echo $row1[5]; ?></td>      
    </tr>
    <?php endwhile; ?>
  </table>
</div>
</body>
</html>