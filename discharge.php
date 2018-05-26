<!DOCTYPE html>
<html>
<head>
	<title>Add / Remove Tests From Patients</title>
</head>
<body style="background-color: #006064;">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css" type="text/css">


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php
session_start();



//connecting database
$db = mysqli_connect("localhost","root", "","hospital_sys") or die("Error connecting to database");


if(isset($_POST['discharge-btn'])){
        
        $myrpid = mysql_real_escape_string($_POST['rpid']);


        
        $sql = "DELETE FROM patient WHERE pid='$myrpid'";
        
        mysqli_query($db,$sql);
        
  

    } 

$query = "SELECT * FROM patient ORDER BY pid";
$result  = $db->query($query);
$result1 = mysqli_query($db, $query);

$db->close();

?>


<div class="form-style-5"  >
          <form method="POST" action="discharge.php" >
          <fieldset >
          <legend ><span class="number">1</span>Remove Tests from Patient</legend>
          
          <input type="text" name="rpid" placeholder="Patient ID *">
          </fieldset>
          <input id ="button" type="submit" name="discharge-btn" value="Discharge" />
         
          </form>

</div>

<div class = "form-style-5" style=" max-width: 1000px;" >
  <legend ><span class="number">1</span>Patient List</legend>
  <table class="table table-striped" >
    <tr class="success">
      <th>Patient ID</th>
      <th>NIC</th> 
      <th>Name</th>
      <th>Contact</th>
      <th>Address</th>
      <th>Age</th>
      <th>Gender</th>
      <th>Physician</th>
      <th>Consultant</th>
      <th>Description</th>
      <th>Ward</th>
      
    </tr>
    <?php while($row1 = mysqli_fetch_array($result1)):;?>
    <tr>
      <td><?php echo $row1[0]; ?></td>
      <td><?php echo $row1[1]; ?></td> 
      <td><?php echo $row1[2]; ?></td>
      <td><?php echo $row1[3]; ?></td>
      <td><?php echo $row1[4]; ?></td>
      <td><?php echo $row1[5]; ?></td>
      <td><?php echo $row1[6]; ?></td>
      <td><?php echo $row1[7]; ?></td>
      <td><?php echo $row1[8]; ?></td>
      <td><?php echo $row1[9]; ?></td>
      <td><?php echo $row1[10]; ?></td>
      
    </tr>
    <?php endwhile; ?>
  </table>
</div>


</body>
</html>