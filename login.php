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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css"> <!-- Font Awesome for Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

  <style>
    .illustration img {
      max-width: 300px;
      filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.2));
      animation: float 3s infinite ease-in-out;
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
  <div class="vh-100" style="background-color: #212529;">

    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-flex justify-content-center align-items-center text-center">
                <div class="d-none d-md-block illustration">
                  <p class="h3 fw-bold text-black mb-3">Computer Systems Institute</p>
                  <p class="h6 fw-normal text-black mb-4 ms-4"><i>Dream big, get involved, Aim High with CSI.</i></p>

                  <img src="assets/img/csi.webp"
                    alt="login form" class="img-fluid" style="width:200px; border-radius: 1rem 0 0 1rem;" />
                </div>
              </div>

              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
                  <form action="./includes/login-inc.php" method="POST" onsubmit="showLoading()">

                    <div class="d-flex align-items-center mb-5 pb-1">
                      <!-- Show image only on mobile (hide on large screens) -->
                      <img src="assets/img/csi.webp"
                        alt="login form"
                        class="img-fluid me-3 d-inline d-lg-none"
                        style="width:50px; border-radius: 1rem 0 0 1rem;" />

                      <!-- desktop design -->
                      <div class="d-none d-lg-inline">
                        <i class="fas fa-cubes fa-2x me-3"
                          style="color: #ff6219;"></i>
                        <span class="h3 fw-bold mb-0">Learning Management System</span>
                      </div>

                      <!-- mobile design  -->
                      <div class="text-center d-inline d-lg-none">
                        <span class="fw-bold mb-0 d-block">Computer Systems Institute</span>
                        <small class="fw-bold mb-0 d-block">Learning Management System</small>
                      </div>

                    </div>
                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Login into your account</h5>

                    <!-- Email Input -->
                    <div class="form-outline mb-4">
                      <input type="text" name="username" class="form-control form-control-lg" autocomplete="off" required />
                      <label class="form-label">Username</label>
                    </div>

                    <!-- Password Input -->
                    <div class="form-outline mb-4">
                      <input type="password" name="password" class="form-control form-control-lg" autocomplete="off" required />
                      <label class="form-label">Password</label>
                    </div>

                    <!-- Login Button -->
                    <div class="pt-1 mb-5">
                      <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                    </div>
                  </form>
                </div>
              </div>



            </div>
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