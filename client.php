<?php
    require "function/functions.php";
    $client = pg_query('SELECT * FROM "user"');
    $data= [];
    while($row = pg_fetch_assoc($client)){
        $data[] = $row;
    }
    var_dump($data)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN ADMIN</title>
</head>
<body>
    <a href="registrasi.php">Registrasi</a>
    <a href="login.php">Login</a>
    <h1>Daftar Client</h1>

    <table id='Client' border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Nomor</th>
            <th>Client</th>
            <th>Password</th>
            <th>Alamat</th>
            <th>Kontak</th>
            <th>Aksi</th>
        </tr>
        <?php
            $i =1;
            foreach($client as $row){
        ?>
            <tr>
                <td><?=$i?></td>
                <td><?=$row["nama_client"]?></td>
                <td><?=$row["password"]?></td>
                <td><?=$row["alamat_client"]?></td>
                <td><?=$row["kontak_client"]?></td>
                <td>
                    <button><a href ="ubah.php?id_client=<?= $row["id_client"]; ?>">Ubah</a></button>  |
                    <button><a href ="hapus.php?id_client=<?= $row["id_client"]; ?>">Hapus</a></button>
                </td>
            </tr>
        <?php
            $i++;
            }
        ?>
    </table>
    <br><br>
    <button><a href ="tambah.php">Tambah data klien</a></button>
</body>
</html>