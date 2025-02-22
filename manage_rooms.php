<?php
include 'db.php';

// Ensure only Admin can access
if (!isset($_SESSION['UserID']) || $_SESSION['Role'] !== 'Admin') {
    header("Location: home.php");
    exit;
}

// Handle adding new room
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_room'])) {
    $roomName = $_POST['roomName'];
    $capacity = $_POST['capacity'];
    $location = $_POST['location'];
    $type = $_POST['type'];

    $stmt = $conn->prepare("INSERT INTO Rooms (RoomName, Capacity, Location, Type) VALUES (?, ?, ?, ?)");
    $stmt->execute([$roomName, $capacity, $location, $type]);

    header("Location: manage_rooms.php");
    exit;
}

// Fetch rooms
$stmt = $conn->query("SELECT * FROM Rooms");
$rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Rooms</title>
</head>
<body>
    <div class="container">
        <h2>🏠 Manage Rooms</h2>

        <form method="POST" action="">
            <input type="text" name="roomName" placeholder="Room Name" required>
            <input type="number" name="capacity" placeholder="Capacity" required>
            <input type="text" name="location" placeholder="Location" required>
            <select name="type" required>
                <option value="TP">TP</option>
                <option value="TD">TD</option>
                <option value="Amphi">Amphi</option>
            </select>
            <button type="submit" name="add_room">Add Room</button>
        </form>

        <h3>Existing Rooms</h3>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Room Name</th>
                    <th>Capacity</th>
                    <th>Location</th>
                    <th>Type</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rooms as $room): ?>
                    <tr>
                        <td><?= $room['RoomID'] ?></td>
                        <td><?= $room['RoomName'] ?></td>
                        <td><?= $room['Capacity'] ?></td>
                        <td><?= $room['Location'] ?></td>
                        <td><?= $room['Type'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href="admin_dashboard.php">🔙 Back</a>
    </div>
</body>
</html>
