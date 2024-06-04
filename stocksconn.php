<?php

session_start();
include ('dbconnection.php');

if(isset($_POST['add'])){
 $item = $_POST['Item'];
  $quantity  = $_POST['Quan'];
   $type  = $_POST['Type'];

  
if (md5($str)){

  $sql = "INSERT INTO stocks(item,quantity,type) values ('$item','$quantity','$type')";
  $result = mysqli_query($conn,$sql);
echo '<script>alert("Item added Successfull"); window.location.href = "stocks.php";</script>';
 
}
    else {
echo '<script>alert("Invalid"); window.location.href = "stocks.php";</script>';
    }

}


   
if(isset($_POST['update']))
{
    $itemId = $_POST['itemId'];
    $item = $_POST['Item'];
    $quantity  = $_POST['Quan'];
    $type  = $_POST['Type'];

    // Prepare an SQL statement for execution
    $stmt = $conn->prepare("UPDATE stocks SET item=?, quantity=?, type=? WHERE itemId=?");

    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("sisi", $item, $quantity, $type, $itemId);

    // Execute the statement
    if ($stmt->execute()) {
        echo '<script>alert("Item Updated Successfully"); window.location.href = "stocks.php";</script>';
    } else {
        echo '<script>alert("Item Not Updated"); window.location.href = "stocks.php";</script>';
    }

    // Close the statement
    $stmt->close();
}

if(isset($_POST['delete']))
{
    // Check if 'delete_account' is provided
    if (!isset($_POST['itemId'])) {
        echo '<script>alert("Account ID missing."); window.location.href = "stocks.php";</script>';
        exit;
    }

    // Initialize $itemId from a source. Assuming it's a POST parameter you expected
    if (!isset($_POST['itemId'])) {
        echo '<script>alert("Item ID missing."); window.location.href = "stocks.php";</script>';
        exit;
    }

    // Sanitize the input to prevent SQL Injection
    $itemid = mysqli_real_escape_string($conn, $_POST['delete']);
    $itemId = mysqli_real_escape_string($conn, $_POST['itemId']);

    // Correct the SQL query to match actual column names in your table
    $query = "DELETE FROM stocks WHERE itemId = '$itemId'"; // Ensure 'id' is the correct column name in your 'stocks' table

    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo '<script>alert("Item Deleted Successfully"); window.location.href = "stocks.php";</script>';
    }
    else
    {
        echo '<script>alert("Item  Not Deleted"); window.location.href = "stocks.php";</script>';
    }
}
