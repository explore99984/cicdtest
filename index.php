<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Signup Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        .container h2 {
            margin-bottom: 20px;
            font-size: 24px;
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group input:focus {
            outline: none;
            border-color: #007bff;
        }

        .button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .container p {
            text-align: center;
            margin-top: 10px;
        }

        .container p a {
            color: #007bff;
            text-decoration: none;
        }

        .container p a:hover {
            text-decoration: underline;
        }

        .message {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="login_username">Username</label>
                <input type="text" id="login_username" name="login_username" required>
            </div>
            <div class="form-group">
                <label for="login_password">Password</label>
                <input type="password" id="login_password" name="login_password" required>
            </div>
            <button type="submit" class="button" name="login">Login</button>
        </form>
        <p>Don't have an account? <a href="#" id="showSignup">Sign up</a></p>
    </div>

    <div class="container" style="display:none;" id="signupContainer">
        <h2>Sign Up</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="signup_username">Username</label>
                <input type="text" id="signup_username" name="signup_username" required>
            </div>
            <div class="form-group">
                <label for="signup_password">Password</label>
                <input type="password" id="signup_password" name="signup_password" required>
            </div>
            <button type="submit" class="button" name="signup">Sign Up</button>
        </form>
        <p>Already have an account? <a href="#" id="showLogin">Login</a></p>
    </div>

    <?php
    // Simple user data for demonstration purposes
    $users = [
        'user1' => 'password1',
        'user2' => 'password2'
    ];

    // Handle login
    if (isset($_POST['login'])) {
        $username = $_POST['login_username'];
        $password = $_POST['login_password'];

        if (isset($users[$username]) && $users[$username] == $password) {
            echo "<p class='message' style='color:green;'>Login successful! Welcome, $username.</p>";
        } else {
            echo "<p class='message' style='color:red;'>Invalid username or password.</p>";
        }
    }

    // Handle signup
    if (isset($_POST['signup'])) {
        $new_username = $_POST['signup_username'];
        $new_password = $_POST['signup_password'];

        if (!isset($users[$new_username])) {
            $users[$new_username] = $new_password;
            echo "<p class='message' style='color:green;'>Signup successful! Please login.</p>";
        } else {
            echo "<p class='message' style='color:red;'>Username already taken. Please choose another.</p>";
        }
    }
    ?>

    <script>
        document.getElementById('showSignup').addEventListener('click', function() {
            document.querySelector('.container').style.display = 'none';
            document.getElementById('signupContainer').style.display = 'block';
        });

        document.getElementById('showLogin').addEventListener('click', function() {
            document.getElementById('signupContainer').style.display = 'none';
            document.querySelector('.container').style.display = 'block';
        });
    </script>
</body>
</html>

