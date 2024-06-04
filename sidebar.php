<?php include('includes/header.php');?>
<!-- Sidebar Container -->
<div class="sidebar-container">
  <ul class="nav flex-column">
    <li class="nav-item">
      <a class="nav-link" href="manageuser.php">Manage User</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="pondrecords.php">Pond Records</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="stocks.php">Stocks</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="manageactivities.php">Manage Activities</a>
    </li>
    <li class="nav-item to-bottom">
      <a class="nav-link" href="login.php ">Log out</a>
    </li>
  </ul>
</div>

<style>/* Sidebar Styles */
.main-content {
  margin-left: 240px; /* Same as sidebar width */
}
.sidebar-container {
  height: 100vh; /* Full-height */
  width: 240px; /* Set the width of the sidebar */
  position: fixed; /* Fixed Sidebar (stay in place on scroll) */
  z-index: 1; /* Stay on top */
  top: 0; /* Stay at the top */
  left: 0;
  background-color: #f8f9fa; /* Sidebar color */
  overflow-x: hidden; /* Disable horizontal scroll */
  padding-top: 80px;
  background-color: #04364A;
  border-top-right-radius: 14px;
  border-bottom-right-radius: 14px
}
.sidebar-container .nav {
  display: flex;
  flex-direction: column;
  height: 100%; /* Ensure it takes full height of its parent */
}

.nav-item.to-bottom {
  margin-top: auto; /* Push this item to the bottom */
}
/* Adjustments for nav-links to look more like buttons */
.sidebar-container .nav-link {
  padding: 10px 15px;
  margin: 10px; /* Added margin around links */
  text-decoration: none;
  font-size: 18px;
  color: #5B5757;
  font-weight: bold; 
  display: block;
  text-align: center; 
  border-radius: 5px; /* Rounded corners for the border */
  background-color: #fff; /* Background color */
  transition: all 0.3s; /* Smooth transition for hover effects */
}

.sidebar-container .nav-link:hover, .sidebar-container .nav-link.active {
  color: #fff; /* Text color for hover and active states */
  background-color: #007bff; /* Background color for hover and active states */
  border-color: #0056b3; /* Darker border color for hover and active states */
}

/* Disabled link */
.sidebar-container .nav-link.disabled {
  color: #6c757d;
  border-color: #ced4da; /* Lighter border for disabled links */
  background-color: #e9ecef; /* Lighter background for disabled links */
}
