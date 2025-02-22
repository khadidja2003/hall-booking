<?php
include 'db.php';
session_start();

if (!isset($_SESSION['UserID']) || $_SESSION['Role'] !== 'Admin') {
    header("Location: home.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #ff9966, #ff5e62);
            text-align: center;
            margin: 0;
            padding: 50px;
            color: white;
        }
        .container {
            max-width: 500px;
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 12px;
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            animation: fadeIn 1s ease-in-out;
        }
        .btn {
            display: block;
            padding: 12px;
            margin: 10px auto;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.3s ease-in-out;
            width: 200px;
        }
        .btn:hover { background: rgba(255, 255, 255, 0.4); transform: scale(1.05); }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

<div class="container">
    <h2>🔧 Admin Dashboard</h2>
    <a href="manage_reservations.php" class="btn">📋 Manage Reservations</a>
    <a href="logout.php" class="btn">🚪 Logout</a>
</div>

</body>
</html>
