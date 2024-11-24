<?php
// Set timezone
date_default_timezone_set('Asia/Kolkata');

// Database connection
$con = mysqli_connect("localhost", "root", "", "rtbsdb");

// Check connection and handle errors
if (mysqli_connect_errno()) {
    // Log error to a file
    error_log("Connection failed: " . mysqli_connect_error(), 3, "errors.log");
    
    // Display user-friendly error message
    echo "Sorry, we're experiencing some issues. Please try again later.";
    exit(); // Stop further script execution
}
?>