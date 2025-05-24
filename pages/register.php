<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Register</title>
</head>

<body>
    <div class="register-container">

        <h2>Register</h2>

        <form method="post" action="../php/register_user.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Type your username" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Type your email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Type your best password" required>

            <button type="submit">Register</button>
        </form>

        <ul>
            <li><a href="../pages/login.php">Login</a></li>
        </ul>


    </div>
</body>

</html>