<?php
    include '../connection.php';
    include '../../admin/session.php';

    $id = $_GET['notifiedid'];
    $sql = "SELECT * FROM `appointment` where id=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $aid = $row['id'];
    $speciality = $row['sid'];
    $did = $row['did'];
    $patient_name = $row['name'];
    $patient_email = $row['email'];
    $appointment_date = $row['date'];
    $appointment_time = $row['time'];
    $status = $row['status'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS</title>
</head>
<body>
<h1>Approve Appointment</h1>
    <form action="" method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required>
        <span></span>
        <br><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="message">Message:</label><br>
        <textarea id="message" name="message" required></textarea><br><br>
        
        <input type="submit" value="Send Message">
    </form>
</body>
</html>

<!-- <?php
include '../connection.php';
include '../../admin/session.php';

$id = $_GET['approveid'];
$sql = "SELECT * FROM `appointment` WHERE id=$id";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
$aid = $row['id'];
$speciality = $row['sid'];
$did = $row['did'];
$email = $row['email']; // Assuming the appointment table has an email field
$name = $row['fullname']; // Assuming the appointment table has a name field

if (isset($_GET['approveid'])) {
    $id = $_GET['approveid'];

    $usql = "UPDATE appointment SET status=1 WHERE id='$id';";
    $uresult = mysqli_query($conn, $usql);

    $sql = "INSERT INTO `patient` (`aid`, `sid`, `did`) VALUES ('$aid', '$speciality', '$did');"; 
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        // Prepare email
        $to = $email; // Recipient's email
        $subject = "Appointment Approved";
        $email_content = "Dear $name,\n\nYour appointment has been approved.\n\nThank you!";
        $headers = "From: bohorasushil25@gmail.com"; // Replace with your domain

        // Send email
        if (mail($to, $subject, $email_content, $headers)) {
            // Email sent successfully
            header('location: ../../admin/patients.php');
        } else {
            // Email sending failed
            echo "There was a problem sending the email notification.";
        }
    } else {
        die(mysqli_error($conn));
    }
}
?> -->