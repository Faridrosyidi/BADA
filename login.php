<?php 
    require "function/functions.php";

    if (isset($_POST["login"])){
        $nama = $_POST["nama_client"];
        if (login($_POST) == "Login berhasil"){
            echo "
            <script>
                alert('Login berhasil');
                document.location.href = 'index.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Login gagal');
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

        #login_box {
            position: absolute;
            height: 706px;
            width: 100%;
            top: 0;
            left: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #login_form {
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

        #nama, #pass {
            padding: 12px 20px;
            border: 0;
            background: #395174;
            color: white;
            
        }

        #nama::placeholder, #pass::placeholder {
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

        #btn_login {
            background: none;
            border: 0;
            font-size: 20px;
            font-weight: 600;
        }

        /* #login_form {
            
        } */
    </style>
</head>
<body>
    <div id="background">
        <div id="box">
            <img id="bg" src="image/background (2).png" alt="">
        </div>
        <div id="login_box">
            <form action="" id="login_form" method="POST">
                <div id="kotak_tengah">
                    <div id="input_box">
                        <div class="input_group">
                            <label for="nama" class="label">U</label>
                            <input type="text" id="nama" name="nama_client" placeholder="Nama">
                        </div>
                        <div class="input_group">
                            <label for="pass" class="label">P</label>
                            <input type="password" name="password" id="pass" placeholder="Password">
                        </div>
                        <div style="height: 15px;"></div>
                        <p>Belum punya akun? <a href="registrasi.php">Registrasi</a></p>
                    </div>
                </div>
                <div id="kotak_bawah">
                    <button type="submit" name="login" id="btn_login">Login</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>