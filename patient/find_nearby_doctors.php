<?php
// DB Connection
$conn = new mysqli("localhost", "root", "", "das");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input
$user_lat = $_POST['latitude'];
$user_lng = $_POST['longitude'];
// $user_lat = 27.69224;
// $user_lng = 85.23403;
$speciality = $_POST['speciality'];
$radius = $_POST['radius']; // in kilometers

// Prepare SQL with Haversine
$sql = "
    SELECT 
        id,
        fname,
        sid,
        latitude,
        longitude,
        (
            6371 * ACOS(
                COS(RADIANS(?)) * COS(RADIANS(latitude)) *
                COS(RADIANS(longitude) - RADIANS(?)) +
                SIN(RADIANS(?)) * SIN(RADIANS(latitude))
            )
        ) AS distance
    FROM doctor
    WHERE sid = ?
    HAVING distance <= ?
    ORDER BY distance ASC
";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ddssd", $user_lat, $user_lng, $user_lat, $speciality, $radius);
$stmt->execute();
$result = $stmt->get_result();

// Display results
if ($result->num_rows > 0) {
    echo "<h3>Doctors near you:</h3><ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li><strong>{$row['fname']}</strong> - {$row['sid']} ({$row['distance']} km away)</li>";
    }
    echo "</ul>";
} else {
    echo "No doctors found within {$radius} km.";
}

$stmt->close();
$conn->close();
?>