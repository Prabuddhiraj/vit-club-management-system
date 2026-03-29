<?php
$conn = mysqli_connect("localhost", "clubuser", "vitclub123", "club_db");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIT Club Management System</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f0f4f8; margin: 0; padding: 20px; }
        h1 { color: #1e3a8a; text-align: center; background: white; padding: 25px; border-radius: 12px; box-shadow: 0 6px 12px rgba(0,0,0,0.1); }
        .subtitle { text-align: center; color: #555; margin-bottom: 20px; }
        .nav { text-align: center; background: #1e40af; padding: 18px; border-radius: 12px; margin: 20px 0; }
        .nav a { color: white; margin: 0 20px; text-decoration: none; font-weight: bold; font-size: 1.1em; }
        .nav a:hover { text-decoration: underline; }
        .card { background: white; padding: 25px; margin: 20px 0; border-radius: 12px; box-shadow: 0 6px 12px rgba(0,0,0,0.1); }
        .btn { background: #1e40af; color: white; padding: 12px 25px; border: none; border-radius: 8px; text-decoration: none; font-weight: bold; }
        .btn:hover { background: #1e3a8a; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
    </style>
</head>
<body>
    <h1>VIT Club Management System</h1>
    <p class="subtitle">Powered by Linux + Apache + PHP + MySQL (Modules 1-5)</p>

    <div class="nav">
        <a href="events.php">Events</a> |
        <a href="equipment.php">Equipment</a> |
        <a href="volunteers.php">Volunteers</a> |
        <a href="feedback.php">Feedback</a>
    </div>

    <div class="card">
        <h2>Today's Events</h2>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM events WHERE event_date = CURDATE()");
        if (mysqli_num_rows($result) > 0) {
            echo "<table><tr><th>Event Name</th><th>Status</th></tr>";
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row['event_name'] . "</td><td>" . $row['status'] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No events scheduled for today.</p>";
        }
        ?>
    </div>

    <div class="card">
        <a href="../scripts/daily_reminder.sh" class="btn" target="_blank">Run Daily Reminder (Terminal)</a>
    </div>
</body>
</html>
