
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

<div class="co-daftarsiswa">
    <form name="form" action="simpan_siswa.php" method="POST" enctype="multipart/form-data">

        <div class="box-content">
            <h2>Pendaftaran Siswa</h2>
        </div>
        
        <div class="box-content">
            <div class="col-25">
                <label class="required">Nama Lengkap</label>
            </div>
            <div class="col-75">
                <input type="text" name="s_nama" placeholder="Masukkan Nama Lengkap" maxlength="30">
            </div>
        </div>
        
        <div class="box-content">
            <div class="col-25">
                <label class="required">Jenis Kelamin</label>
            </div>
            <div class="col-75">
                <select name="s_jk">
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            
        </div>
        
        <div class="box-content">
            <div class="col-25">
                <label class="required">Usia</label>
            </div>
            <div class="col-75">
                <input type="text" name="s_usia" placeholder="Masukkan Usia" maxlength="30">
            </div>
        </div>
        
        <div class="box-content">
            <div class="col-25">
                <label class="required">Alamat</label>
            </div>
            <div class="col-75">
                <textarea name="s_alamat" cols="30" rows="4" placeholder="Masukkan Alamat"></textarea>
            </div>
        </div>
        
        <div class="box-content">
            <div class="col-25">
                <label class="required">Kontak</label>
            </div>
            <div class="col-75">
                <input type="text" name="s_kontak" placeholder="Masukkan Kontak" maxlength="30">
            </div>
        </div>
        
        <div class="box-content">
            <div class="col-25">
                <label class="required">Email</label>
            </div>
            <div class="col-75">
                <input type="email" name="us_email" placeholder="Masukkan Email" maxlength="30">
            </div>
        </div>
        
        <div class="box-content">
            <div class="col-25">
                <label class="required">Username</label>
            </div>
            <div class="col-75">
                <input type="text" name="us_username" placeholder="Masukkan Username" maxlength="30">
            </div>
        </div>
        
        <div class="box-content">
            <div class="col-25">
                <label class="required">Password</label>
            </div>
            <div class="col-75">
                <input type="password" name="us_password" placeholder="Masukkan Password" maxlength="30">
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

        <input type="hidden" name="us_role" value="siswa">
        <div class="box-content">
            <input type="submit" name="simpan" value="simpan">
        </div>
    </form>
</div>

<?php
include 'layout/footer.php'
?>
