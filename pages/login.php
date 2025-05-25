<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Login</title>
</head>

<body>

    <div class="login-container">

        <h2>Login</h2>

        <form action="../php/login_user.php" method="post">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Type your email" required>

            <label for="password">Password: </label>
            <input type="password" id="password" name="password" placeholder="Type your password" required>

            <button type="submit">Enter</button>

            <ul>
                <li><a href="../pages/register.php">Register</a></li>
            </ul>

        </form>
    </div>
</body>

</html>