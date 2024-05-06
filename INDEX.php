<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Website</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('img/img.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #fff;
            text-align: center;
        }
        nav {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 100px;
            width: 100%;
            position: fixed;
            top: 0;
            z-index: 1000;
            display: flex;
            justify-content: center;
        }
        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        nav a:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }
        .welcome-message {
            font-size: 24px;
            margin-bottom: 20px;
        }
        footer {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            width: 100%;
            position: fixed;
            bottom: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        footer p {
            color: #fff;
            margin: 0 10px;
        }
    </style>
</head>
<body>
    <nav>
        <a href="INDEX.php">Home</a>
        <a href="login.php">Login</a>
        <a href="Signup.php">Signup</a>
    </nav>
    <div class="welcome-message">
        <h1>Welcome to Univen room allocation</h1>
        <p>We are delighted to have you here!</p>
    </div>
    <footer>
        <p>About Us: Learn more about our mission and services.</p>
        <p>Contact: For inquiries, please email us at info@Singo.com</p>
    </footer>
</body>
</html>
