<?php


session_start();

if (!isset($_SESSION["login"])) {
    echo "<script>
            alert('Login terlebih dahulu');
            document.location.href = 'login.php';
            </script>";
    exit;
}


include 'layout/header.php';
?>

<div class="container-fluid">
        <div class="row">
            <div class="col-md-6 slotWidget">
                <div class="section">
                    <h2>Kelas Hari ini</h2>
                    <p>Berdasarkan lokasi yang terdaftar: Wiyung</p>
                    <div class="carousel" id="class-carousel">
                        <button class="carousel-control left" onclick="scrollCarousel('class-carousel', 'left')">&#10094;</button>
                        <div class="carousel-track-container">
                            <ul class="carousel-track" id="class-cards">
                                <!-- Class cards will be dynamically inserted here by JavaScript -->
                            </ul>
                        </div>
                        <button class="carousel-control right" onclick="scrollCarousel('class-carousel', 'right')">&#10095;</button>
                    </div>
                </div>
            </div>
            <?php if ($_SESSION['us_role'] == 'siswa') : ?>
            <div class="col-md-6 slotWidget">
                <div class="section">
                    <h2 id="test">Tugas Belum Dikumpulkan</h2>
                    <p>Ketelatan akan berakibat pada pengurangan nilai</p>
                    <div class="carousel" id="task-carousel">
                        <button class="carousel-control left" onclick="scrollCarousel('task-carousel', 'left')">&#10094;</button>
                        <div class="carousel-track-container">
                            <ul class="carousel-track" id="task-cards">
                                <!-- Task cards will be dynamically inserted here by JavaScript -->
                            </ul>
                        </div>
                        <button class="carousel-control right" onclick="scrollCarousel('task-carousel', 'right')">&#10095;</button>
                    </div>
                </div>
            </div>  
            <?php endif; ?>
    
        </div>
    </div>
    <div class="announcement-section">
        <h2>Announcements</h2>
        <p>Here you can place any announcements or updates that need to be shared with the users.</p>
    </div>

<?php
include_once("layout/script1.php");
include 'layout/footer.php';
?>