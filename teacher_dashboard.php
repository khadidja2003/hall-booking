<?php
include 'db.php';
session_start();

if (!isset($_SESSION['UserID']) || $_SESSION['Role'] !== 'Teacher') {
    header("Location: index.php");
    exit;
}

$stmt = $conn->prepare("SELECT r.ReservationID, rm.RoomName, r.ReservationDate, r.SessionID, COALESCE(r.Status, 'Pending') AS Status FROM Reservations r JOIN Rooms rm ON r.RoomID = rm.RoomID WHERE r.UserID = ? ORDER BY r.ReservationDate DESC");
$stmt->execute([$_SESSION['UserID']]);
$reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Teacher Dashboard</title>
</head>
<body>
    <h2>Teacher Dashboard</h2>
    <table border="1">
        <tr>
            <th>Room</th>
            <th>Date</th>
            <th>Session</th>
            <th>Status</th>
        </tr>
        <?php foreach ($reservations as $res): ?>
        <tr>
            <td><?= $res['RoomName'] ?></td>
            <td><?= $res['ReservationDate'] ?></td>
            <td><?= $res['SessionID'] ?></td>
            <td><?= $res['Status'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <a href="logout.php">Logout</a>
</body>
</html>
