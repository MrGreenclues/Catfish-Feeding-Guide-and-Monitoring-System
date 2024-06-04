<?php

session_start();
include ('dbconnection.php');

if(isset($_POST['delete']))
{
    $act_id = mysqli_real_escape_string($conn, $_POST['delete']);

    $query = "DELETE FROM activities WHERE act_id='$act_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
         echo '<script>alert("Account Deleted Successfully"); window.location.href = "EfeedingGuide.php";</script>';
    }
    else
    {
         echo '<script>alert("Account Not Deleted"); window.location.href = "EfeedingGuide.php";</script>';
    }
}

if(isset($_POST['add'])){
$act_feeding = $_POST['feeding'];
$act_pond = $_POST['pond'];
$act_time  = $_POST['time'];
$act_date  = $_POST['date'];

  
if (md5($str)){

  $sql = "INSERT INTO activities(act_feeding,act_pond,act_time,act_date) values ('$act_feeding','$act_pond','$act_feeding','$act_date')";
  $result = mysqli_query($conn,$sql);
echo '<script>alert("Item added Successfull"); window.location.href = "EfeedingGuide.php";</script>';
 
}
    else {
echo '<script>alert("Invalid"); window.location.href = "EfeedingGuide.php";</script>';
    }


}

if(isset($_POST['update']))
{
    $act_id = $_POST['act_id'];
    $act_feeding = $_POST['feeding'];
    $act_pond = $_POST['pond'];
    $act_time  = $_POST['time'];
    $act_date  = $_POST['date'];
   
    // Update the SQL query with correct column names
    $query = "UPDATE activities SET act_feeding=?,act_pond=?, act_time=?, act_date=? WHERE act_id=?";
    $stmt = $conn->prepare($query);
    if ($stmt === false) {
        die('MySQL prepare error: ' . $conn->error);
    }

    // Bind parameters and execute
    $stmt->bind_param("sssi", $act_feeding, $act_pond,$act_time, $act_date, $act_id);
    $query_run = $stmt->execute();

    if ($query_run) {
        echo '<script>alert("Account Updated Successfully"); window.location.href = "EfeedingGuide.php";</script>';
    } else {
        echo '<script>alert("Account Not Updated"); window.location.href = "EfeedingGuide.php";</script>';
    }
}


   


