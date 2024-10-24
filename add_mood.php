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
    $suasana_hati = $_POST['suasana_hati'];
    $catatan = $_POST['catatan'];

    $sql = "INSERT INTO Catatan_Suasana_Hati (ID_Pengguna, Tanggal, Suasana_Hati, Catatan) VALUES ('$userId', '$tanggal', '$suasana_hati', '$catatan')";

    if ($conn->query($sql) === TRUE) {
        echo "Catatan suasana hati berhasil ditambahkan.";
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
    <title>Tambah Mood</title>
    <style>
    /* Reset default styling */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #f7f9fc;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

form {
    background-color: #ffffff;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    max-width: 500px;
    width: 100%;
    margin:auto;
    margin-top:30px;
}

form input[type="date"],
form select,
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
form select:focus,
form textarea:focus {
    border-color: #007bff;
    outline: none;
}

form textarea {
    height: 100px;
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

/* Add some spacing and style to the labels */
form label {
    font-size: 14px;
    font-weight: bold;
    margin-top: 10px;
    display: block;
    color: #495057;
}

</style>
</head>
<body>
    <form method="post">
    Tanggal: <input type="date" name="tanggal" required>
    Suasana Hati:
    <select name="suasana_hati" required>
        <option value="Bahagia">Bahagia</option>
        <option value="Sedih">Sedih</option>
        <option value="Cemas">Cemas</option>
        <option value="Stres">Stres</option>
        <option value="Tenang">Tenang</option>
    </select>
    Catatan: <textarea name="catatan"></textarea>
    <input type="submit" value="Tambah Catatan">
<a href="dashboard.php">Kembali ke Dashboard</a>

</form>
</body>
</html>