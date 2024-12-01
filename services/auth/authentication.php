<?php
session_start();
require_once '../../database/connection.php';

// Ensure the request is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? null;
    $password = $_POST['password'] ?? null;

    if ($username && $password) {
        $stmt = $conn->prepare("SELECT * FROM `administrator` WHERE email = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && $user['password'] == $password) {
            $_SESSION['adminID'] = $user['adminID'];
            $_SESSION['name'] = $user['firstname'] . ' ' . $user['firstname'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['profile_picture'] = $user['profile_picture'];

            echo json_encode([
                "status" => "success",
                "message" => "Login successful",
            ]);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Invalid username or password"
            ]);
        }

        $stmt->close();
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Username and password are required"
        ]);
    }

    $conn->close();
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Unauthorized access"
    ]);
}
