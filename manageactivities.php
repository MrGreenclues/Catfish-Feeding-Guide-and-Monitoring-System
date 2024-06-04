<?php include('includes/header.php');

?>
<div class="main-content">
  <?php include 'sidebar.php'; ?>
  <div class="form-container">
<form  method="POST" action="activitiesconn.php" class="form-border">
<input type="hidden" name="act_id" value="<?= $activities['act_id']; ?>">
  <div class="mb-3">
    <label for="feeding" class="form-label">Activity</label>
    <input type="text" id="inputfeeding" name="feeding" class="form-control" placeholder="Activity" >
  </div>
  <div class="mb-3">
    <label for="time" class="form-label">Time</label>
    <input type="text" name="time" id="inputtime" class="form-control"  placeholder="Time">
  </div>
  <div class="mb-3">
    <label for="date" class="form-label">Date</label>
    <input type="text" name="date"  id="inputdate" class="form-control" name="date" placeholder="Date">
  </div>

  
  <button type="submit" name="add" class="btn btn-primary">Add</button>
  <button type="submit" name="update"  value="<?=$activities['act_id'];?>" class="btn btn-primary">Update</button>
  <button type="submit" name="delete" value="<?=$activities['act_id'];?>" class="btn btn-primary">Delete</button>
</form>
  </div>


  <div class="data-display-container">
  <!-- Container for the search bar -->
  <div class="search-bar-container">
    <input class="form-control" id="tableSearch" type="text" placeholder="Search...">
    <button class="btn btn-primary" id="searchBtn">Search</button>
</div>

  <div class="table-container">
  <table class="table">
    <thead>
            <tr>
    
                <th scope="col">Activity</th>
                <th scope="col">Time</th>
                <th scope="col">Date</th>
            </tr>
        </thead>
        <tbody id="tableBody">
            <?php include('dbconnection.php');
            $query ="SELECT * from activities";
            $query_run = mysqli_query($conn,$query);
            if(mysqli_num_rows($query_run)>0){
              while($activities=mysqli_fetch_assoc($query_run)){
              ?>
                <tr> 
                  <td><?=$activities['act_feeding'];?></td>
                  <td><?=$activities['act_time'];?></td>
                  <td><?=$activities['act_date'];?></td>
             
             <?php   }
            
            }else{
              echo "<tr><td colspan='9'>No Record Found</td></tr>";
            }
            ?>
        </tbody>
    </table>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$('#tableBody tr').click(function() {
    var id = $(this).find('td:eq(act_id)').text(); // Replace id_index with the correct index
    var act_feeding = $(this).find('td:eq(0)').text();
    var act_time = $(this).find('td:eq(1)').text();
    var act_date = $(this).find('td:eq(2)').text();

    $('#inputId').val(id);
    $('#inputfeeding').val(act_feeding);
    $('#inputtime').val(act_time);
    $('#inputdate').val(act_date);
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
    padding: 20px;
    border-radius: 14px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 355px; /* Ensure width is not 100vh; vh is a viewport height unit */
    max-width: 400px;
    background-color: #F0ECE5;
    height: 100%;
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
    width:320px;
    height:40px;
    cursor: pointer;
    
  }
  .form-container{
    padding: 25px;
  }

  /* Optional: Adjust label margin for alignment */
  .form-label {
    margin-bottom: 5px;
    color: #5B5757;
  }
.h2{
  color:#F8FAE5;
  text-align: center;
}

.table th{
  color: black;
  background-color: #fff;
}
#tableBody tr td {
            color: #fff; /* Red color; you can change to any hex code or color name */
        }

</style>