<?php

session_start();

if (!isset($_SESSION["login"])) {
    echo "<script>
            alert('Login terlebih dahulu');
            document.location.href = 'login.php';
            </script>";
    exit;
}
echo "hello";
$_SESSION = [];

session_unset();

header("Location: login.php");

?>