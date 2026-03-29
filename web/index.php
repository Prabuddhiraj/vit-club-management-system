<?php
$conn = mysqli_connect("localhost", "clubuser", "vitclub123", "club_db");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "<h1>VIT Club Management System (Powered by Linux + Apache + PHP + MySQL)</h1>";
echo "<p><a href='events.php'>Events</a> | <a href='equipment.php'>Equipment</a> | <a href='volunteers.php'>Volunteers</a> | <a href='feedback.php'>Feedback</a></p><hr>";

echo "<h2>Today's Events</h2>";
$result = mysqli_query($conn, "SELECT * FROM events WHERE event_date = CURDATE()");
while($row = mysqli_fetch_assoc($result)) {
    echo "• " . $row['event_name'] . " (" . $row['status'] . ")<br>";
}
echo "<hr><a href='../scripts/daily_reminder.sh' target='_blank'>Run Daily Reminder (Terminal)</a>";
?>
