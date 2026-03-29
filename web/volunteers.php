<?php
$conn = mysqli_connect("localhost", "clubuser", "vitclub123", "club_db");
if (!$conn) { die("Connection failed"); }

if (isset($_POST['assign'])) {
    $name = $_POST['name'];
    $event_id = $_POST['event_id'];
    $role = $_POST['role'];
    $phone = $_POST['phone'];
    mysqli_query($conn, "INSERT INTO volunteers (name, event_id, role, phone) VALUES ('$name', $event_id, '$role', '$phone')");
    echo "<script>alert('Volunteer Assigned Successfully!');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteers - VIT Club</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f0f4f8; padding: 20px; }
        h1 { color: #1e3a8a; text-align: center; }
        .nav { text-align: center; background: #1e40af; padding: 15px; border-radius: 12px; margin-bottom: 20px; }
        .nav a { color: white; margin: 15px; text-decoration: none; font-weight: bold; }
        .card { background: white; padding: 25px; border-radius: 12px; box-shadow: 0 6px 12px rgba(0,0,0,0.1); max-width: 800px; margin: 0 auto; }
        input { width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #ddd; border-radius: 6px; }
        .btn { background: #1e40af; color: white; padding: 12px 25px; border: none; border-radius: 8px; cursor: pointer; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; border-bottom: 1px solid #ddd; }
    </style>
</head>
<body>
    <h1>Volunteer Management</h1>
    <div class="nav">
        <a href="index.php">Dashboard</a> |
        <a href="events.php">Events</a> |
        <a href="equipment.php">Equipment</a> |
        <a href="feedback.php">Feedback</a>
    </div>

    <div class="card">
        <h2>Assign Volunteer</h2>
        <form method="post">
            Name: <input type="text" name="name" required><br>
            Event ID: <input type="number" name="event_id" required><br>
            Role: <input type="text" name="role" required><br>
            Phone: <input type="text" name="phone"><br>
            <input type="submit" name="assign" value="Assign Volunteer" class="btn">
        </form>
    </div>

    <div class="card">
        <h2>All Volunteers</h2>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM volunteers");
        echo "<table><tr><th>Name</th><th>Event ID</th><th>Role</th><th>Phone</th></tr>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>".$row['name']."</td><td>".$row['event_id']."</td><td>".$row['role']."</td><td>".$row['phone']."</td></tr>";
        }
        echo "</table>";
        ?>
    </div>
</body>
</html>
