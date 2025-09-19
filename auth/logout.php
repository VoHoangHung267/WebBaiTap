<?php
// logout.php
session_start();

// Destroy all session data
session_destroy();

// Clear all session variables
$_SESSION = array();

// Clear session cookie
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-3600, '/');
}

// Redirect to login page
header("Location: auth.php");
exit();
?>