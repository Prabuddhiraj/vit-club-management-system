<?php
$conn = mysqli_connect("localhost", "clubuser", "vitclub123", "club_db");
if (!$conn) { die("Connection failed"); }

if (isset($_POST['add_event'])) {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $desc = $_POST['desc'];
    mysqli_query($conn, "INSERT INTO events (event_name, event_date, description) VALUES ('$name', '$date', '$desc')");
    echo "<script>alert('Event Added Successfully!');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events - VIT Club</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f0f4f8; padding: 20px; }
        h1 { color: #1e3a8a; text-align: center; }
        .nav { text-align: center; background: #1e40af; padding: 15px; border-radius: 12px; margin-bottom: 20px; }
        .nav a { color: white; margin: 15px; text-decoration: none; font-weight: bold; }
        .card { background: white; padding: 25px; border-radius: 12px; box-shadow: 0 6px 12px rgba(0,0,0,0.1); max-width: 800px; margin: 0 auto; }
        input, textarea { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 6px; }
        .btn { background: #1e40af; color: white; padding: 12px 25px; border: none; border-radius: 8px; cursor: pointer; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; border-bottom: 1px solid #ddd; }
    </style>
</head>
<body>
    <h1>Events</h1>
    <div class="nav">
        <a href="index.php">Dashboard</a> |
        <a href="equipment.php">Equipment</a> |
        <a href="volunteers.php">Volunteers</a> |
        <a href="feedback.php">Feedback</a>
    </div>

    <div class="card">
        <h2>Add New Event</h2>
        <form method="post">
            Event Name: <input type="text" name="name" required><br>
            Date: <input type="date" name="date" required><br>
            Description: <textarea name="desc" rows="3"></textarea><br>
            <input type="submit" name="add_event" value="Add Event" class="btn">
        </form>
    </div>

    <div class="card">
        <h2>All Events</h2>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM events ORDER BY event_date");
        echo "<table><tr><th>Event</th><th>Date</th><th>Status</th></tr>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>".$row['event_name']."</td><td>".$row['event_date']."</td><td>".$row['status']."</td></tr>";
        }
        echo "</table>";
        ?>
    </div>
</body>
</html>
