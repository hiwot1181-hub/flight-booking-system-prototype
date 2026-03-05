<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form data
    $from_city = $_POST['from_city'];
    $to_city = $_POST['to_city'];
    $depart_date = $_POST['depart_date'];
    $return_date = $_POST['return_date'] ?? NULL;
    $travel_class = $_POST['travel_class'];
    $adults = $_POST['adults'];
    $children = $_POST['children'];
    $infants = $_POST['infants'];
    $promo_code = $_POST['promo_code'];
    $flexible_dates = isset($_POST['flexible_dates']) ? 1 : 0;

    // Trip type (default round)
    $trip_type = "round";
    if (isset($_POST['trip_type'])) {
        $trip_type = $_POST['trip_type'];
    }

    // Insert into database
    $sql = "INSERT INTO bookings 
    (from_city, to_city, depart_date, return_date, travel_class, adults, children, infants, promo_code, flexible_dates, trip_type)
    VALUES 
    ('$from_city', '$to_city', '$depart_date', '$return_date', '$travel_class', '$adults', '$children', '$infants', '$promo_code', '$flexible_dates', '$trip_type')";

    if (mysqli_query($conn, $sql)) {
        echo "<h2>Booking Successful ✈️</h2>";
        echo "<p>From: $from_city</p>";
        echo "<p>To: $to_city</p>";
        echo "<p>Departure: $depart_date</p>";
        echo "<p>Class: $travel_class</p>";
        echo "<a href='index.html'>Book another flight</a>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>