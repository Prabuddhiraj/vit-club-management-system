<?php
$conn = mysqli_connect("localhost", "clubuser", "vitclub123", "club_db");

if (isset($_POST['assign'])) {
    $name = $_POST['name'];
    $event_id = $_POST['event_id'];
    $role = $_POST['role'];
    $phone = $_POST['phone'];
    mysqli_query($conn, "INSERT INTO volunteers (name, event_id, role, phone) VALUES ('$name', $event_id, '$role', '$phone')");
    echo "<h3>Volunteer Assigned!</h3>";
}

echo "<h1>Assign Volunteer</h1>";
echo "<form method='post'>";
echo "Name: <input type='text' name='name' required><br>";
echo "Event ID: <input type='number' name='event_id' required><br>";
echo "Role: <input type='text' name='role' required><br>";
echo "Phone: <input type='text' name='phone'><br>";
echo "<input type='submit' name='assign' value='Assign'>";
echo "</form><hr>";

echo "<h2>All Volunteers</h2>";
$result = mysqli_query($conn, "SELECT * FROM volunteers");
while($row = mysqli_fetch_assoc($result)) {
    echo $row['name'] . " (" . $row['role'] . ") for Event #" . $row['event_id'] . "<br>";
}
echo "<br><a href='index.php'>Back</a>";
?>
