<?php
$conn = mysqli_connect("localhost", "clubuser", "vitclub123", "club_db");
if (!$conn) { die("Connection failed"); }

if (isset($_POST['submit_feedback'])) {
    $event_id = $_POST['event_id'];
    $vol_name = $_POST['vol_name'];
    $comments = $_POST['comments'];
    $voice_path = $_POST['voice_path'];
    mysqli_query($conn, "INSERT INTO feedback (event_id, volunteer_name, comments, voice_note_path) VALUES ($event_id, '$vol_name', '$comments', '$voice_path')");
    echo "<script>alert('Feedback Submitted Successfully!');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback - VIT Club</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f0f4f8; padding: 20px; }
        h1 { color: #1e3a8a; text-align: center; }
        .nav { text-align: center; background: #1e40af; padding: 15px; border-radius: 12px; margin-bottom: 20px; }
        .nav a { color: white; margin: 15px; text-decoration: none; font-weight: bold; }
        .card { background: white; padding: 25px; border-radius: 12px; box-shadow: 0 6px 12px rgba(0,0,0,0.1); max-width: 800px; margin: 0 auto; }
        input, textarea { width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #ddd; border-radius: 6px; }
        .btn { background: #1e40af; color: white; padding: 12px 25px; border: none; border-radius: 8px; cursor: pointer; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; border-bottom: 1px solid #ddd; }
    </style>
</head>
<body>
    <h1>Post-Event Feedback</h1>
    <div class="nav">
        <a href="index.php">Dashboard</a> |
        <a href="events.php">Events</a> |
        <a href="equipment.php">Equipment</a> |
        <a href="volunteers.php">Volunteers</a>
    </div>

    <div class="card">
        <h2>Submit Feedback</h2>
        <form method="post">
            Event ID: <input type="number" name="event_id" required><br>
            Volunteer Name: <input type="text" name="vol_name" required><br>
            Comments: <textarea name="comments" rows="4"></textarea><br>
            Voice Note Path (after running record_voice.sh): <input type="text" name="voice_path"><br>
            <input type="submit" name="submit_feedback" value="Submit Feedback" class="btn">
        </form>
    </div>

    <div class="card">
        <h2>All Feedback</h2>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM feedback");
        echo "<table><tr><th>Event ID</th><th>Volunteer</th><th>Comments</th><th>Voice Note</th></tr>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>".$row['event_id']."</td><td>".$row['volunteer_name']."</td><td>".$row['comments']."</td><td>".$row['voice_note_path']."</td></tr>";
        }
        echo "</table>";
        ?>
    </div>
</body>
</html>
