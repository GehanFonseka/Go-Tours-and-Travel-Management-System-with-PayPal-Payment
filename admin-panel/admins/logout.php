<?php 
session_start();
session_unset();
session_destroy();

// Corrected the header function syntax
header("Location: http://localhost/wooxtravel/index.php");
exit(); // Good practice to terminate script execution after a redirect
?>
