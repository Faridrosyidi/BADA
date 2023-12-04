<?php
    require "function/functions.php";
    
    $nama = $_POST["nama_client"];
    $password = $_POST["password"];
    $alamat = $_POST["alamat_client"];
    $kontak = $_POST["kontak_client"];

    $hasil = pg_query($connection, "SELECT * FROM client");
    
    if(!$hasil){
        echo "ERROR : Gagal mengambil data client";
        exit;
    }

    while($nama1 = pg_fetch_assoc($hasil)){
        if($nama == $nama1['nama_client']){
            echo 'Nama Sudah Ada';
            exit;
        }
    }

    $result = pg_query($connection, "INSERT INTO client (nama_client, password, alamat_client, kontak_client) VALUES ('$nama', '$password','$alamat', '$kontak')");
    if(!$result){
        echo "
        <script>
            alert('Data gagal ditambahkan');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data berhasil ditambahkan');
            document.location.href = 'index.php';
        </script>
        ";
    }
?>