<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $roomType = $_POST['roomType'];

    $conn = new mysqli("localhost", "root", "", "hotel_booking");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO bookings (name, email, checkin, checkout, room_type) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $checkin, $checkout, $roomType);

    if ($stmt->execute()) {
        echo "<h2>Thank you for booking with YOYO Hotel! We have received your reservation.</h2>";
    } else {
        echo "<h2>Error: " . $stmt->error . "</h2>";
    }

    $stmt->close();
    $conn->close();
}
?>
