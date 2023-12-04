<?php
    session_start();
    $connection = pg_connect("host=db-postgresql-sgp1-45498-do-user-15118002-0.c.db.ondigitalocean.com port=25060 dbname=defaultdb user=doadmin password=AVNS_xzsYERzZOQc5T2jr2GA");
    if(!$connection){
        echo "ERROR : Gagal terhubung ke database";
        exit;
    }

    function query($query){
        global $connection;
        $result = pg_query($connection, $query);
        if (!$result) {
            echo "ERROR : Query gagal dieksekusi";
            exit;
        }
        $rows = [];
        while($row = pg_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    function hapus($id){
        global $connection;
        $result = pg_query($connection, " DELETE FROM client WHERE id_client = '$id' ");
        if (!$result) {
            echo "ERROR : Gagal menghapus data";
            exit;
        }
        return pg_affected_rows($result);
    }

    function ubah($data){
        global $connection;
        $id = $data["id_client"];
        $nama = htmlspecialchars($data["nama_client"]);
        $password = htmlspecialchars($data["password"]);
        $alamat = htmlspecialchars($data["alamat_client"]);
        $kontak = htmlspecialchars($data["kontak_client"]);
        
        $result = pg_query($connection, "UPDATE client SET nama_client = '$nama', password = '$password', alamat_client = '$alamat', kontak_client = '$kontak' WHERE id_client = '$id'");
        if (!$result) {
            echo "ERROR : Gagal mengubah data";
            exit;
        }
        return pg_affected_rows($result);
    }

    function login($data) {
        global $connection;
        $username = $data["nama_client"];
        $password = $data["password"];

        $client = pg_query($connection, 'SELECT * FROM "user"');

        while($row = pg_fetch_assoc($client)){
            
            if ($username == $row["nama"] && $password == $row["password"]) {
                $_SESSION["user"] = $row["id"];
                return "Login berhasil";
            };
        }
        return "login gagal";
    }
?>