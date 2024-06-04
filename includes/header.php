<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <link rel="stylesheet" href="car.css">
     <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
     <script defer src="bootstrap/js/bootstrap.bundle.min.js"></script>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
      <title>Catfish</title>
      
  </head>
  <script>
    // Function to logout the user
    function logoutUser() {
        // Redirect to logout script
        window.location.href = "login.php";
    }

    // Function to update last activity timestamp in local storage
    function updateLastActivity() {
        localStorage.setItem('lastActivity', Date.now());
    }

    // Function to check if user is idle based on last activity timestamp
    function checkIdle() {
        var lastActivity = localStorage.getItem('lastActivity');
        if (lastActivity) {
            var currentTime = Date.now();
            var idleTime = currentTime - parseInt(lastActivity);
           //5 mins actual
            var idleThreshold = 5 * 60 * 1000;
            //10 sec for demo
            // var idleThreshold = 10 * 1000; 
            if (idleTime > idleThreshold) {
                // Perform logout action when idle

                alert("Session Time Please login again :>.");
                logoutUser();
            }
        }
    }

    // Initialize last activity timestamp when the page loads
    window.onload = function() {
        updateLastActivity();
        // Check idle status periodically
        setInterval(checkIdle, 1000); // Check every 1 second (adjust as needed)
    };

    // Update last activity timestamp on user interaction
    document.addEventListener('mousemove', updateLastActivity);
    document.addEventListener('keypress', updateLastActivity);
</script>

  <body>