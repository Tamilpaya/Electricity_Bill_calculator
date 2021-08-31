<!DOCTYPE html>
<html>
<head>
      <title>Calculation</title>
</head>
<body>
<h1 style="text-align: center; color: green">...Your tariff is calculated...</h1>
<hr><hr>
<br>
<h3 style="text-align: center; color: blue; text-decoration: underline;">Your Details</h3>

<div style="text-align: center;"><h3>
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

      $n = $_POST["n"];

      $sql = "SELECT * FROM `details` WHERE NAME = '$n'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
            // output data of each row
            if($row = $result->fetch_assoc()) {
                  
                  
                     $name =  $row["NAME"];
                     
                     $addr =  $row["ADDRESS"];
                     
                     $old =  $row["OLD READING"];
                     
                     $new =  $row["NEW READING"];
                  
           }
     }

      $a = (int)($_POST["nr"]);
      $b = $new;
      $c = $a-$b;
      $d = 1;

      if ($c<=100 and $a>$b) {
            echo "No need to pay tariff.You consumed your free current.";
            $d = 0;
      }elseif ($c>100 and $c<=200) {
            $e = $c-100;
            $d = $d*($e*1.5);
            $d = $d+10;
      }elseif ($c>200 and $c<=500) {
            $e = 200;
            $f = $c-200;
            $d = $d*(($e)+($f*3));
            $d = $d+30;
      }elseif ($c>500) {
            $e = 350;
            $f = 1380;
            $g = $c-500;
            $d = $d*(($e)+($f)+($g*6.6));
            $d = $d+50;
      }

      ?>
</h3>
</div>

<h2 style="text-align: left; margin-left: 35%;">

      <?php

        if ($a<$b){
            echo "You have entered the wrong readings!!!";
        }

        if ($d!==1 and $a>$b){
            echo "Your name " ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; = &nbsp;<?php  echo $name;
            echo "<br>";
            echo "<br>";
            echo "Your address " ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; = &nbsp;<?php echo $addr;
            echo "<br>";
            echo "<br>"; 
            echo "Your old reading " ?>&nbsp;&nbsp; = &nbsp;<?php echo $new;
            echo "<br>";
            echo "<br>";
            echo "Your new reading " ?>&nbsp; = &nbsp;<?php echo $a;
            echo "<br>";
            echo "<br>";
            echo "Your tariff " ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; = &nbsp;<?php echo $d." Rupees";
      ?>
     
</h2>
<br>
<hr><hr>

<h3 style="text-align: center; color: red">

      <?php

      $sql1 = "UPDATE `details` SET `OLD READING`=$b,`NEW READING`=$a WHERE `NAME`='$n'";

      if($conn->query($sql1)===TRUE){
      echo "...THANK YOU...";
      }else{
      echo "Error : ".$conn->error;
      echo "<br>";
      echo "Cannot access details in database";
      }

      $conn->close();
}
      ?>

</h3>

<hr><hr>


</body>
</html>