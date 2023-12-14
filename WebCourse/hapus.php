<?php

include("config.php");

if(isset($_GET['id']) ){

    // ambil id dari query string
    $id = $_GET['id'];

    $sql = "DELETE FROM pesan WHERE p_us_1_id =$id";
    $query = mysqli_query($db, $sql);

    $sql = "DELETE FROM pesan WHERE p_us_2_id =$id";
    $query = mysqli_query($db, $sql);

    // buat query hapus
    $sql = "DELETE FROM user WHERE us_id=$id";
    $query = mysqli_query($db, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: list.php');
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}

?>