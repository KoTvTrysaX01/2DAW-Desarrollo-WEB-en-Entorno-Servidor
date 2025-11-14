<?php
if (isset($_POST['signup'])) {
    require_once "dao/include_mysql.php";
    require_once "dao/include_vars.php";


    $sqlBD = sqlConecta($hostSql, $userSql, $passSql, $basedatosSql);
    sqlIniTrans($sqlBD);

    // Don't work. I hate it so much
    // sqlQuery($sqlBD, "INSERT INTO users(nombre,email,telefono,birth_date,username,password,address) 
    //     VALUES (" . "{$valores['nombre']}, " . "{$valores['email']}, " . "{$valores['telefono']}, " . "{$valores['birth_date']}, " . "{$valores['username']}, " . "{$valores['password']}, " . "{$valores['address']}" . ")");

    // sqlQuery($sqlBD, "INSERT INTO users(nombre,email,telefono,birth_date,username,password,address) 
    // 							VALUES ('adminsys', 'adminsys', 'adminsys', 'adminsys', 'adminsys', 'adminsys', 'adminsys')");

    // sqlQuery($sqlBD, "INSERT INTO users(nombre,email,telefono,birth_date,username,password,address)" . "VALUES (" .
    // "{$valores['nombre']}, {$valores['email']}, {$valores['telefono']}, {$valores['birth_date']}, {$valores['username']}, {$valores['password']}, {$valores['address']}" . ")");


    // Works
    $sql = "INSERT INTO users (nombre,email,telefono,birth_date,username,password,address)
    VALUES ('" . $_POST["nombre"] . "','" . $_POST["email"] . "','" . $_POST["telefono"] . "','" . $_POST["birth_date"] . "','" . $_POST["username"] . "','" . hash('sha256', $_POST["password"]) . "','" . $_POST["address"] . "')";
    sqlQuery($sqlBD, $sql);

    sqlFinTrans($sqlBD);

    header('Location: ' . "logs.php?category=login");
} else {
    // echo "error";
}


?>
<div class="cont-2">
    <div class="container">
        <h1>Sign Up</h1>
        <form method="post">
            <!-- Basic Details -->
            <div class="input-box signup">
                <label>Full Name</label>
                <input type="text" name="nombre" placeholder="Enter your name">
            </div>
            <div class="input-box signup">
                <label>Email</label>
                <input type="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="input-box signup">
                <label>Phone Number</label>
                <input type="tel" name="telefono" placeholder="Enter your phone number">
            </div>
            <div class="input-box signup">
                <label>Date of Birth</label>
                <input type="date" name="birth_date">
            </div>

            <div class="input-box signup">
                <label>Username</label>
                <input type="text" name="username" placeholder="Choose a username" required>
            </div>
            <div class="input-box signup">
                <label>Password</label>
                <input type="password" id="password" name="password" placeholder="Enter password" required>
            </div>
            <div class="input-box signup">
                <label>Confirm Password</label>
                <input type="password" placeholder="Confirm password" onchange="checkPassword(this)" required>
            </div>

            <!-- Delivery Details -->
            <div class="input-box signup">
                <label>Address</label>
                <textarea placeholder="Enter your full address" rows="3" maxlength="100" name="address"></textarea>
            </div>

            <button type="submit" class="btn" name="signup">Sign Up</button>

        </form>
        <button class="btn" onclick="location.href='logs.php'">Go Back</button>
    </div>
</div>