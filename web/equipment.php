<?php
$conn = mysqli_connect("localhost", "clubuser", "vitclub123", "club_db");
if (!$conn) { die("Connection failed"); }

if (isset($_POST['book'])) {
    $item = $_POST['item'];
    $by = $_POST['by'];
    $date = $_POST['date'];
    mysqli_query($conn, "INSERT INTO equipment (item_name, booked_by, booking_date) VALUES ('$item', '$by', '$date')");
    echo "<script>alert('Equipment Booked Successfully!');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipment - VIT Club</title>
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
    <h1>Equipment Booking</h1>
    <div class="nav">
        <a href="index.php">Dashboard</a> |
        <a href="events.php">Events</a> |
        <a href="volunteers.php">Volunteers</a> |
        <a href="feedback.php">Feedback</a>
    </div>

    <div class="card">
        <h2>Book New Equipment</h2>
        <form method="post">
            Item Name: <input type="text" name="item" required><br>
            Booked By: <input type="text" name="by" required><br>
            Booking Date: <input type="date" name="date" required><br>
            <input type="submit" name="book" value="Book Equipment" class="btn">
        </form>
    </div>

    <div class="card">
        <h2>Current Equipment Status</h2>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM equipment");
        echo "<table><tr><th>Item</th><th>Booked By</th><th>Date</th><th>Status</th></tr>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>".$row['item_name']."</td><td>".$row['booked_by']."</td><td>".$row['booking_date']."</td><td>".$row['status']."</td></tr>";
        }
        echo "</table>";
        ?>
    </div>
</body>
</html>
