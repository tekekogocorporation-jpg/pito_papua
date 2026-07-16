<?php
// config/database.php

$host     = "localhost";
$username = "root";
$password = ""; // Sesuaikan jika MySQL Anda memiliki password
$database = "pito_papua";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("<div class='alert alert-danger m-3'>Koneksi database gagal: " . mysqli_connect_error() . "</div>");
}

mysqli_set_charset($conn, "utf8mb4");
?>