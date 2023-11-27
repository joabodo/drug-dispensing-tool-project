<?php
require_once("connect.php");
session_start();

// Checking if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Getting the form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user_type = $_POST['user_type'];

    // Using prepared statements to prevent SQL injection
    $sql = "SELECT * FROM $user_type WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Login Successful
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $row['username'];
        $_SESSION['user_type'] = $row['user_type'];

        // Redirect the user based on user type
        $redirect_url = $_SESSION['user_type'] . '.php?' . http_build_query(array('name' => $_SESSION['username']));
        header('Location: ' . $redirect_url);
        exit;
    } else {
        // Login Failed
        echo "Invalid username or password";
    }

    // Close prepared statement
    $stmt->close();
    $conn->close();
}
?>
