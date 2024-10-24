<?php
$servername = "localhost"; // Ubah jika perlu
$username = "root"; // Ubah jika perlu
$password = ""; // Ubah jika perlu
$dbname = "mental_wellness_tracker";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
