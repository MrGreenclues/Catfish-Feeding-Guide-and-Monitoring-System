<?php

session_start();
include ('dbconnection.php');

if(isset($_POST['delete']))
{
    $act_id = mysqli_real_escape_string($conn, $_POST['delete']);

    $query = "DELETE FROM med_act WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
         echo '<script>alert("Account Deleted Successfully"); window.location.href = "Ehealthguide.php";</script>';
    }
    else
    {
         echo '<script>alert("Account Not Deleted"); window.location.href = "Ehealthguide.php";</script>';
    }
}

if(isset($_POST['add'])){
$activity = $_POST['medicine'];
$pond = $_POST['pond'];
$time  = $_POST['time'];
$date  = $_POST['date'];

  
if (md5($str)){

  $sql = "INSERT INTO med_act(activity,pond,time,date) values ('$activity','$pond','$feeding','$date')";
  $result = mysqli_query($conn,$sql);
echo '<script>alert("Item added Successfull"); window.location.href = "Ehealthguide.php";</script>';
 
}
    else {
echo '<script>alert("Invalid"); window.location.href = "Ehealthguide.php";</script>';
    }


}

if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $activity = $_POST['activity'];
    $pond = $_POST['pond'];
    $time  = $_POST['time'];
    $date  = $_POST['date'];
   
    // Update the SQL query with correct column names
    $query = "UPDATE med_act SET activity=?,pond=?, time=?, date=? WHERE id=?";
    $stmt = $conn->prepare($query);
    if ($stmt === false) {
        die('MySQL prepare error: ' . $conn->error);
    }

    // Bind parameters and execute
    $stmt->bind_param("sssi", $medicine, $pond,$time, $date, $id);
    $query_run = $stmt->execute();

    if ($query_run) {
        echo '<script>alert("Account Updated Successfully"); window.location.href = "Ehealthguide.php";</script>';
    } else {
        echo '<script>alert("Account Not Updated"); window.location.href = "Ehealthguide.php";</script>';
    }
}


   


