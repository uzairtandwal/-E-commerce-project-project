<?php
session_start();

if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: add.php");
    exit;
}

if (isset($_POST['save_btn'])) {
    $p_name = $_POST['myname'];
    $p_pass = $_POST['mypass'];
    if ($p_name === 'admin' && $p_pass === '123') {
        $_SESSION['admin_logged_in'] = true;
        header("Location: index.php");
        exit;
    } else {
        $error_message = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background: radial-gradient(circle, #1a237e, #3949ab);
        color: white;
        animation: gradientAnimation 10s infinite alternate;
    }

    @keyframes gradientAnimation {
        0% {
            background: radial-gradient(circle, #1a237e, #3949ab);
        }

        50% {
            background: radial-gradient(circle, #2c387e, #3f51b5);
        }

        100% {
            background: radial-gradient(circle, #1a237e, #3949ab);
        }
    }

    .form-container {
        background-color: #ffffff;
        padding: 20px 30px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        max-width: 400px;
        width: 100%;
        text-align: center;
    }

    .form-container h1 {
        margin-bottom: 20px;
        font-size: 24px;
        color: #333333;
    }

    .form-container label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #555555;
        text-align: left;
    }

    .form-container input[type="text"],
    .form-container input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #cccccc;
        border-radius: 5px;
        font-size: 16px;
        box-sizing: border-box;
    }

    .form-container input[type="submit"] {
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 10px;
        font-size: 16px;
        cursor: pointer;
        width: 100%;
        margin-top: 10px;
    }

    .form-container input[type="submit"]:hover {
        background-color: #0056b3;
    }

    .error-message {
        color: red;
        margin-top: 10px;
        font-size: 14px;
    }
    </style>

</head>
<div class="form-container">
    <h1>Admin Login</h1>
    <form method="post" action="">
        <label for="myname">Username</label>
        <input type="text" id="myname" name="myname" placeholder="Enter your username" required>

        <label for="mypass">Password</label>
        <input type="password" id="mypass" name="mypass" placeholder="Enter your password" required>

        <input type="submit" name="save_btn" value="Login">
    </form>
    <?php if (isset($error_message)) : ?>
    <div class="error-message"><?= $error_message ?></div>
    <?php endif; ?>
</div>
</body>

</html>