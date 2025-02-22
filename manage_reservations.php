<?php
include 'db.php';
session_start();

if (!isset($_SESSION['UserID']) || $_SESSION['Role'] !== 'Admin') {
    header("Location: index.php");
    exit;
}

$stmt = $conn->query("SELECT r.ReservationID, u.Username, rm.RoomName, r.ReservationDate, r.SessionID, r.Status FROM Reservations r JOIN Users u ON r.UserID = u.UserID JOIN Rooms rm ON r.RoomID = rm.RoomID ORDER BY r.ReservationDate DESC");
$reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Reservations</title>
</head>
<body>
    <h2>Manage Reservations</h2>
    <table border="1">
        <tr>
            <th>Teacher</th>
            <th>Room</th>
            <th>Date</th>
            <th>Session</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php foreach ($reservations as $res): ?>
        <tr>
            <td><?= $res['Username'] ?></td>
            <td><?= $res['RoomName'] ?></td>
            <td><?= $res['ReservationDate'] ?></td>
            <td><?= $res['SessionID'] ?></td>
            <td><?= $res['Status'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <a href="admin_dashboard.php">Back</a>
</body>
</html>
