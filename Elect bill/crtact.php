<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<hr><hr>
	<h3 style="text-align: center; color: red;">
	<?php
	  $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "Electbill";

      //create connen=ction
      $conn=new mysqli($servername,$username,$password,$dbname);
      //check connection
      if($conn->connect_error){
      die("Connection failed : ".$conn->connect_error);
      }

      $a = $_POST["n"]; 
      $b = $_POST["ad"];
      $c = 0;
      $d = 0;
      
      $sql = "INSERT INTO `details`(`NAME`, `ADDRESS`, `OLD READING`, `NEW READING`) VALUES ('$a','$b','$c','$d')";
      
      if($conn->query($sql)===TRUE){
      echo "...THANK YOU FOR CREATING ACCOUNT...";
      }else{
      echo "Error : ".$conn->error;
      echo "<br>";
      echo "Cannot add details to database";
      }

      $conn->close();
         
    ?>
    <br>
    Click here to get back to front page [<a href="Elect index.php">INDEX</a>]
    </h3>
    <hr><hr>

   
</body>
</html>

