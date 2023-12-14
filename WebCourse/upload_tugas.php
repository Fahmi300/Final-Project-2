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

if(isset($_GET['t_id']) ){

    
    // ambil id dari query string
    $id = $_GET['t_id'];

    $ids = $_SESSION['s_id'];

    $d=strtotime("now");
    $date = date("Y-m-d h:i:sa", $d);

    $filename = $_FILES['assignmentFile']['name'];
    $tmpname = $_FILES['assignmentFile']['tmp_name'];
    $newfilename = date('dmYHis').$filename;
    $path = "file/".$newfilename;
    // buat query hapus
    if (move_uploaded_file($tmpname, $path)) {
        $sql = "INSERT INTO submission (sub_s_id, sub_t_id, sub_file, sub_time ) VALUE ('$ids', '$id', '$newfilename', '$date')";
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