<?php 
    require "function/functions.php";

    if(isset($_POST["register"])){
        $nama = htmlspecialchars($_POST["nama_client"]);
        $password = htmlspecialchars($_POST["password"]);
        $alamat = htmlspecialchars($_POST["alamat_client"]);
        $kontak = htmlspecialchars($_POST["kontak_client"]);
        $isadmin = false;
        $edited_at = date("Y-m-d H:i:s");

        $isadminValue = $isadmin ? 'TRUE' : 'FALSE';

        $hasil = pg_query($connection, 'SELECT * FROM "user"');
        
        if(!$hasil){
            echo "ERROR : Gagal mengambil data client";
            exit;
        }

        while($nama1 = pg_fetch_assoc($hasil)){
            if($nama == $nama1['nama']){
                echo 'Nama Sudah Ada';
                exit;
            }
        }

        $result = pg_query($connection, "INSERT INTO \"user\" (nama, password, alamat, kontak, isadmin, edited_at) VALUES ('$nama', '$password','$alamat', '$kontak', $isadminValue, '$edited_at')");
        if(!$result){
            echo "
            <script>
                alert('Data gagal ditambahkan');
                document.location.href = 'registrasi.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Data berhasil ditambahkan');
                document.location.href = 'login.php';
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
    <title>Website</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins';
        }

        #box {
            width: 100%;
            height: 793px;
            overflow: hidden;
        }

        #register_box {
            position: absolute;
            height: 706px;
            width: 100%;
            top: 0;
            left: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #register_form {
            width: 400px;
            height: 400px;
            position: relative;
            display: flex;
            justify-content: center;
        }

        #kotak_tengah {
            width: 400px;
            height: 400px;
            background: #FDE4DE;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 24px;
            position: absolute;
            z-index: 15;
        }

        #nama, #pass , #alamat_client, #kontak_client{
            padding: 12px 20px;
            border: 0;
            background: #395174;
            color: white;
            
        }

        #nama::placeholder, #pass::placeholder, #alamat_client::placeholder, #kontak_client::placeholder{
            color: white;
        }

        #input_box {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .label {
            padding: 12px 20px;
            background: #01264E;
            color: white;
        }

        .input_group {
            display: flex;
            
        }

        #kotak_bawah {
            width: 350px;
            height: 100%;
            background: #FAC7BC;
            position: absolute;
            margin-top: 46px;
            border-radius: 24px;
            z-index: 10;
            display: flex;
            align-items: end;
            justify-content: center;
            padding-bottom: 20px;
        }

        #btn_register {
            background: none;
            border: 0;
            font-size: 20px;
            font-weight: 600;
        }

        /* #register_form {
            
        } */
    </style>
</head>
<body>
    <div id="background">
        <div id="box">
            <img id="bg" src="image/background (2).png" alt="">
        </div>
        <div id="register_box">
            <form action="" id="register_form" method="POST">
                <div id="kotak_tengah">
                    <div id="input_box">
                        <div class="input_group">
                            <label for="nama" class="label">U</label>
                            <input type="text" id="nama" name="nama_client" placeholder="Nama" required>
                        </div>
                        <div class="input_group">
                            <label for="pass" class="label">P</label>
                            <input type="password" name="password" id="pass" placeholder="Password" required>
                        </div>
                        <div class="input_group">
                            <label for="alamat_client" class="label">A</label>
                            <input type="text" id="alamat_client" name="alamat_client" placeholder="Alamat" required>
                        </div>
                        <div class="input_group">
                            <label for="kontak_client" class="label">K</label>
                            <input type="text" id="kontak_client" name="kontak_client" placeholder="Kontak" required>
                        </div>
                        <div style="height: 15px;"></div>
                        <p>Sudah punya akun? <a href="login.php">Login</a></p>
                    </div>
                </div>
                <div id="kotak_bawah">
                    <button type="submit" name="register" id="btn_register">register</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>