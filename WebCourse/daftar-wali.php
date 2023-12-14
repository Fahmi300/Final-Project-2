<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="layout/style.css">
</head>
<body>

<div class="co-daftarwali">
    <form name="form" action="simpan_wali.php" method="POST" enctype="multipart/form-data">

        <div class="box-content">
            <h2>Pendaftaran Wali Siswa</h2>
        </div>
        
        <div class="box-content">
            <div class="col-25">
                <label class="required">Nama Lengkap</label>
            </div>
            <div class="col-75">
                <input type="text" name="nama" placeholder="Masukkan Nama Lengkap" maxlength="30">
            </div>
        </div>
        
        <div class="box-content">
            <div class="col-25">
                <label class="required">Sebagai</label>
            </div>
            <div class="col-75">
                <select name="wali">
                    <option value="ayah">Ayah</option>
                    <option value="ibu">Ibu</option>
                    <option value="lain">Lainnya</option>
                </select>
            </div> 
        </div>
        
        <div class="box-content">
            <div class="col-25">
                <label class="required">Nama Siswa</label>
            </div>
            <div class="col-75">
                <input type="text" name="namasiswa" placeholder="Masukkan Nama Siswa" maxlength="30">
            </div>
        </div>

        <div class="box-content">
            <div class="col-25">
                <label class="required">Kontak</label>
            </div>
            <div class="col-75">
                <input type="text" name="kontak" placeholder="Masukkan Kontak" maxlength="30">
            </div>
        </div>
        
        <div class="box-content">
            <div class="col-25">
                <label class="required">Email</label>
            </div>
            <div class="col-75">
                <input type="email" name="email" placeholder="Masukkan Email" maxlength="30">
            </div>
        </div>
        
        <div class="box-content">
            <div class="col-25">
                <label class="required">Username</label>
            </div>
            <div class="col-75">
                <input type="text" name="username" placeholder="Masukkan Username" maxlength="30">
            </div>
        </div>
        
        <div class="box-content">
            <div class="col-25">
                <label class="required">Password</label>
            </div>
            <div class="col-75">
                <input type="password" name="password" placeholder="Masukkan Password" maxlength="30">
            </div>
        </div>

        <div class="box-content">
            <div class="col-25">
                <label class="required">Foto</label>
            </div>
            <div class="col-75">
                <input type="file" name="w_foto">
            </div>
        </div>
        <input type="hidden" name="w_role" value="wali">
        <div class="box-content">
            <input type="submit" name="simpan" value="simpan">
        </div>
    </form>
</div>

<?php
include 'layout/footer.php'
?>
