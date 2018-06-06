<!DOCTYPE html>
<html>
<head>
	<title>Add / Remove Tests From Patients</title>
</head>
<body style="background-color: #006064;">
<link rel="stylesheet" href="css/style.css" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php
session_start();



//connecting database
$db = mysqli_connect("localhost","root", "","hospital_sys") or die("Error connecting to database");


if(isset($_POST['add-test-btn'])){
        $mytid = mysql_real_escape_string($_POST['tid']);
        $mytname = mysql_real_escape_string($_POST['tname']);
        $mydoc = mysql_real_escape_string($_POST['doc']);

        

        
        $sql = "INSERT INTO tests(test_id,test_name,doc_incharge) VALUES('$mytid','$mytname','$mydoc')";
        
        mysqli_query($db,$sql);
        
  

    }
if(isset($_POST['rem-test-btn'])){
        $myrtid = mysql_real_escape_string($_POST['rtid']);
        


        
        $sql = "DELETE FROM tests WHERE test_id='$myrtid'";
        
        mysqli_query($db,$sql);
        
  

    } 
//run sql query and asign to query var
$query = "SELECT * FROM tests ORDER BY test_id";
$result  = $db->query($query);
$result1 = mysqli_query($db, $query);


$db->close();
//close database
?>

<div style="column-count: 2">
<div class="form-style-5" style="margin-left: 20px;" >
          <form method="POST" action="addremtests.php" >
          <fieldset >
          <legend ><span class="number">1</span>Add Test</legend>
          <input type="text" name="tid" placeholder="Test ID *">
          <input type="text" name="tname" placeholder="Test Name *">
          <input type="text" name="doc" placeholder="Doctor Incharge *">

          </fieldset>
          <input id ="button" type="submit" name="add-test-btn" value="Add" />
          </form>
</div>
<div class="form-style-5" style="margin-left: 20px;" >
          <form method="POST" action="addremtests.php" >
          <fieldset >
          <legend ><span class="number">1</span>Remove Test</legend>
          <input type="text" name="rtid" placeholder="Test ID *">
          
          </fieldset>
          <input id ="button" type="submit" name="rem-test-btn" value="Remove" />
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
      <th>Test Name</th> 
      <th>Doctor Incharge</th>      
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
