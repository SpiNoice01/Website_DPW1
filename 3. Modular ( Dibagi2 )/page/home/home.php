<?php include "_component/header.php"; ?>
<?php include "../config/koneksi.php"; ?>


<section class="container">

    <body>
        <?php include "../config/koneksi.php"; ?>
        <nav class="navbar navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
</section>

<!-- ========================================================================================================================================================================== -->
<div id="carouselExample" class="carousel slide container-fluid">
    <div class="carousel-inner ">
        <?php
        $sql = "SELECT * FROM slider";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="carousel-item active ">
                    <img src="<?php echo $row["gambar"]; ?>" class="w-200 h-100 d-block" alt="...">
                </div>
                <?php
            }
        } else {
            echo "No data";
        }
        ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!--  -->

<!-- ===================================================================================================================================================================================== -->
<section class="container text-center img-fluid">
    <div class="row">
        <h2 class="text-center">prestasi Mahasiswa</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">

            <!--  -->
            <?php
            $sql = " SELECT * FROM berita";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    // 
                    $wordLimit = 50;
                    $words = explode(" ", $row["konten"]);
                    $artikel = implode(" ", array_slice($words, 0, $wordLimit));
                    // 
                    ?>
                    <!--  -->
                    <div class="col">
                        <div class="card h-100">
                            <img src="<?php echo $row["gambar"]; ?>" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row["judul"]; ?></h5>
                                <p class="card-text">
                                    <?php
                                    echo $artikel;
                                    $id = $row["id_berita"]; // NEED FIX ( Kebacanya total Row, bukan row keberapa)
                                    // 
                                    if (count($words) > $wordLimit) {
                                        echo '...
                                        <br><a href="konten.php?id=' . $id . '"> Read More </a>'; //<<<<<<<<<<<<<
                                    }
                                    ?>
                                </p>



                            </div>
                            <div class="card-footer">
                                <small class="text-body-secondary">Last updated 3 mins ago</small>
                            </div>
                        </div>
                    </div>

                    <?php
                    // data
            
                }
            } else {
                echo "0 data";
            }
            mysqli_close($conn);
            ?>
            <!--  -->


        </div>
    </div>
</section>

<?php include "_component/footer.php"; ?>