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

<div id="header" style="height: 150px;">
    <div>

      <ul id="navigation">
        <li >
          <a href="doc_allpatients.php">See All Patients</a>
        </li>
        <li >
          <a href="search_p.php">Search Patients</a>
        </li>
        <li>
          <a href="doc_wards.php">Wards</a>
        </li>
        <li class="active">
          <a href="cons_consultants.php">Consultants</a>
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
        $mymnum = mysql_real_escape_string($_POST['wnum']);
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

$query = "SELECT * FROM consultants ORDER BY emp_id";
$result  = $db->query($query);
$result1 = mysqli_query($db, $query);

$db->close();

?>


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