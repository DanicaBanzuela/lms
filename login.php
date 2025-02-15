<?php
// Start the session
session_start();
// Check if the user role is set
if (isset($_SESSION['user_role'])) {
  // Check user role and redirect accordingly
  $user_role = strtolower($_SESSION['user_role']);

  if ($user_role === "registrar") {

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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="website icon" type="webp" href="assets/img/csi.webp">
  <link rel="stylesheet" href="assets/css/login.css?v=<?php echo time(); ?>" />
  <title>Login</title>

  <!-- MDB CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css">
  <!-- Font Awesome for Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

  <style>
    .illustration img {
      max-width: 300px;
      filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.2));
      animation: float 3s infinite ease-in-out;
      /* margin-right: 50px; */
    }

    .width-size {
      width: 100%;
      max-width: 380px;
      margin-left: 30px;
    }

    .login-container {
      background: #fff;
      padding: 40px;
      border-radius: 1rem;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    @keyframes float {

      0%,
      100% {
        transform: translateY(0);
      }

      50% {
        transform: translateY(-10px);
      }
    }
  </style>
</head>

<body>
  <?php
  include("includes/alert-notify.php");
  ?>
  <div class="vh-100 d-flex align-items-center justify-content-center" style="background-color: #212529;">
    <div class="container">
      <div class="row justify-content-center align-items-center">

        <!-- Left Side - CSI Information -->
        <div class="col-md-6 text-center text-white mb-3">
          <div class="d-none d-md-block illustration">
            <h3 class="fw-bold">Computer Systems Institute</h3>
            <p class="h6 fw-normal mb-4"><i>Dream big, get involved, Aim High with CSI.</i></p>
            <img src="assets/img/csi.webp" alt="CSI Logo" class="img-fluid" style="width:280px;">
          </div>
        </div>

        <!-- Right Side - Login Form -->
        <div class="col-md-5">
          <div class="login-container">
            <!-- desktop design -->
            <div class="d-none d-lg-inline text-center mb-5 mt-3">
              <h4 class="text-dark fw-bold mb-0">Learning Management System</h4>
            </div>
            <!-- mobile design  -->
            <div class="d-flex align-items-center mb-5 pb-1">
              <img src="assets/img/csi.webp"
                alt="login form"
                class="img-fluid me-3 d-inline d-lg-none"
                style="width:50px; border-radius: 1rem 0 0 1rem;" />
              <div class="text-center d-inline d-lg-none">
                <p class="fw-bold mb-0 d-block">Learning Management System</p>
                <p class="fw-bold mb-0 d-block">Computer Systems Institute</p>
              </div>
            </div>
            <!-- FORM ELEMENT  -->
            <form action="./includes/login-inc.php" method="POST" onsubmit="showLoading()">
              <h6 class="fw-normal mb-3" style="letter-spacing: 1px;">Login into your account</h6>
              <!-- Username -->
              <div class="form-outline mb-4">
                <input type="text" name="username" class="form-control form-control-lg" autocomplete="off" required />
                <label class="form-label">Username</label>
              </div>

              <!-- Password -->
              <div class="form-outline mb-4">
                <input type="password" name="password" class="form-control form-control-lg" autocomplete="off" required />
                <label class="form-label">Password</label>
              </div>

              <!-- Login Button -->
              <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block mb-4">Login</button>
            </form>

          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- MDB JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>

  <script>
    function showLoading() {
      // Redirect to the loading page
      window.location.href = "loading.php";

    }
    document.addEventListener("DOMContentLoaded", function() {
      const body = document.body;

      document.body.addEventListener("mousemove", function(e) {
        const x = e.clientX / window.innerWidth;
        const y = e.clientY / window.innerHeight;

        body.style.background = `linear-gradient(135deg, 
        rgb(${60 + x * 50}, ${150 + y * 50}, ${220 - y * 40}), 
        rgb(${20 + y * 50}, ${100 + x * 80}, ${180 - x * 30}))`;
      });

      mdb.Input.init(document.querySelectorAll('.form-outline'));
      mdb.Ripple.init(document.querySelectorAll('.btn'));
    });
  </script>


</body>

</html>