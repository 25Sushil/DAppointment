<?php

include '../connection.php';
include '../../admin/session.php';
// Step 2: Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient_name = htmlspecialchars($_POST['patient_name']);
    $patient_email = htmlspecialchars($_POST['patient_email']);
    $appointment_date = htmlspecialchars($_POST['appointment_date']);

    // Set the email subject and body
    $subject = "Appointment Approved";
    $body = "Dear $patient_name,\n\nYour appointment on $appointment_date has been approved.\n\nThank you!";
    $headers = "From: no-reply@yourdomain.com"; // Change this to your domain

    // Send the email
    if (mail($patient_email, $subject, $body, $headers)) {
        echo "<p>Appointment approval message sent successfully to $patient_email!</p>";
    } else {
        echo "<p>Failed to send the message. Please try again later.</p>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approve Appointment</title>
</head>
<body>
    <h1>Approve Appointment</h1>
    <form action="approve_appointment.php" method="post">
        <label for="patient_name">Patient Name:</label><br>
        <input type="text" id="patient_name" name="patient_name" required><br><br>
        
        <label for="patient_email">Patient Email:</label><br>
        <input type="email" id="patient_email" name="patient_email" required><br><br>
        
        <label for="appointment_date">Appointment Date:</label><br>
        <input type="date" id="appointment_date" name="appointment_date" required><br><br>
        
        <input type="submit" value="Approve Appointment">
    </form>
</body>
</html>