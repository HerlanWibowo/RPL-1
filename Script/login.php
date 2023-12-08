<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "pinjol_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
}

// Get the data from the form
$uname = $_POST['uname'];
$psw = $_POST['psw'];

// Use a prepared statement to avoid SQL injection
$stmt = $conn->prepare("SELECT * FROM user_akun WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $uname, $psw);
$stmt->execute();

// Store the result
$result = $stmt->get_result();

// Check if a row was found
if ($result->num_rows > 0) {
 // If a row was found, the user has been logged in successfully
 // Redirect to the home page or another page as needed
 header("Location: home.html");
} else {
 // If no row was found, the user has entered incorrect credentials
 // Display an error message
 echo "Incorrect username or password. Please try again.";
}

// Close the statement and the connection
$stmt->close();
$conn->close();
?>