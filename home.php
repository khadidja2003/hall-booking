<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Room Reservation System</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #00416A, #E4E5E6);
            text-align: center;
            margin: 0;
            padding: 50px;
            color: white;
        }
        .container {
            max-width: 500px;
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 12px;
            backdrop-filter: blur(15px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            animation: fadeIn 1s ease-in-out;
        }
        h1 { font-size: 28px; font-weight: bold; }
        p { font-size: 18px; margin-bottom: 20px; }
        .btn {
            display: block;
            padding: 12px 20px;
            margin: 10px auto;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.3s ease-in-out;
            width: 220px;
        }
        .btn:hover {
            background: rgba(255, 255, 255, 0.4);
            transform: scale(1.05);
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

<div class="container">
    <h1>📌 Room Reservation System</h1>
    <p>Book and manage rooms efficiently.</p>
    <a href="login.php" class="btn">🔑 Login</a>
    <a href="register.php" class="btn">📝 Register</a>
</div>

</body>
</html>
