<?php
session_start();
session_unset();  // Remove all session variables
session_destroy();  // Destroy the session
header('Location: Login.php');  // Redirect to login page after logout
exit;
?>