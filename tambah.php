<?php
    require "function/functions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Klien</title>
</head>
<body>
    <h1>Tambah Data Klien</h1>
    <form action="validasi.php" method="POST">
        <div>
            <span>Nama   : </span>
            <input type="text" name="nama_client" required>
        </div>
        <div>
            <span>Password   : </span>
            <input type="password" name="password" required>
        <div>
            <span>Alamat : </span>
            <input type="text" name="alamat_client" required>
        </div>
        <div>
            <span>Kontak : </span>
            <input type="text" name="kontak_client" required>
        </div>
        <button type="submit" value="Tambah Data">Submit</button>
    </form>
</body>
</html>