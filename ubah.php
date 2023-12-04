<?php
    require "function/functions.php";

    // ambil data di URL
    $id = $_GET["id_client"];

    // query data mahasiswa berdasarkan id
    $client = query("SELECT * FROM client WHERE id_client = $id")[0];
    
    //cek apakah tombol submit sudah ditekan atau belum
    if (isset($_POST["submit"])){
        if (ubah($_POST) > 0){
            echo "
            <script>
                alert('Data berhasil diubah');
                document.location.href = 'index.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Data gagal diubah');
                document.location.href = 'index.php';
            </script>
            ";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Klien</title>
</head>
<body>
    <h1>Ubah Data Klien</h1>
    <form action="" method="POST">
        <input type="hidden" name="id_client" value="<?= $client["id_client"]; ?>">
        
        <div>
            <span for="nama_client">Nama   : </span>
            <input type="text" name="nama_client" required value ="<?= $client["nama_client"]; ?>">
        </div>
        <div>
            <span for="password">Nama   : </span>
            <input type="password" name="password" required value ="<?= $client["password"]; ?>">
        </div>
        <div>
            <span for="alamat_client">Alamat : </span>
            <input type="text" name="alamat_client" required value ="<?= $client["alamat_client"]; ?>">
        </div>
        <div>
            <span for="kontak_client">Kontak : </span>
            <input type="text" name="kontak_client" required value ="<?= $client["kontak_client"]; ?>">
        </div>
        <button type="submit" name="submit" value="Tambah Data">Submit</button>
    </form>
</body>
</html>