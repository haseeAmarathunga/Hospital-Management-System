<!DOCTYPE html>
<html>
<head>
	<title>Consultants</title>
</head>

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
        <li>
          <a href="admin_main.php">Home</a>
        </li>
        <li>
          <a href="h_patients.php">Patients</a>
        </li>
        <li>
          <a href="h_wards.php">Wards</a>
        </li>
        <li  class="active">
          <a href="h_doctors.php">Employees</a>
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




if(isset($_POST['add-cnslt-btn'])){
        $myeid = mysql_real_escape_string($_POST['eid']);
        $mymnum = mysql_real_escape_string($_POST['ward']);
        $myname = mysql_real_escape_string($_POST['name']);
        $mypwd = mysql_real_escape_string($_POST['pwd']);

        

        
        $sql = "INSERT INTO consultants(emp_id,ward_no,name,password) VALUES('$myeid','$mymnum','$myname','$mypwd')";
        
        mysqli_query($db,$sql);


}
if(isset($_POST['rem-cnslt-btn'])){
        $myreid = mysql_real_escape_string($_POST['reid']);



        
        $sql = "DELETE FROM consultants WHERE emp_id='$myreid'";
        
        mysqli_query($db,$sql);
        
  

 } 

$query1 = "SELECT * FROM ward ORDER BY ward_no";
$result  = $db->query($query1);
$result2 = mysqli_query($db, $query1);

$query = "SELECT * FROM consultants ORDER BY emp_id";
$result  = $db->query($query);
$result1 = mysqli_query($db, $query);

$db->close();

?>
<div style="column-count: 2">
<div class="form-style-5" style="margin-left: 20px;" >
          <form method="POST" action="h_consultants.php" >
          <fieldset >
          <legend ><span class="number">1</span>Add new Consultant</legend>
          <input type="text" name="eid" placeholder="Employee ID *">

          <select id="ward" name="ward">
            <option>Ward Number *</option>
            <?php while($row1 = mysqli_fetch_array($result2)):;?>
            <option value='<?php echo $row1[0]; ?>'><?php echo $row1[0]; ?></option>
            <?php endwhile; ?>
          </select>
          <input type="text" name="name" placeholder="Name *">
          <input type="password" class="form-control" name="pwd" placeholder="Password *">
          </br>
         
          </fieldset>
          <input id ="button" type="submit" name="add-cnslt-btn" value="Add" />
          </form>
</div>
<div class="form-style-5" style="margin-left: 20px;" >
          <form method="POST" action="h_consultants.php" >
          <fieldset >
          <legend ><span class="number">1</span>Remove a Consultant</legend>
          <input type="text" name="reid" placeholder="Employee ID *">

         
          </fieldset>
          <input id ="button" type="submit" name="rem-cnslt-btn" value="Remove" />
          </form>
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
          </br>
          
</div>
</div>

<div class = "form-style-5" style=" max-width: 1000px;" >
  <legend ><span class="number">1</span>Consultant List</legend>
  <table class="table table-striped" >
    <tr class="success">
      <th>Employee ID</th>
      <th>Ward</th> 
      <th>Name</th>

      
    </tr>
    <?php while($row1 = mysqli_fetch_array($result1)):;?>
    <tr>
      <td><?php echo $row1[0]; ?></td>
      <td><?php echo $row1[1]; ?></td> 
      <td><?php echo $row1[2]; ?></td>

      
    </tr>
    <?php endwhile; ?>
  </table>
</div>


</body>
</html>
</body>
</html>