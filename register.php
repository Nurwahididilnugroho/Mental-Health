<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Menghash password

    $sql = "INSERT INTO Pengguna (Nama, Email, Password) VALUES ('$nama', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registrasi berhasil. Silakan <a href='login.php'>login</a>.";
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
    <title>Registrasi</title>
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
    /* display: flex; */
    justify-content: center;
    align-items: center;
    margin:auto;
    margin-top:50px;
}

form {
    background-color: #ffffff;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    max-width: 450px;
    width: 100%;
    margin:auto;
}

form input[type="text"], 
form input[type="email"], 
form input[type="password"] {
    width: calc(100% - 20px);
    padding: 12px;
    margin: 12px 0;
    border-radius: 5px;
    border: 1px solid #ced4da;
    font-size: 16px;
    transition: border-color 0.3s ease;
}

form input[type="text"]:focus, 
form input[type="email"]:focus, 
form input[type="password"]:focus {
    border-color: #28a745;
    outline: none;
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

/* Add some spacing and style to the labels */
form label {
    font-size: 14px;
    font-weight: bold;
    margin-top: 12px;
    display: block;
    color: #495057;
}

a {
    color: #007bff;
    text-decoration: none;
    font-weight: bold;
}

a:hover {
    text-decoration: underline;
}

</style>
</head>
<body>
    <form method="post">
    Nama: <input type="text" name="nama" required>
    Email: <input type="email" name="email" required>
    Password: <input type="password" name="password" required>
    <input type="submit" value="Daftar">
    <br>
    <br>
    <a href="login.php">Login</a>

</form>

</body>
</html>