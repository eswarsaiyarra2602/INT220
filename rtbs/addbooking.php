<?php
// Include the database connection
include_once('admin/includes/config.php');

// Get raw POST data
$data = json_decode(file_get_contents("php://input"), true);

// Check if the data is properly received
if (isset($data['name'], $data['email'], $data['phonenumber'], $data['bookingdate'], $data['bookingtime'], $data['noadults'], $data['nochildrens'])) {
    // Sanitize and store the data
    $fullName = mysqli_real_escape_string($con, $data['name']);
    $emailId = mysqli_real_escape_string($con, $data['email']);
    $phoneNumber = mysqli_real_escape_string($con, $data['phonenumber']);
    $bookingDate = mysqli_real_escape_string($con, $data['bookingdate']);
    $bookingTime = mysqli_real_escape_string($con, $data['bookingtime']);
    $noAdults = mysqli_real_escape_string($con, $data['noadults']);
    $noChildrens = mysqli_real_escape_string($con, $data['nochildrens']);
    
    // Generate booking number
    $bookingNo = rand(1000000000, 9999999999); // Example of random booking number

    // Insert into the database
    $query = "INSERT INTO tblbookings (bookingNo, fullName, emailId, phoneNumber, bookingDate, bookingTime, noAdults, noChildrens) 
              VALUES ('$bookingNo', '$fullName', '$emailId', '$phoneNumber', '$bookingDate', '$bookingTime', '$noAdults', '$noChildrens')";
    
    if (mysqli_query($con, $query)) {
        // Return a success response with the booking number
        echo json_encode(["success" => true, "bookingNo" => $bookingNo, "message" => "Booking successful"]);
    } else {
        // Return an error response
        echo json_encode(["success" => false, "message" => "Error inserting booking data: " . mysqli_error($con)]);
    }
} else {
    // Return error if data is missing
    echo json_encode(["success" => false, "message" => "Missing required fields"]);
}
?>