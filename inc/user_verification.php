<?php
require_once 'essentials.php';

session_start();

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} else {
    echo "<script>
            window.location.href='index.php';
          </script>";
    exit;
}

?>