<?php
   //connecting database
   $db = mysqli_connect("localhost","root", "","hospital_sys") or die("Error connecting to database");
   session_start();
   
   $error = "";

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      

      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT id FROM login WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         
         $_SESSION['login_user'] = $myusername;
         
         header("location:admin_main.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>

<html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body style="background-color: #006064;">

      <!-- Latest compiled and minified CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

   <!-- jQuery library -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

   <!-- Latest compiled JavaScript -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   
      <div align = "center" class="form">
         <br />
         <br />
         <br />
         <br />
         <br />
         <div class="well" style = "width:300px; border: solid 1px #333333; " align = "left">
            <div class="well" style = "background-color:#333333; color:#FFFFFF; padding:3px;" align = "center"><b>Login</b></div>
            
            <div style = "margin:30px">
               
               <form action = "" method = "post" >
                  <label>UserName  :</label><input type = "text" class="form-control" name = "username" class = "box"/><br />
                  <label>Password  :</label><input type = "password" class="form-control" name = "password" class = "box" /><br />
                  <button type="submit" value = " Submit " class="btn btn-default" >Submit</button>
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
               
            </div>
            
         </div>
         
      </div>

   </body>
</html>