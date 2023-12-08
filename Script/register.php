<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="form.css">
</head>
<body>

<form action="register.php" method="post">
 <div class="container">
    <h2>Sign Up</h2>
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
    
    <button type="submit" name="submit">Sign Up</button>
    <p>Sudah punya Akun?<a href="form login.html">Log in</a></p>
 </div>
</form>
</body>
</html>
<?php
$servername = "localhost";
$username = "your_username";
$password = "";
$dbname = "pinjol_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$uname = $_POST['uname'];
$psw = $_POST['psw'];
$email = $_POST['email'];

$sql = "INSERT INTO user_akun (username, password, email,)
VALUES ('$uname', '$psw', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("home.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>