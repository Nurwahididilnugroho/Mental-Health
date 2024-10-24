<?php
include 'db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM Artikel WHERE ID_Artikel='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel</title>
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
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    padding: 20px;
    min-height: 100vh;
}

h1 {
    color: #333;
    font-size: 40px;
    margin-bottom: 20px;
    text-align: center;
    line-height: 1.4;
}

p {
    color: #495057;
    font-size: 18px;
    line-height: 1.8;
    text-align: justify;
    max-width: 800px;
    margin-bottom: 30px;
}

a {
    background-color: #007bff;
    color: white;
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 5px;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

a:hover {
    background-color: #0056b3;
}

.container {
    background-color: white;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    max-width: 900px;
    width: 100%;
    text-align: center;
}

</style>
</head>
<body>
    <h1><?php echo $row['Judul']; ?></h1>
<p><?php echo $row['Konten']; ?></p>
<a href="articles.php">Kembali ke Daftar Artikel</a>
</body>
</html>