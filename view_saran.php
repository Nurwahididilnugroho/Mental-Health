<?php
session_start();
include 'db.php';

if (!isset($_SESSION['ID_Pengguna'])) {
    header("Location: login.php");
    exit();
}

$userId = $_SESSION['ID_Pengguna'];

// Menampilkan saran untuk pengguna
$sql = "SELECT * FROM Saran WHERE ID_Pengguna='$userId' ORDER BY Tanggal DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Saran</title>
    <style>
    /* Reset default styling */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #f9fafc;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    min-height: 100vh;
}

h1 {
    color: #343a40;
    font-size: 34px;
    margin-bottom: 20px;
    text-align: center;
}

ul {
    list-style-type: none;
    padding: 0;
    width: 80%;
    max-width: 800px;
}

li {
    background-color: #ffffff;
    margin: 10px 0;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    font-size: 16px;
    color: #495057;
    transition: transform 0.2s ease;
}

li:hover {
    transform: translateY(-5px);
}

a {
    margin: 10px;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    transition: background-color 0.3s ease;
    display: inline-block;
}

a:hover {
    background-color: #0056b3;
}

a.dashboard {
    background-color: #28a745;
}

a.dashboard:hover {
    background-color: #218838;
}

.container {
    background-color: #ffffff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    width: 90%;
    max-width: 800px;
    text-align: center;
}

</style>
</head>
<body>
    <h1>Daftar Saran Anda</h1>
<ul>
<?php if ($result->num_rows > 0): ?>
    <?php while ($row = $result->fetch_assoc()): ?>
        <li><?php echo $row['Tanggal'] . ": " . $row['Deskripsi']; ?></li>
    <?php endwhile; ?>
<?php else: ?>
    <li>Tidak ada saran yang tersedia.</li>
<?php endif; ?>
</ul>

<a href="dashboard.php">Kembali ke Dashboard</a>
<a href="add_saran.php">Saran kepada diri sendiri</a>
</body>
</html>