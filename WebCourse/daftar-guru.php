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

<div class="co-daftarguru">
    <form name="form" action="simpan_guru.php" method="POST" enctype="multipart/form-data">

        <div class="box-content">
            <h2>Pendaftaran Guru</h2>
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
                <label class="required">Jenis Kelamin</label>
            </div>
            <div class="col-75">
                <select name="jk">
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            
        </div>
        
        <div class="box-content">
            <div class="col-25">
                <label class="required">Alamat</label>
            </div>
            <div class="col-75">
                <textarea name="alamat" cols="30" rows="4" placeholder="Masukkan Alamat"></textarea>
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
                <input type="text" name="email" placeholder="Masukkan Email" maxlength="30">
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
                <input type="file" name="foto">
            </div>
        </div>

        <input type="hidden" name="role" value="guru">
        <div class="box-content">
            <input type="submit" name="simpan" value="simpan">
        </div>
    </form>
</div>

<?php
include 'layout/footer.php'
?>