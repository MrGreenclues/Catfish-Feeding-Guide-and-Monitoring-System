<?php

include('dbconnection.php');
session_start();

$pin1 = $_POST['pin1'];
$pin2 = $_POST['pin2'];
$pin3 = $_POST['pin3'];
$pin4 = $_POST['pin4'];


$sql = "SELECT * from accounts where pin1= '$pin1' and pin2 = '$pin2' and  pin3 = '$pin3' and  pin4 = '$pin4' ";

$result = $conn -> query($sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$count = mysqli_num_rows($result);

  if ($count ==1) {
       echo '<script>alert("User Log in Successfull"); window.location.href = "EfeedingGuide.php";</script>';

  }else{
      echo '<script>alert("User Log in Failed"); window.location.href = "emplogin.php";</script>';

  }

?>