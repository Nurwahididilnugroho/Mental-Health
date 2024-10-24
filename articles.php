<?php
include 'db.php';

$sql = "SELECT * FROM Artikel";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikels</title>
    <style>
    /* Reset default styling */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #f0f4f8;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    height: 100vh;
}

h1 {
    color: #343a40;
    font-size: 36px;
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
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s ease;
}

li:hover {
    transform: translateY(-5px);
}

li a {
    text-decoration: none;
    font-size: 18px;
    font-weight: bold;
    color: #E2F1E7;
    transition: color 0.3s ease;
}

li a:hover {
    color: #0056b3;
}

a {
    margin-top: 20px;
    padding: 10px 20px;
    background-color: #28a745;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

a:hover {
    background-color: #218838;
}

</style>
</head>
<body>
        <h1>Artikel Kesehatan Mental</h1>
    <ul>
    <?php while ($row = $result->fetch_assoc()): ?>
        <li>
            <a href="article_detail.php?id=<?php echo $row['ID_Artikel']; ?>">
                <?php echo $row['Judul']; ?>
            </a>
        </li>
    <?php endwhile; ?>
    </ul>
    <a href="dashboard.php">Kembali ke Dashboard</a>
</body>
</html>