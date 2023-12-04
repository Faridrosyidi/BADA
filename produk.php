<?php 
    require "components/header.php";

    $sumber = pg_query($connection, "SELECT * FROM sumber_radiasi");

    if(isset($_POST["pesan"])){
        // var_dump($_POST);
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

    <div class="d-flex justify-content-center align-items-center flex-column" style="width: 100%; height: 100px; margin: 20px 0 30px 0;">
        <h1>Halaman Produk</h1>
        <div style="width: 120px; height: 2px; background: black; margin-top: 3px;"></div>
    </div>
    <!-- Page Content-->
    <div class="container px-4 px-lg-5">
        <!-- Heading Row-->
        
        <!-- Content Row-->
        <div class="row gx-4 gx-lg-5">
            <?php 
                $counter = 1; // Initialize the counter
                while($data = pg_fetch_assoc($sumber)){ 
            ?>
                <div class="col-md-4 mb-5">
                    <form action="" method="POST">
                        <input type="text" name="sumber_id" value="<?= $data["id"] ?>" hidden>
                        <div class="card" style="width: 23rem;">
                            <!-- <img src="..." class="card-img-top" alt="..."> -->
                            <div class="card-body">
                                <h5 class="card-title"><?= $data["nama_sumber"] ?></h5>
                                <p class="card-text">Stock : <?= $data["stok"]  ?></p>
                                <p class="card-text"><?= substr($data["deskripsi"],0,180) ?> . . .</p>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal<?= $data["id"] ?>">Lihat Detail</button>
                            </div>
                        </div>
                        <div class="modal fade" id="modal<?= $data["id"] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel<?= $data["id"] ?>" aria-hidden="true">
                            <div class="modal-dialog .modal-dialog-centered .modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="modalLabel<?= $data["id"] ?>"><?= $data["nama_sumber"] ?></h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="card-text"><?= $data["deskripsi"] ?> </p>
                                        <table class="table" style="margin-top: 12px;">
                                            <tr>
                                                <th>Radioactive Activity</th>
                                                <td><?= $data["radioactive_activity"] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Half-Life</th>
                                                <td><?= $data["half_life"] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Radiation</th>
                                                <td><?= $data["radioactive_activity"] ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <?php if ($userLoggedIn) : ?>
                                            <button type="button" class="btn btn-primary" data-bs-target="#modal2<?= $data["id"] ?>" data-bs-toggle="modal">Pesan Sekarang</button>
                                        <?php else : ?>
                                            <p class="text-danger">Silakan login untuk melakukan pemesanan.</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="modal2<?= $data["id"] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel2<?= $data["id"] ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Pilih Tanggal Pengiriman</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="input-group input-group-sm mb-3">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Tanggal Pengiriman</span>
                                            <input type="date" class="form-control" name="waktu_pengiriman" id="tanggalPengiriman<?= $counter ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" id="lakukanPemesananBtn<?= $counter ?>" data-bs-target="#modal3<?= $data["id"] ?>" data-bs-toggle="modal" disabled>Lakukan Pemesanan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="modal3<?= $data["id"] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel3<?= $data["id"] ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel"></h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah anda yakin ingin melakukan pemesanan?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                        <button type="submit" class="btn btn-primary" name="pesan" data-bs-dismiss="modal">Ya</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            <?php 
                $counter++; // Increment the counter
                }
            ?>
        </div>
    </div>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container px-4 px-lg-5">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            // Add an input event listener to the date input
            $("input[name^='waktu_pengiriman']").on("input", function () {
                // Get the value of the input
                var inputValue = $(this).val();

                // Get the corresponding "Lakukan Pemesanan" button
                var buttonId = $(this).attr('id').replace('tanggalPengiriman', 'lakukanPemesananBtn');
                var button = $("#" + buttonId);

                // Enable or disable the button based on the input value
                button.prop("disabled", !isValidDate(inputValue));
            });

            // Function to check if the date is at least one day after the current date
            function isValidDate(inputDate) {
                var currentDate = new Date();
                var selectedDate = new Date(inputDate);

                // Calculate the difference in milliseconds
                var timeDiff = selectedDate.getTime() - currentDate.getTime();

                // Calculate the difference in days
                var daysDiff = timeDiff / (1000 * 3600 * 24);

                // Return true if the selected date is at least one day after the current date
                return daysDiff >= 1;
            }
        });
    </script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>