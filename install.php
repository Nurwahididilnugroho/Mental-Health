<?php
$servername = "localhost"; // Ubah jika perlu
$username = "root"; // Ubah jika perlu
$password = ""; // Ubah jika perlu
$dbname = "mental_wellness_tracker";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, );

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Membuat database jika belum ada
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
$conn->query($sql);

// Menggunakan database
$conn->select_db($dbname);

// Membuat tabel Pengguna
$sql = "CREATE TABLE IF NOT EXISTS Pengguna (
    ID_Pengguna INT(11) AUTO_INCREMENT PRIMARY KEY,
    Nama VARCHAR(100) NOT NULL,
    Email VARCHAR(100) NOT NULL UNIQUE,
    Password VARCHAR(255) NOT NULL
)";

$conn->query($sql);

// Membuat tabel Catatan Suasana Hati
$sql = "CREATE TABLE IF NOT EXISTS Catatan_Suasana_Hati (
    ID_Catatan INT(11) AUTO_INCREMENT PRIMARY KEY,
    ID_Pengguna INT(11) NOT NULL,
    Tanggal DATE NOT NULL,
    Suasana_Hati ENUM('Bahagia', 'Sedih', 'Cemas', 'Stres', 'Tenang') NOT NULL,
    Catatan TEXT,
    FOREIGN KEY (ID_Pengguna) REFERENCES Pengguna(ID_Pengguna)
)";

$conn->query($sql);

// Membuat tabel Artikel
$sql = "CREATE TABLE IF NOT EXISTS Artikel (
    ID_Artikel INT(11) AUTO_INCREMENT PRIMARY KEY,
    Judul VARCHAR(255) NOT NULL,
    Konten TEXT NOT NULL,
    Tanggal_Terbit DATE NOT NULL
)";

$conn->query($sql);

// Membuat tabel Saran
$sql = "CREATE TABLE IF NOT EXISTS Saran (
    ID_Saran INT(11) AUTO_INCREMENT PRIMARY KEY,
    ID_Pengguna INT(11) NOT NULL,
    Tanggal DATE NOT NULL,
    Deskripsi TEXT NOT NULL,
    FOREIGN KEY (ID_Pengguna) REFERENCES Pengguna(ID_Pengguna)
)";

$conn->query($sql);

echo "Database dan tabel telah dibuat.";

$conn->close();
?>
