<?php
session_start();
include 'db.php';

if (!isset($_SESSION['ID_Pengguna'])) {
    header("Location: login.php");
    exit();
}

$userId = $_SESSION['ID_Pengguna'];

// Menampilkan catatan suasana hati
$sql = "SELECT * FROM Catatan_Suasana_Hati WHERE ID_Pengguna='$userId'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
    /* Reset default styling */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #e9ecef;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

h1 {
    color: #343a40;
    font-size: 36px;
    margin-bottom: 20px;
}

h2 {
    color: #495057;
    font-size: 28px;
    margin-top: 20px;
    margin-bottom: 15px;
}

ul {
    list-style-type: none;
    padding: 0;
}

li {
    background-color: #ffffff;
    margin: 10px 0;
    padding: 15px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    font-size: 18px;
    color: #333;
}

a {
    display: inline-block;
    margin: 10px 10px;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
    font-weight: bold;
}

a:hover {
    background-color: #0056b3;
}

a.logout {
    background-color: #dc3545;
}

a.logout:hover {
    background-color: #c82333;
}

.container {
    background-color: #ffffff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    width: 80%;
    max-width: 700px;
    text-align: center;
}

</style>
</head>
<body>
    <div class="container">
        <h1>Selamat datang!</h1>
        <a href="add_mood.php">Tambah Catatan Suasana Hati</a>
        <a href="articles.php">Baca Artikel</a>
    </div>
    <br>
    <div class="container">
        <h2>Catatan Suasana Hati Anda:</h2>
        <ul>
        <?php while ($row = $result->fetch_assoc()): ?>
            <li><?php echo $row['Tanggal'] . ": " . $row['Suasana_Hati'] . " - " . $row['Catatan']; ?></li>
        <?php endwhile; ?>
        </ul>
    </div>
<a href="logout.php">Logout</a>
<a href="view_saran.php">Lihat Saran Anda</a>
</body>
</html>



