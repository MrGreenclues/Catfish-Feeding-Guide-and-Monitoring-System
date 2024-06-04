<?php

session_start();
include ('dbconnection.php');

if(isset($_POST['add'])){
$act_feeding = $_POST['feeding'];
$act_time  = $_POST['time'];
$act_date  = $_POST['date'];

  
if (md5($str)){

  $sql = "INSERT INTO activities(act_feeding,act_time,act_date) values ('$act_feeding','$act_feeding','$act_date')";
  $result = mysqli_query($conn,$sql);
echo '<script>alert("Item added Successfull"); window.location.href = "manageactivities.php";</script>';
 
}
    else {
echo '<script>alert("Invalid"); window.location.href = "manageactivities.php.php";</script>';
    }


}

if(isset($_POST['update']))
{
    $act_id = $_POST['act_id'];
    $act_feeding = $_POST['feeding'];
    $act_time  = $_POST['time'];
    $act_date  = $_POST['date'];
   
    // Update the SQL query with correct column names
    $query = "UPDATE activities SET act_feeding=?, act_time=?, act_date=? WHERE act_id=?";
    $stmt = $conn->prepare($query);
    if ($stmt === false) {
        die('MySQL prepare error: ' . $conn->error);
    }

    // Bind parameters and execute
    $stmt->bind_param("sssi", $act_feeding, $act_time, $act_date, $act_id);
    $query_run = $stmt->execute();

    if ($query_run) {
        echo '<script>alert("Account Updated Successfully"); window.location.href = "manageactivities.php";</script>';
    } else {
        echo '<script>alert("Account Not Updated"); window.location.href = "manageactivities.php";</script>';
    }
}


   


if(isset($_POST['delete']))
{
    // Check if 'delete_account' is provided
    if (!isset($_POST['act_id'])) {
        echo '<script>alert("Account ID missing."); window.location.href = "manageactivities.php";</script>';
        exit;
    }

    // Initialize $itemId from a source. Assuming it's a POST parameter you expected
    if (!isset($_POST['act_id'])) {
        echo '<script>alert("Item ID missing."); window.location.href = "manageactivies.php";</script>';
        exit;
    }

    // Sanitize the input to prevent SQL Injection
    $itemId = mysqli_real_escape_string($conn, $_POST['delete']);
    $itemId = mysqli_real_escape_string($conn, $_POST['act_id']);

    // Correct the SQL query to match actual column names in your table
    $query = "DELETE FROM activities WHERE act_id = '$act_id'"; // Ensure 'id' is the correct column name in your 'stocks' table

    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo '<script>alert("Item Deleted Successfully"); window.location.href = "manageactivities.php";</script>';
    }
    else
    {
        echo '<script>alert("Item  Not Deleted"); window.location.href = "manageactitivies.php";</script>';
    }
}
