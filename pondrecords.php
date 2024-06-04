<?php include('includes/header.php'); ?>
<div class="main-content">
  <?php include 'sidebar.php'; ?>
 

<div class="data-display-container">

  <div class="dropdown">

</div>


  <div class="table-container">
  <table class="table">
    <thead>
            <tr>
            
                <th scope="col">Activity</th>
                <th scope="col">Pond</th>
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
                  <td><?=$activities['act_pond'];?></td>
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
  <div class="table-container1">
  <table class="table">
    <thead>
            <tr>
    
                <th scope="col">Medicine</th>
                <th scope="col">pond</th>
                <th scope="col">time</th>
                <th scope="col">date</th>
            </tr>
        </thead>
        <tbody id="tableBody">
            <?php include('dbconnection.php');
            $query ="SELECT * from med_act";
            $query_run = mysqli_query($conn,$query);
            if(mysqli_num_rows($query_run)>0){
              while($med_act=mysqli_fetch_assoc($query_run)){
              ?>
                <tr> 
                  <td><?=$med_act['activity'];?></td>
                  <td><?=$med_act['pond'];?></td>
                  <td><?=$med_act['time'];?></td>
                  <td><?=$med_act['date'];?></td>
             
             <?php   }
            
            }else{
              echo "<tr><td colspan='9'>No Record Found</td></tr>";
            }
            ?>
        </tbody>
    </table>
    
  </div>
</div>
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

.dropdown {
  display: flex;
  align-items: center; /* Updated for vertical alignment */
  gap: 10px;
  padding: 20px;
  margin-left: 800px; /* Adjust this value to move the container to the right */
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
.table-container1{
  width: 100%;
  max-width: 1200px;
  min-height: 300px; /* Ensures a big box appearance */
  overflow: auto;
  margin: 20px auto 0 auto;
  background-color: #35374B;
  border: 1px solid #ddd;
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
  border-radius: 10px;
  display: flex;
  flex-direction: column;
   
}


/* Optional: Additional styles for the table to enhance appearance */
.table thead {
  position: sticky;
  top: 0;
  background-color: #35374B;
  color: white;
  z-index: 1;  /* Text color for the header */
}

.table td{
  text-align: left;
  padding: 8px;
 color: #fff;
  border: 1px solid #ddd; /* Example: Set a specific height for table cells */
}
.table th{
  color: black;
  background-color: #fff;
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
    background: #04364A;
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
    color: #F8FAE5;
  }
.h2{
  color:#F8FAE5;
  text-align: center;
}

</style>