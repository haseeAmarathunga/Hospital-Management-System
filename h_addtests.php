<!DOCTYPE html>
<html>
<body style="background-color: #006064;">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css" type="text/css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div id="header" >
    <div>
      <ul id="navigation">
        <li  class="active">
          <a href="h_index.php">Home</a>
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




$query = "SELECT * FROM patient ORDER BY pid DESC LIMIT 1";
$result  = $db->query($query);
$result1 = mysqli_query($db, $query);

$query2 = "SELECT * FROM tests ORDER BY test_id ";
$resulttest  = $db->query($query2);
$result2 = mysqli_query($db, $query2);

$query3 = "SELECT pid FROM patient ORDER BY pid DESC LIMIT 1";
$resulttest  = $db->query($query3);
$result3 = mysqli_query($db, $query3);

if(isset($_POST['add-test-btn'])){
        $mytid = mysql_real_escape_string($_POST['tid']);
        $myddate = mysql_real_escape_string($_POST['ddate']);
        $mycnslt = mysql_real_escape_string($_POST['cnslt']);
        $myexmin = mysql_real_escape_string($_POST['exmin']);
        
        while($row1 = mysqli_fetch_array($result3)):;
          $row1[0];
        
        $sql = "INSERT INTO test_on_patients(t_id,p_id,duedate,consultant,examiner,result) VALUES('$mytid','$row1[0]','$myddate','$mycnslt','$myexmin','Upcoming')";
        
        mysqli_query($db,$sql);
        
        endwhile;   

    }



$db->close();

?>

<div class="well" >
  <?php while($row1 = mysqli_fetch_array($result1)):;?>
<div class="container">
    <h1>Patient Name: <?php echo $row1[2]; ?></h1>
</div>
<div class= "container">
    <h1>Ward: <?php echo $row1[10]; ?><input id ="button" class="btn btn-success" name="done-btn" value="Done" style="margin-left: 700px; width: 100px; height: 50px; font-size: 14px; background-color:  #1ABC9C;" onclick="window.location.href='h_index.php'"></h1> 
</div>
  
  <?php endwhile; ?>

</div>





<div style="column-count: 2; ">
<div class = "form-style-5" style="margin-left: 20px; width: 600px;" >
  <legend ><span class="number">1</span>List of Tests</legend>
  <table class="table table-striped" >
    <tr class="success">
      <th>Test ID</th>
      <th>Name</th> 
      <th>Doctor Incharge</th>
      
    </tr>
    <?php while($row1 = mysqli_fetch_array($result2)):;?>
    <tr>
      <td><?php echo $row1[0]; ?></td>
      <td><?php echo $row1[1]; ?></td> 
      <td><?php echo $row1[2]; ?></td>
      
    </tr>
    <?php endwhile; ?>
  </table>
</div>



<style>
.btn {
  width: 200px;
  height: 200px;
}
</style>
 
<div class="form-style-5" style="margin-left: 20px;" >
          <form method="POST" action="h_addtests.php" >
          <fieldset >
          <legend ><span class="number">1</span>Add Tests for Patient</legend>
          <input type="text" name="tid" placeholder="Test ID *">
          <input type="text" name="ddate" placeholder="Due Date *">
          <input type="text" name="cnslt" placeholder="Consultant *">
          <input type="text" name="exmin" placeholder="Examined By *">
          </fieldset>
          <input id ="button" type="submit" name="add-test-btn" value="Add" />
          </form>
</div>
</div>



</body>
</html>