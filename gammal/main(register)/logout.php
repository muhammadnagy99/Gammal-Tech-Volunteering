<?php
session_start();

// Unset all session variables
$_SESSION = array();
// Destroy the session
session_destroy();

$_SESSION["loggedin"] = false;
// Redirect to the login page
header("Location: ../main(noregister)/main(noregister).php");
exit();
?>
