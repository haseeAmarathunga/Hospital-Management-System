<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Search</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css"/>
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
        <li >
          <a href="doc_allpatients.php">See All Patients</a>
        </li>
        <li class="active">
          <a href="search_p.php">Search Patients</a>
        </li>
        <li >
          <a href="doc_wards.php">Wards</a>
        </li>
        <li >
          <a href="cons_consultants.php">Consultants</a>
        </li>
        <li >
          <a href="h_tests.php">Tests</a>
        </li>
      </ul>
    </div>
</div>
<div class="form-style-5">
    <form action="search.php" method="GET">
        <input type="text" name="query"/>
        <input type="submit" value="Search" />
    </form>
</div>
</body>
</html>

<?php
    mysql_connect("localhost", "root", "") or die("Error connecting to database: ".mysql_error());
    /*
        localhost - it's location of the mysql server, usually localhost
        root - your username
        third is your password
         
        if connection fails it will stop loading the page and display an error
    */
     
    mysql_select_db("hospital_sys") or die(mysql_error());
    /* tutorial_search is the name of database we've created */
?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Search results</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<?php
    $query = $_GET['query']; 
    // gets value sent over search form
     
    $min_length = 3;
    // you can set minimum length of the query if you want
     
    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
         
        $query = htmlspecialchars($query); 
        // changes characters used in html to their equivalents, for example: < to &gt;
         
        $query = mysql_real_escape_string($query);
        // makes sure nobody uses SQL injection
         
        $raw_results = mysql_query("SELECT * FROM patient
            WHERE (`name` LIKE '%".$query."%') OR (`pid` LIKE '%".$query."%')") or die(mysql_error());
             
        // * means that it selects all fields, you can also write: `id`, `title`, `text`
        // articles is the name of our table
         
        // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
        // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
        // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
         
        if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
             
            while($results = mysql_fetch_array($raw_results)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
                
                echo "<p><h1>Patient ID - ".$results['pid']."</h1></p>";                
                echo "<p>".$results['nic']."</p>";
                echo "<p>".$results['name']."</p>";
                echo "<p>".$results['contact']."</p>";
                echo "<p>".$results['address']."</p>";
                echo "<p>".$results['age']."</p>";
                echo "<p>".$results['gender']."</p>";
                echo "<p>".$results['physician']."</p>";
                echo "<p>".$results['consultant']."</p>";
                echo "<p>".$results['description']."</p>";
                echo "<p>".$results['ward']."</p><hr>";


                // posts results gotten from database(title and text) you can also show id ($results['id'])
            }
           
        }
        else{ // if there is no matching rows do following
            echo "No results";
        }
         
    }
    else{ // if query length is less than minimum
        echo "Minimum length is ".$min_length;
    }
?>



</body>
</html>