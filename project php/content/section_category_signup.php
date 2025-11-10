<?php
$valores = array(
    'nombre' => "",
    'email' => "",
    'telefono' => "",
    'birth_date' => "",
    'username' => "",
    'password' => "",
    'address' => ""
);




if (isset($_POST['submit'])) {
    require_once "dao/include_mysql.php";
    require_once "dao/include_vars.php";

    $valores['nombre'] = $_POST['nombre'];
    $valores['email'] = $_POST['email'];
    $valores['telefono'] = $_POST['telefono'];
    $valores['birth_date'] = $_POST['birth_date'];
    $valores['username'] = $_POST['username'];
    $valores['password'] = $_POST['password'];
    $valores['address'] = $_POST['address'];

    echo $valores['nombre'];
    echo $valores['email'];
    echo $valores['telefono'];
    echo $valores['birth_date'];
    echo $valores['username'];
    echo $valores['password'];
    echo $valores['address'];


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
    VALUES ('".$_POST["nombre"]."','".$_POST["email"]."','".$_POST["telefono"]."','".$_POST["birth_date"]."','".$_POST["username"]."','".hash('sha256',$_POST["password"])."','".$_POST["address"]."')";
    sqlQuery($sqlBD, $sql);

    sqlFinTrans($sqlBD);
} else {
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Foodie Express</title>
    <link rel="stylesheet" href="./styles/signup.css">
</head>

<body>

    <div class="container">
        <h2>Sign Up</h2>
        <form method="post">
            <!-- Basic Details -->
            <div class="input-box">
                <label>Full Name</label>
                <input type="text" name="nombre" placeholder="Enter your name" required>
            </div>
            <div class="input-box">
                <label>Email</label>
                <input type="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="input-box">
                <label>Phone Number</label>
                <input type="tel" name="telefono" placeholder="Enter your phone number" required>
            </div>
            <div class="input-box">
                <label>Date of Birth</label>
                <input type="date" name="birth_date" required>
            </div>

            <!-- Login Details -->
            <div class="input-box">
                <label>Username</label>
                <input type="text" name="username" placeholder="Choose a username" required>
            </div>
            <div class="input-box">
                <label>Password</label>
                <input type="password" id="password" name="password" placeholder="Enter password" required>
            </div>
            <div class="input-box">
                <label>Confirm Password</label>
                <input type="password" placeholder="Confirm password" onchange="checkPassword(this)" required>
            </div>

            <!-- Delivery Details -->
            <div class="input-box">
                <label>Address</label>
                <textarea placeholder="Enter your full address" rows="3" name="address" required></textarea>
            </div>

            <button type="submit" class="btn" name="submit" onclick="register()">Sign Up</button>

        </form>
        <button class="btn" onclick=getBack()>Go Back</button>
    </div>
    <script>
        function register() {
        //    event.preventDefault();
        }

        function checkPassword(field) {
            var password = document.getElementById("password");
            if (field.value != password.value) {
                field.setCustomValidity('Passwords dont match');
                field.reportValidity();
                field.focus();
            }
        }

        // function checkTel(field) {
        //     var re = /([\+][0-9]{2,3})?[0-9]{9}/
        //     if (!re.test(field.value)) {
        //         field.setCustomValidity('Incorrect phone number');
        //         field.reportValidity();
        //         field.focus();
        //     }
        // }

        function getBack() {
            var inputs = document.querySelectorAll('input');
            for (let i = 0; i < inputs.length; i++) {
                inputs[i].required = false;
            }
            document.querySelector("textarea").required = false;
            location.href = "index.php?page=home"
        }
    </script>
</body>

</html>