<?php
if (isset($_POST['signup'])) {
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
    $sql = "INSERT INTO users (email,username,password,isAdmin)
    VALUES ('" . $_POST["email"] . "','" . $_POST["username"] . "','" . password_hash($_POST["password"], PASSWORD_DEFAULT) . "','" . false . "')";
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
                <label>Email</label>
                <input type="email" name="email" placeholder="Enter your email" required>
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

            <button type="submit" class="btn" name="signup">Sign Up</button>

        </form>
        <button class="btn" onclick="location.href='logs.php'">Go Back</button>
    </div>
</div>