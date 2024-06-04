<?php include('includes/header.php'); ?>
<div class="container">
</nav>
   </div>
   <div class="container  d-flex justify-content-center align-items-center vh-100">
     <form method="POST" action="loginconn.php" class="form-border">
      <h2 class="text">Login</h2>
  <div class="mb-3">
    
    <input type="email" class="form-control" name="email" id="Email" placeholder="Email" >
  </div>
  <div class="mb-3">
    
    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
  </div>
  <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="emplogin.php">Login as a Employee</a></li>
  </ol>
</nav>

                 
                
  <button type="submit" class="btn btn-primary">Login</button>
</form>
   </div>
  </body>
  
  <style>
    body{
  height: 5000px;
  overflow-x: hidden ;
}



.form-border {
    border: 2px solid white;
    padding: 20px;
    backdrop-filter: blur(5px);
    background-color: #074173;
    width: 400px; 
     border-radius: 14px;
}
.form-label{
  color: White;
}
.form-text{
  color: white;
}
.form-check-label{
  color: white;
}
.form-control {
    width: 100%; 
    color: #fff;
    padding: 10px;
    font-weight: bold;
}
.btn{
  width: 355px;
  height: 40px;
}
.text{
  margin-bottom: 10px;
    color: #fff;
    font-weight: bold;
}
  </style>