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
        <li>
          <a href="doc_doctors.php">Doctors</a>
        </li>
        <li class="active">
          <a href="h_tests.php">Tests</a>
        </li>
      </ul>
    </div>
</div>

<div class="form-style-5">

<input id ="button" type="submit" name="btn2" onclick="window.location.href='doc_addremovetests.php'" value="Add/Remove Tests" />
<br/>

<input id ="button" type="submit" name="btn3" onclick="window.location.href='doc_testresults.php'" value="Test Results" />
</div>
</body>
</html>