<?php 
    // session_start();

    // // Check if the user is not logged in
    // if (!isset($_SESSION["user"])) {
    //     header("Location: login.php");
    //     exit();
    // }

    require "components/header.php";
?>

    <!-- Page Content-->
    <div class="container px-4 px-lg-5">
        <!-- Heading Row-->
        <div class="row gx-4 gx-lg-5 align-items-center my-5">
            <div class="col-lg-5">
                <img class="img-fluid rounded mb-4 mb-lg-0" src="image/Proyek Baru.png" alt="..." style="width: 400px;"/>
            </div>
            <div class="col-lg-7">
                <h1 class="font-weight-light">ISOTEC - Solusi Terpercaya Sumber Radioaktif dan Radioisotop</h1>
                <p>Isotec merupakan lembaga penyedia terkemuka sumber radioaktif dan radioisotop di Indoenesia yang telah berdedikasi untuk memenuhi kebutuhan bidang industri, pertanian dan kesehatan, serta dalam bidang penelitian dan pendidikan. Sebagai bagian dari BRIN memiliki akses tak tertandingi ke keahlian dan sumber daya global untuk memberikan solusi berkualitas tinggi kepada pelanggan di seluruh Indonesia.</p>
                <a class="btn btn-primary" href="index.php">Call to Action!</a>
            </div>
        </div>
        <!-- Call to Action-->
        <div class="card text-white bg-secondary my-5 py-4 text-center">
            <div class="card-body">
                <p class="text-white m-0">Visi dan Misi</p> 
                <p class="text-white m-0">Menjadi penyedia sumber radioaktif dan radioisotop terkemuka di Indonesia</p>
                <p class="text-white m-0">Melayani penyediaan sumber radioaktif dan radioisotop di berbagai bidang seperti industri, medis, pertanian, penelitian, dan pendidikan</p>
            </div>
        </div>
        <!-- Content Row-->
        <div class="row gx-4 gx-lg-5">
            <div class="col-md-4 mb-5">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">Produk dan Layanan</h2>
                        <p class="card-text">Isotec menyediakan sumber radioaktif dan radioisotop untuk berbagai keperluan, termasuk penggunaan dalam industri, aplikasi medis, pertanian, penelitian, dan pendidikan. Produk kami mencakup sumber radioaktif dan radioisotop seperti Cobalt-60, Cesium-137, Iodine-131 dan berbagai sumber lain yang digunakan secara luas dalam proses industri sehingga dapat memberikan solusi yang andal dan efektif bagi pelanggan kami.</p>
                    </div>
                    <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">More Info</a></div>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">Komitmen terhadap Keamanan dan Lingkungan</h2>
                        <p class="card-text">Isotec berkomitmen untuk beroperasi dengan cara yang aman dan bertanggung jawab. Keamanan karyawan, pelanggan, dan lingkungan adalah prioritas utama kami. Kami mengikuti pedoman ketat dalam pengelolaan limbah dan pemrosesan bahan radioaktif untuk memastikan dampak lingkungan minimal.</p>
                    </div>
                    <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">More Info</a></div>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">Jaringan Global</h2>
                        <p class="card-text">Sebagai bagian dari BRIN, Isotec memiliki keuntungan jaringan global yang luas. Kami tidak hanya menyediakan produk berkualitas, tetapi juga memberikan layanan instalasi, dukungan pelanggan, dan konsultasi ahli dari para akademisi dan peneliti yang berada dibawah naungan BRIN dan peneliti dengan kerja sama luar</p>
                    </div>
                    <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">More Info</a></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container px-4 px-lg-5">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>