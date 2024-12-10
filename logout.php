<?php
session_start();
// Destroy all session data and log out user regardless of role
unset($_SESSION['username']);
unset($_SESSION['id']);
session_destroy();

// header("refresh:1; url=login.php"); // Redirect to the single login page
// Redirect to login with a success flag
header("location: /lms/login.php?success=logout");
exit();
