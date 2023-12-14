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

if(isset($_GET['m_id']) ){

    
    // ambil id dari query string
    $id = $_GET['m_id'];

    $no = $_POST['no'];
    $date = $_POST['waktu'];
    $deskripsi = $_POST['deskripsi'];

    $filename = $_FILES['assignmentFile']['name'];
    $tmpname = $_FILES['assignmentFile']['tmp_name'];
    $newfilename = date('dmYHis').$filename;
    $path = "file/".$newfilename;
    // buat query hapus
    if (move_uploaded_file($tmpname, $path)) {
        $sql = "INSERT INTO tugas (t_no, t_deadeline, t_file, t_deskripsi) VALUE ('$no', '$date', '$newfilename', '$deskripsi')";
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