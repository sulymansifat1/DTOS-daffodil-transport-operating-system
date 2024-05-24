<?php
require('./admin/inc/db_config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = filteration($_POST);

    $email = $data['email'];
    $password = password_hash($data['password'], PASSWORD_DEFAULT);
    $fullname = $data['fullname'];
    $phone = $data['phone'];

    $query = "INSERT INTO `users`(`email`, `password`, `fullname`, `phone`) VALUES (?, ?, ?, ?)";
    $values = [$email, $password, $fullname, $phone];
    $datatypes = "ssss";

    if (insert($query, $values, $datatypes)) {
        echo "<script>
                alert('Registration successful! Please log in.');
                window.location.href='index.php';
              </script>";
    } else {
        echo "<script>
                alert('Registration failed. Please try again.');
                window.location.href='index.php';
              </script>";
    }
}
?>