<?php
require_once 'db.config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = filteration($_POST);

    $email = $data['email'];
    $password = $data['password'];

    $query = "SELECT * FROM `users` WHERE `email` = ?";
    $values = [$email];
    $datatypes = "s";

    $result = select($query, $values, $datatypes);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            echo "<script>
                    alert('Login successful!');
                    window.location.href='index.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Invalid email or password.');
                    window.location.href='index.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('User not found.');
                window.location.href='index.php';
              </script>";
    }
}
?>