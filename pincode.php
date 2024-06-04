<?php include('includes/header.php'); ?>
<div class="container"></div>
<div class="container d-flex justify-content-center align-items-center vh-100">
  <form method="POST" action="pincodeconn.php" class="form-border">
    <div class="mb-3 pin-container">
      <label for="pin" class="form-label">PIN Code</label>
      <div class="pin-inputs">
        <input type="text" class="form-control pin-input" name="pin1" id="pin1" maxlength="1" onkeyup="moveFocus(1,2)">
        <input type="text" class="form-control pin-input" name="pin2" id="pin2" maxlength="1" onkeyup="moveFocus(2,3)">
        <input type="text" class="form-control pin-input" name="pin3" id="pin3" maxlength="1" onkeyup="moveFocus(3,4)">
        <input type="text" class="form-control pin-input" name="pin4" id="pin4" maxlength="1" onkeyup="moveFocus(4,5)">
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
<script>
function moveFocus(current, next) {
  if (document.getElementById('pin' + current).value.length == 1) {
    document.getElementById('pin' + next).focus();
  }
}
</script>
<style>
body {
  height: 100vh; /* Updated for full viewport height */
  overflow-x: hidden;
}

.form-border {
  border: 2px solid white;
  padding: 20px;
  backdrop-filter: blur(5px);
  background-color: #074173;
  width: 400px; 
  border-radius: 14px;
}

.form-label {
  color: White;
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

.form-control:focus {
  box-shadow: none; /* Remove or customize focus glow if needed */
}
</style>
</body>