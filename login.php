<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode_user = $_POST['kode_user'];
    $username  = $_POST['username'];
    $password  = $_POST['password']; 

    $sql = "INSERT INTO login (kd_user, username, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $kode_user, $username, $password);

    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil disimpan');</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-box">
        <h2>LOGIN</h2>
        <form method="POST">
            <input type="text" name="kode_user" placeholder="Masukan Kode User Anda" required><br>
            <input type="text" name="username" placeholder="Masukan Username" required><br>
            <input type="password" name="password" placeholder="Masukan Password" required><br>
            <button type="submit">LOGIN</button>
        </form>
    </div>
</body>
</html>