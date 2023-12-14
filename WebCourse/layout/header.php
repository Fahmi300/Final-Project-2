<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ACC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="layout/slider/style-slider.css">
    <link rel="stylesheet" href="layout/style.css">
</head>

  <body>

    <div class="nav-co">
    <body>
    <nav class="navbar navbar-expand-lg" style="background-color: #2eccd4;">
            <div class="container-fluid">   
                <a class="navbar-brand" href="index.php">
                    <div class="row">
                        <div class="col">
                            <div class="container" style="border: solid white; padding: 10px; border-radius: 50%; background-color: white;"><img src="img/icon/logo2.svg" alt="logo" width="40px" height="40px"></div>
                        </div>
                        <div class="col" style="color: whitesmoke; padding: 0px;">
                            <div class="d-flex flex-column h-100 justify-content-center">
                                <div class="row">
                                    <h1 style="font-family: 'Inter', sans-serif; margin: 0px;">ACC</h1>
                                </div>
                                <div class="row">
                                    <h6 style="font-family: 'Inter', sans-serif; font-size: 10px;">Aktual Cendikia Course</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav flex-row justify-content-between">
                    <li class="nav-item navigasi-link navigasi-jarak">
                        <a class="nav-link navigasi-link" aria-current="page" href="dashboardkelas.php" style="font-family: 'Inter', sans-serif; margin: 0px;">Kelas</a>
                    </li>
                    <li class="nav-item navigasi-link navigasi-jarak">
                        <a class="nav-link navigasi-link" href="komunikasi.php" style="font-family: 'Inter', sans-serif; margin: 0px;">Komunikasi</a>
                    </li>
                    <?php if ($_SESSION['us_role'] == 'guru') : ?>
                        <li class="nav-item navigasi-link navigasi-jarak">
                            <a class="nav-link navigasi-link" href="penilaian.php" style="font-family: 'Inter', sans-serif; margin: 0px;">Penilaian</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item navigasi-link navigasi-jarak">
                        <a class="nav-link navigasi-link" href="logoutt.php" style="font-family: 'Inter', sans-serif; margin: 0px;">Keluar</a>
                    </li>
                </ul>
                <div class="row md-0 align-items-center">
                    <div class="col-lg-6 order-lg-2 md-2">
                        <a href="profile.php">
                            <img src="img/user/<?php echo $_SESSION['us_image']; ?>" width="65px" height="65px" style="border: black; border-radius: 50%;">
                        </a>
                    </div>
                    <div class="col-lg-6 order-lg-1">
                        <div class="row">
                            <a style="text-decoration: none; margin-top: 5px; color: white;"><h3><?php echo $_SESSION['us_username']?></h3></a>
                        </div>
                        <div class="row">
                            <p style="color: white; font-size: 15px; white-space: nowrap;"><?php echo $_SESSION['us_role']?></p>
                        </div>
                    </div>
                </div>
            </div>    
            </div>
      </nav>
    </div>
