<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Foodie Express</title>
    <link rel="stylesheet" href="./styles/login.css">
</head>
<body>

    <div class="container">
        <h2>Login</h2>
        <form>
            <div class="input-box">
                <input type="email" placeholder="Email" required>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn">Login</button>
            <button class="btn" onclick="location.href='index.php?page=login'">Go Back</button>
        </form>
    </div>
</body>
</html>