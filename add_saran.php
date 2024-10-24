<?php
session_start();
include 'db.php';

if (!isset($_SESSION['ID_Pengguna'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = $_SESSION['ID_Pengguna'];
    $tanggal = $_POST['tanggal'];
    $deskripsi = $_POST['deskripsi'];

    $sql = "INSERT INTO Saran (ID_Pengguna, Tanggal, Deskripsi) VALUES ('$userId', '$tanggal', '$deskripsi')";

    if ($conn->query($sql) === TRUE) {
        echo "Saran berhasil ditambahkan.";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambahkan Saran</title>
    <style>
    /* Reset default styling */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #f1f3f6;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    height: 100vh;
}

h1 {
    color: #333;
    font-size: 36px;
    margin-bottom: 20px;
    text-align: center;
}

form {
    background-color: #ffffff;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    width: 90%;
    max-width: 500px;
}

form input[type="date"],
form textarea {
    width: calc(100% - 20px);
    padding: 12px;
    margin: 10px 0;
    border-radius: 5px;
    border: 1px solid #ced4da;
    font-size: 16px;
    transition: border-color 0.3s ease;
}

form input[type="date"]:focus,
form textarea:focus {
    border-color: #007bff;
    outline: none;
}

form textarea {
    height: 150px;
    resize: none;
}

form input[type="submit"] {
    width: 100%;
    background-color: #28a745;
    color: white;
    padding: 12px;
    border: none;
    border-radius: 5px;
    font-size: 18px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

form input[type="submit"]:hover {
    background-color: #218838;
}

a {
    display: inline-block;
    margin-top: 15px;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

a:hover {
    background-color: #0056b3;
}

label {
    font-size: 14px;
    font-weight: bold;
    margin-top: 10px;
    display: block;
    color: #495057;
}

</style>
</head>
<body>
<h1>Tambah Saran Baru</h1>
<form method="post">
    Tanggal: <input type="date" name="tanggal" required>
    Deskripsi: <textarea name="deskripsi" required></textarea>
    <input type="submit" value="Tambah Saran">
</form>
<a href="dashboard.php">Kembali ke Dashboard</a>
</body>
</html>