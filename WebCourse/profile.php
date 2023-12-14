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

<div class="co-profile">
    <div class="box-content-profile">
        <div class="box-content-profile-1">
            <img src="img/user<?php echo $_SESSION['us_image']; ?>" alt="">
        </div>
        <div class="box-content-profile-2">
            <h3>
            <?php echo $_SESSION['us_username']; ?>
            </h3>
            <h3>
            <?php echo $_SESSION['us_role']; ?>
            </h3>
        </div>
    </div>
    <div class="box-content-profile">
        <div class="box-content-profile-1">
            <h3>
            <?php echo $_SESSION['g_nama']; ?>
            </h3>
            <h3>
            <?php echo $_SESSION['us_role']; ?>
            </h3>
        </div>
        <div class="box-content-profile-2">

        </div>
    </div>
</div>

<?php
include 'layout/footer.php';
?>



