<?php



?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<h1 style="text-align: center; color: red; cursor: default;">...Calculate your electricity bill...</h1>
	<hr><hr><br>
    
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
       ?>
      <div style="text-align: center; cursor: default;">
       <?php
      $sql = "SELECT * FROM `details`";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
            	?>
            	<form action="" method="post">
                     <select name="name">
                     	<option active>Choose your name</option>
                     	<?php
            while($row = $result->fetch_assoc()) {
                     
                     
                      ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; <option><?php echo $row["NAME"]; ?></option> <br><br> 
                     

                     <?php 
           } ?> </select>
            <input type="submit" name="submit" value="✔">
            </form>
             </div>
            <?php
        

     if (isset($_POST["name"])) {
     	$n = $_POST["name"];
     	$sql1 = "SELECT * FROM `details` WHERE NAME = '$n'";
            $result = $conn->query($sql1);

            if ($result->num_rows > 0) {
            // output data of each row
            if($row = $result->fetch_assoc()) {
            	?>
                     <p style="text-align: center; cursor: default;">
                     	<?php
                     	$add = $row["ADDRESS"];
                     $nam = $row["NAME"];
                     ?> </p> <?php
                  
          
     }
     }
     ?>

    

	<form action="calc.php" method="post" style="text-align: center; cursor: default;">
		Your name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp; <input type="text" name="n" value="<?php echo "$nam"; ?>"> <br><br>
		Your address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp; <input type="text" name="address" value="<?php echo "$add"; ?>">   <br><br>
         
	   Enter the new reading &nbsp;:&nbsp;&nbsp; <input type="text" name="nr" placeholder="READING(INT)">
	   <br><br>
	   <a href="Create account.html" style="margin-right: 9% ">New account ?</a>
	<input type="submit" name="submit" value="Login" style="width: 120px; cursor: pointer;">
	</form>
<?php
	}
     }
      



    ?>
	<br>
	<hr><hr>
	<br><br><br>
	<div class="img">
	  <img src="Example.jpeg" style="border: black; border-width: 2px; border-style: solid; display: block; margin-left: 5%;" width="500px" height="400px" align="left">
	  <img src="Units.jpeg" style="border: black; border-width: 2px; border-style: solid; display: block; margin-right: 10%;" width="400px" height="500px" align="right">
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><hr><hr>
	

</body>
</html>