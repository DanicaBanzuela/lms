<?php
// Start the session
session_start();
// Check if the user role is set
if (isset($_SESSION['user_role'])) {
    // Check user role and redirect accordingly
    $user_role = strtolower($_SESSION['user_role']);

    if ($user_role === "admin") {

        header('Location: /lms/admin/index.php'); // Change to the actual homepage path
        exit();
    } elseif ($user_role === "principal") {

        header('Location: /lms/principal/index.php');
        exit();
    } elseif ($user_role === "teacher") {

        header('Location: /lms/faculty/index.php');
        exit();
    } elseif ($user_role === "student") {
        // If logged in, redirect to the homepage
        header('Location: /lms/index.php'); // Change to the actual homepage path
        exit(); // Exit after redirection to prevent further code execution
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="website icon" type="webp" href="assets/img/csi.webp">
    <title>Login</title>

         <link rel="stylesheet" href="assets/css/login.css?v=<?php echo time(); ?>" />
  <style>
  
  </style>
</head>



<body>
  <!-- Navigation Bar -->
  <div class="navbar">
  <div class="logo">
    <h3>Computer System Institute</h3>
  </div>
  <div class="links">
    <a href="" class="edition">Home</a>
    <a href="" class="edition">History</a>
  </div>
</div>
    <?php
        include("includes/alert-notify.php");
    ?>
  <!-- Main Content -->
  <div class="container">
    <!-- Info Section -->
    <div class="info-section">
      <!-- <h1>Log in to your Account</h1> -->
        <h1>Learning Management System</h1>
      <p>Dream big, get involved, Aim High with CSI.</p>
      <p>Learning Management Systems</p>
      <div class="illustration">
        <img src="assets/img/csi.webp"  draggable="false" alt="Illustration">
      </div>
    </div>

    <!-- Login Section -->
    <div class="login-section">
      <h2>Log in to your Account</h2>
      <form action="./includes/login-inc.php" method="POST" onsubmit="showLoading()">
            <!-- Username Input with Icon -->
          <div class="input-box">
            <div class="icon">
              <img src="assets/img/icons8-user-24.webp" alt="Username Icon">
            </div>
            <input type="text" name="username" placeholder="Username" autocomplete="off" autofocus required>
          </div>

          <!-- Password Input with Icon -->
          <div class="input-box">
            <div class="icon">
              <img src="assets/img/icons8-lock-24.webp" alt="Password Icon">
            </div>
            <input type="password" name="password" placeholder="Password" autocomplete="off" required>
          </div>
        <button type="submit" name="submit">Login</button>
      </form>
    </div>
  </div>

  <!-- Interactive Background Animation -->
  <script>
         function showLoading() {
         // Redirect to the loading page
         window.location.href = "loading.php";
     }
    document.body.addEventListener("mousemove", function(e) {
      const x = e.clientX / window.innerWidth;
      const y = e.clientY / window.innerHeight;

      document.body.style.background = `linear-gradient(135deg, 
        rgb(${74 + x * 50}, ${235 + y * 20}, ${213 + y * 40}), 
        rgb(${172 - y * 40}, ${182 + x * 40}, ${229 - x * 20}))`;
    });
  </script>
</body>
</html>
