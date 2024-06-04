<?php

session_start();
include ('dbconnection.php');

if(isset($_POST['register'])){
 $firstname = $_POST['Fname'];
  $lastname  = $_POST['Lname'];
   $age  = $_POST['age'];
    $birthday  = $_POST['birthday'];
    $address  = $_POST['address'];
  $email=$_POST['email'];
  
  $str  = $_POST['pass'];
  $hash_pass = md5($str);
  $pin1 = $_POST['pin1'];
  $pin2 = $_POST['pin2'];
  $pin3 = $_POST['pin3'];
  $pin4 = $_POST['pin4'];
  
if (md5($str)){

  $sql = "INSERT INTO accounts(fname,lname,age,birthday,address,email,password,pin1,pin2,pin3,pin4) values ('$firstname','$lastname','$age','$birthday','$address','$email','$hash_pass','$pin1','$pin2','$pin3','$pin4')";
  $result = mysqli_query($conn,$sql);
echo '<script>alert("User Registration Successfull"); window.location.href = "manageuser.php";</script>';
 
}
    else {
echo '<script>alert("User Registration Failed"); window.location.href = "manageuser.php";</script>';
    }

}

?>