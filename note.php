<?php 
    require "components/header.php";

    $sumber = pg_query($connection, "SELECT * FROM sumber_radiasi");

    if(isset($_POST["pesan"])){
        var_dump($_POST);
        $user_id = htmlspecialchars($id);
        $sumber_id = htmlspecialchars($_POST["sumber_id"]);
        $jumlah = 1;
        $waktu_pengiriman = htmlspecialchars($_POST["waktu_pengiriman"]);

        $result = pg_query($connection, "INSERT INTO pemesanan (user_id, sumber_id, jumlah, waktu_pengiriman) VALUES ('$user_id', '$sumber_id','$jumlah', '$waktu_pengiriman')");
        if(!$result){
            echo "
            <script>
                alert('Data gagal ditambahkan');
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
    }
?>