<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/webp" href="assets/img/lms.webp">
    <link rel="stylesheet" href="assets/css/login.css?v=<?php echo time(); ?>">

    <title>Computer System Institute LMS</title>
</head>

<?php
session_start();
if (isset($_SESSION['user_role'])) {
    $user_role = strtolower($_SESSION['user_role']);
    switch ($user_role) {
        case 'admin':
            header('Location: /lms/admin/index.php');
            exit();
        case 'teacher':
            header('Location: /lms/faculty/index.php');
            exit();
        case 'student':
            header('Location: /lms/index.php');
            exit();
        default:
            header('Location: /lms/login.php?error=invalidcredentials');
            exit();
    }
}
?>

<body>
    <!-- Header -->
    <header class="header">
        <h1>Computer System Institute</h1>
        <h2>Learning Management System</h2>
    </header>

    <!-- Main Container -->
    <div class="container">
        <div class="login-box">
            <img src="./assets/img/csi.webp" alt="Login Logo" draggable="false" class="login-logo">
            <h2>Login</h2><br>
            <?php include("includes/alert-notify.php"); ?>
            <form action="./includes/login-inc.php" method="POST" onsubmit="showLoading()">
                <div class="input-box">
                    <span class="icon">
                        <img src="assets/img/icons8-user-24.webp" alt="User Icon">
                    </span>
                    <input type="text" placeholder="Username" name="username" required autocomplete="off" autofocus>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <img src="assets/img/icons8-lock-24.webp" alt="Lock Icon">
                    </span>
                    <input type="password" placeholder="Password" name="password" required autocomplete="off">
                </div>
                <button type="submit" name="submit">Login</button>
            </form>
            <div class="text-caption">
                <?php require_once('includes/footer.php'); ?>
            </div>
        </div>
    </div>

    <!-- Loading Animation -->
    <script>
        function showLoading() {
            document.getElementById('loading').style.display = 'flex';
        }
    </script>
</body>

</html>
