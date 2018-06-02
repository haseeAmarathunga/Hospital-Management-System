<!DOCTYPE html>
<html>
<head>
	<title>Tests</title>
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
        <li class="active">
          <a href="patients.php">Patients</a>
        </li>
        <li>
          <a href="h_wards.php">Wards</a>
        </li>
        <li  >
          <a href="employees.php">Employees</a>
        </li>
        <li>
          <a href="h_tests.php">Tests</a>
        </li>
      </ul>
    </div>
</div>

<div class="form-style-5">
<input id ="button" type="submit" name="btn1" onclick="window.location.href='h_patients.php'" value="See All Patients" />
<br/>

<input id ="button" type="submit" name="btn2" onclick="window.location.href='search_p.php'" value="Search Patients" />
<br/>

<input id ="button" type="submit" name="btn3" onclick="window.location.href='h_update.php'" value="Update Patient Details" />
</br>

<input id ="button" type="submit" name="btn3" onclick="window.location.href='discharge.php'" value="Discharge Patients" />
</div>
</body>
</html>