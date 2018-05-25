<!DOCTYPE html>
<html>
<head>
  <title>Hospital System</title>
  <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body style="background-color: #006064;">
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
          <a href="admin_main.php">Home</a>
        </li>
        <li>
          <a href="patients.php">Patients</a>
        </li>
        <li>
          <a href="h_wards.php">Wards</a>
        </li>
        <li>
          <a href="employees.php">Employees</a>
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
    $db = mysqli_connect("localhost","root","","hospital_sys") ;

    if(isset($_POST['register-btn'])){
        $mynic = mysql_real_escape_string($_POST['nic']);
        $myname = mysql_real_escape_string($_POST['name']);
        $mycontact = mysql_real_escape_string($_POST['contact']);
        $myadrs = mysql_real_escape_string($_POST['adrs']);
        $myage = mysql_real_escape_string($_POST['age']);
        $mygender = mysql_real_escape_string($_POST['gender']);
        $myphys = mysql_real_escape_string($_POST['phys']);
        $mycnslt = mysql_real_escape_string($_POST['consult']);
        $mydes = mysql_real_escape_string($_POST['description']);
        $myward = mysql_real_escape_string($_POST['ward']);

        if($myname!="" && $mynic!="" && $myward!="" && $myage<150){
            $sql = "INSERT INTO patient(nic,name,contact,address,age,gender,physician,consultant,description,ward) VALUES('$mynic','$myname','$mycontact','$myadrs','$myage','$mygender','$myphys','$mycnslt','$mydes','$myward')";
            $sqlusr= "SELECT name FROM patient WHERE nic='$mynic'";
            mysqli_query($db,$sql);
            $queryusr = mysqli_query($db,$sqlusr);
            $_SESSION['message']="Done";
            header("location:h_addtests.php");
            $_SESSION['$queryusr']= $queryu;
            echo "Username: " .$queryu. ".";

        }else{
          echo "You must Enter Patient name and Other details...........!";

        }

        

    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Missing";
        } else {
        $name = $_POST["name"];
        }
        
    }

    $query = "SELECT * FROM consultants ORDER BY emp_id";
    $result  = $db->query($query);
    $result1 = mysqli_query($db, $query);

    $query1 = "SELECT * FROM ward ORDER BY ward_no";
    $result  = $db->query($query1);
    $result2 = mysqli_query($db, $query1);

?>

<div class="form-style-5" >
          <form method="POST" action="admin_main.php">
          <fieldset>
          <legend><span class="number">1</span>Register New Patient</legend>
          <input type="text" name="name" placeholder="Patient Name *">
          <input type="text" name="nic" placeholder="Patient NIC *">
          <input type="text" name="contact" placeholder="Contact *">
          <input type="text" name="adrs" placeholder="Address *">
          <input type="text" name="age" placeholder="Age *">
          <select id="gender" name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>

         
          </select>
                
          </fieldset>
          <fieldset>
          <legend><span class="number">2</span> Additional Info</legend>
          <label>Recommended By:</label>
          <input type="text" name="phys" placeholder="Physician *">
          <label>Confirmed By:</label>
          
          <textarea name="description" placeholder="Description"></textarea>
          
          
          <select id="cons" name="consult">
            <option>Consultant</option>
            <?php while($row1 = mysqli_fetch_array($result1)):;?>
            <option value='<?php echo $row1[0]; ?>'><?php echo $row1[0];echo $row1[2]; ?></option>
            <?php endwhile; ?>
          </select>
          <select id="ward" name="ward">
            <option>Ward Number</option>
            <?php while($row2 = mysqli_fetch_array($result2)):;?>
            <option value='<?php echo $row2[0]; ?>'><?php echo $row2[0]; ?></option>
            <?php endwhile; ?>
          </select>
          </fieldset>
          <input id ="button" type="submit" name="register-btn" value="Register" />
          </form>
</div>

</body>
</html>