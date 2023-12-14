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

<div class="co-penilaian">
    <div class="box-penilaian">
        <h5>Input Nilai</h5>
    </div>
    <form action="upload-nilai.php" method="POST">
    <div class="box-penilaiann">
        <div class="box-penilaian-11">
            <label for="">Nama :</label>
        </div>
        <div class="box-penilaian-22">
            <input type="text" name="nama">
        </div>
        <div class="box-penilaian-33">
            <label for="">Pelajaran :</label>
        </div>
        <div class="box-penilaian-44">
            <input type="text" name="pelajaran">
        </div>
        <div class="box-penilaian-55">
            <label for="">Materi :</label>
        </div>
        <div class="box-penilaian-66">
            <input type="text" name="materi">
        </div>
    </div>
    <div class="box-penilaiann">
        <div class="box-penilaian-11">
            <label for="">Tugas-Ke :</label>
        </div>
        <div class="box-penilaian-22">
            <select name="tugasno">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </div>
        <div class="box-penilaian-33">
            <label for="">Kelas :</label>
        </div>
        <div class="box-penilaian-44">
            <input type="text" name="kelas">
        </div>
        <div class="box-penilaian-55">
            <label for="">Nilai :</label>
        </div>
        <div class="box-penilaian-66">
            <input type="text" name="nilai">
        </div>
    </div>
    <div class="box-penilaian">
        <input type="submit" name="simpan" value="simpan">
    </div>
    </form>
</div>


<?php
include 'layout/footer.php';
?>



