<?php
$conn = mysqli_connect("localhost", "clubuser", "vitclub123", "club_db");

if (isset($_POST['book'])) {
    $item = $_POST['item'];
    $by = $_POST['by'];
    $date = $_POST['date'];
    mysqli_query($conn, "INSERT INTO equipment (item_name, booked_by, booking_date) VALUES ('$item', '$by', '$date')");
    echo "<h3>Equipment Booked!</h3>";
}

echo "<h1>Book Equipment</h1>";
echo "<form method='post'>";
echo "Item Name: <input type='text' name='item' required><br>";
echo "Booked By: <input type='text' name='by' required><br>";
echo "Date: <input type='date' name='date' required><br>";
echo "<input type='submit' name='book' value='Book Now'>";
echo "</form><hr>";

echo "<h2>Current Equipment Status</h2>";
$result = mysqli_query($conn, "SELECT * FROM equipment");
while($row = mysqli_fetch_assoc($result)) {
    echo $row['item_name'] . " - " . $row['status'] . " (by " . $row['booked_by'] . ")<br>";
}
echo "<br><a href='index.php'>Back</a>";
?>
