<?php
$conn = mysqli_connect("localhost", "clubuser", "vitclub123", "club_db");

if (isset($_POST['submit_feedback'])) {
    $event_id = $_POST['event_id'];
    $vol_name = $_POST['vol_name'];
    $comments = $_POST['comments'];
    $voice_path = $_POST['voice_path'];
    mysqli_query($conn, "INSERT INTO feedback (event_id, volunteer_name, comments, voice_note_path) VALUES ($event_id, '$vol_name', '$comments', '$voice_path')");
    echo "<h3>Feedback Saved! Voice note path recorded.</h3>";
}

echo "<h1>Post-Event Feedback</h1>";
echo "<form method='post'>";
echo "Event ID: <input type='number' name='event_id' required><br>";
echo "Volunteer Name: <input type='text' name='vol_name' required><br>";
echo "Comments: <textarea name='comments'></textarea><br>";
echo "Voice Note Path (run record_voice.sh first): <input type='text' name='voice_path'><br>";
echo "<input type='submit' name='submit_feedback' value='Submit Feedback'>";
echo "</form><hr>";

echo "<h2>All Feedback</h2>";
$result = mysqli_query($conn, "SELECT * FROM feedback");
while($row = mysqli_fetch_assoc($result)) {
    echo "Event #" . $row['event_id'] . " by " . $row['volunteer_name'] . " → " . $row['comments'] . "<br>";
}
echo "<br><a href='index.php'>Back</a>";
?>
