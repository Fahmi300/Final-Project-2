<?php

session_start();

if (!isset($_SESSION["login"])) {
    echo "<script>
            alert('Login terlebih dahulu');
            document.location.href = 'login.php';
            </script>";
    exit;
}

include("config.php");

if(isset($_GET['id']) ){

    
    // ambil id dari query string
    $id = $_GET['id'];

    $name = $_POST['nama_mat'];
    $date = $_POST['waktu'];
    $deskripsi = $_POST['deskripsi'];

    $filename = $_FILES['assignmentFile']['name'];
    $tmpname = $_FILES['assignmentFile']['tmp_name'];
    $newfilename = date('dmYHis').$filename;
    $path = "file/".$newfilename;
    // buat query hapus
    if (move_uploaded_file($tmpname, $path)) {
        $sql = "INSERT INTO materi (m_nama,m_jadwal, m_deskripsi, m_file, m_k_id) VALUE ('$name', '$date', '$deskripsi', '$newfilename', $id)";
        $query = mysqli_query($db, $sql);

        if( $query ){
            header('Location: kelas.php');
        } else {
            die("gagal upload...");
        }
        
    } else {
        echo "Maaf, Gambar gagal untuk diupload.";
        echo "<br><a href='kelas.php'>Kembali Ke Form</a>";
    }


} else {
    die("gagal upload...");
}


?>