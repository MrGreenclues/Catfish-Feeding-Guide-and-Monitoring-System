<?php include('includes/header.php'); ?>
<div class="main-content">
  <?php include 'sidebar.php'; ?>
  <div class="form-container">
  <nav class="navbar">
   <span class="navbar-brand mb-0 h1">Manage User</span>
</nav>
<form  method="POST" action="createconn.php" class="form-border">
  <div class="mb-3">
    <label for="Fname" class="form-label">First name</label>
    <input type="text" name="Fname" class="form-control" placeholder="First name" >
  </div>
 
  <div class="mb-3">
    <label for="Lname" class="form-label">Last name</label>
    <input type="text" name="Lname" class="form-control" name="Lname" placeholder="Last name">
  </div>
  <div class="mb-3">
    <label for="Age" class="form-label">Age</label>
    <input type="text" name="age" class="form-control" placeholder="Age">
  </div>
  <div class="mb-3">
    <label for="Birthday" class="form-label">Birthday</label>
    <input type="date" name="birthday" class="form-control"  placeholder="YYYY/DD/MM">
  </div>
   <div class="mb-3">
    <label for="address" class="form-label">Address</label>
    <input type="text" name="address" class="form-control"  placeholder="Address">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="Email" placeholder="email">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input  placeholder="password" type="password" name="pass" class="form-control" id="exampleInputPassword1">
  </div>
 
  <label for="exampleInputPassword1" class="form-label">Pincode</label>
  <div class="pin-inputs">
        <input type="text" class="form-control pin-input" name="pin1" id="pin1" maxlength="1" onkeyup="moveFocus(1,2)">
        <input type="text" class="form-control pin-input" name="pin2" id="pin2" maxlength="1" onkeyup="moveFocus(2,3)">
        <input type="text" class="form-control pin-input" name="pin3" id="pin3" maxlength="1" onkeyup="moveFocus(3,4)">
        <input type="text" class="form-control pin-input" name="pin4" id="pin4" maxlength="1" onkeyup="moveFocus(4,5)">
      </div>
  <button type="submit" name="register" class="btn btn-primary">Add Account</button>
</form>
  </div>


<div class="data-display-container">
  <!-- Container for the search bar -->
  <div class="search-bar-container">
  
</div>

  <div class="table-container">
    <table class="table">
    <thead>
            <tr>
    
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email Address</th>
            </tr>
        </thead>
        <tbody id="tableBody">
            <?php include('dbconnection.php');
            $query ="SELECT * from accounts";
            $query_run = mysqli_query($conn,$query);
            if(mysqli_num_rows($query_run)>0){
              while($accounts=mysqli_fetch_assoc($query_run)){
              ?>
                <tr> 
                  <td><?=$accounts['fname'];?></td>
                  <td><?=$accounts['lname'];?></td>
                  <td><?=$accounts['email'];?></td>
             
             <?php   }
            
            }else{
              echo "<tr><td colspan='9'>No Record Found</td></tr>";
            }
            ?>
        </tbody>
    </table>
  </div>
</div>
<script>
$('#tableBody tr').click(function() {
    var id = $(this).find('td:eq(itemId)').text(); // Replace id_index with the correct index
    var item = $(this).find('td:eq(0)').text();
    var quantity = $(this).find('td:eq(1)').text();
    var type = $(this).find('td:eq(2)').text();

    $('#inputId').val(id);
    $('#inputItem').val(item);
    $('#inputQuantity').val(quantity);
    $('#inputType').val(type);
});

