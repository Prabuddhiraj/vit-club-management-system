<?php
$conn = mysqli_connect("localhost", "clubuser", "vitclub123", "club_db");

if (isset($_POST['add_event'])) {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $desc = $_POST['desc'];
    mysqli_query($conn, "INSERT INTO events (event_name, event_date, description) VALUES ('$name', '$date', '$desc')");
    echo "<h3>Event Added Successfully!</h3>";
}

echo "<h1>Add New Event</h1>";
echo "<form method='post'>";
echo "Event Name: <input type='text' name='name' required><br>";
echo "Date: <input type='date' name='date' required><br>";
echo "Description: <textarea name='desc'></textarea><br>";
echo "<input type='submit' name='add_event' value='Add Event'>";
echo "</form><hr>";

echo "<h2>All Events</h2>";
$result = mysqli_query($conn, "SELECT * FROM events ORDER BY event_date");
while($row = mysqli_fetch_assoc($result)) {
    echo $row['event_name'] . " - " . $row['event_date'] . " (" . $row['status'] . ")<br>";
}
echo "<br><a href='index.php'>Back to Dashboard</a>";
?>