$(document).ready(function(){
    $("#tableSearch").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tableBody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    // Assuming you want to keep the functionality where clicking a row populates the form
    $('#tableBody tr').click(function() {
        var item = $(this).find('td:eq(0)').text();
        var quantity = $(this).find('td:eq(1)').text();
        var type = $(this).find('td:eq(2)').text();

        $('#inputItem').val(item);
        $('#inputQuantity').val(quantity);
        $('#inputType').val(type);
    });
});
</script>
<style>
    .main-content {
        display: flex;
    /* Align items at the start of the container - if you want the sidebar and form to be side by side, you might not need 'flex-direction: column;' */
    flex-direction: row; /* This ensures the sidebar and the content area are side by side */
    height: 100vh; /* This will make the .main-content stretch to full viewport height */
    align-items: stretch;
    background-color:#EEF5FF ;
}
/* table */
.data-display-container {
  display: flex;
  flex-direction: column;
  align-items: center; /* Center the table container */
  width: 1500px;
  padding-top: 60px;
}
.table th{
  color:black;
  background-color: #fff;


}

.search-bar-container {
  display: flex;
  align-items: center; /* Updated for vertical alignment */
  gap: 10px;
  padding: 20px;
  margin-left: 300px; /* Adjust this value to move the container to the right */
}

.search-bar-container .form-control {
  flex-grow: 1;
  margin-left: 20px; /* Allows the input to take up the remaining space */
}

.search-bar-container .btn-primary {
  padding: 0.375rem 0.75rem;
  margin-left: 20px; /* Adjusts padding to match the input */
  /* Additional button styling here */
}

.table-container {
  width: 100%;
  max-width: 1200px;
  min-height: 600px; /* Ensures a big box appearance */
  overflow: auto;
  margin: 0 auto;
  background-color: #35374B;
  border: 1px solid #ddd;
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
  border-radius: 10px;
  display: flex;
  flex-direction: column; 
}

/* .table {
  width: 100%; /* Allows the table to expand to the width of .table-container */
  table-layout: fixed;
  border-collapse: collapse;
  margin-top: auto;
  
}

/* Optional: Additional styles for the table to enhance appearance */
.table thead {
  position: sticky;
  top: 0;
  background-color: #35374B;
  color: white;
  z-index: 1;  /* Text color for the header */
}

#tableBody tr td {
            color: #fff; /* Red color; you can change to any hex code or color name */
        }

.table td, .table th {
  text-align: left;
  padding: 8px;
  border: 1px solid #ddd; /* Example: Set a specific height for table cells */
}
.table th:nth-child(1) { width: 10%; }
.table th:nth-child(2) { width: 30%; }
.table th:nth-child(3) { width: 30%; }
.table th:nth-child(4) { width: 30%; } */

/* Ensuring the search bar is not too wide */
#tableSearch {
  width: auto;
  min-width: 200px; /* Adjust based on your needs */
}
/*table*/

  /* Center the container */
  .container-fluid{
    display: flex;
    flex-direction: column; /* This ensures the form elements are arranged vertically */
    justify-content: flex-start; /* Align items at the start */
    align-items: center; /* Center items horizontally */
    height: 100%;
  }

  form {
    padding: 10px;
    border-radius: 14px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 355px; /* Ensure width is not 100vh; vh is a viewport height unit */
    max-width: 400px;
    background-color: #F0ECE5;
    height: 95%;
  }


  /* Adjustments for form elements */
  .form-control, .btn {
    margin-top: 10px; /* Spacing between form elements */
  }

  /* Optional: Style the button */
  .btn-primary {
    background-color: #04364A;
    color:#F8FAE5 ;
    border: 2px solid #F8FAE5; 
    padding: 5px 5px;
    width:315px;
    height:40px;
    cursor: pointer;
    
  }
  .form-container{
    padding: 30px;
  }

  /* Optional: Adjust label margin for alignment */
  .form-label {
    margin-bottom: -10px;
    color: #5B5757;
    font-weight: bold;
  }

.navbar{
  margin-top: -10px;
  background-color:#EEF5FF ;
  width: auto;
}
.navbar-brand{
  background-color:#EEF5FF ;
    font-weight: bold;
}
.pin-container label {
  display: block;
}

.pin-inputs {
  display: flex;
  justify-content: space-between;
}

.pin-input {
  width: 22%; /* Adjust width to spread across container */
  text-align: center; /* Center text in inputs */
}

</style>