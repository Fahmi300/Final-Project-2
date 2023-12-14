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

if(isset($_POST['simpan']) ){

    
    // ambil id dari query string
    $namasiswa = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $materi = $_POST['materi'];
    $tugas = $_POST['tugasno'];
    $pelajaran = $_POST['pelajaran'];
    $nilai = $_POST['nilai'];

    $sql = "SELECT sub.sub_id as si from submission sub join tugas t on sub.sub_t_id = t.t_id join materi m on t.t_m_id = m.m_id join kelas k on m.m_k_id =k.k_id join pelajaran p on k.k_p_id = p.p_id join partisipasi_kelas pk on k.k_id = pk.k_id join siswa s on pk.s_id = s.s_id 
    where s.s_nama = '$namasiswa' and p.p_nama = '$pelajaran' and k.k_nama = '$kelas' and m.m_nama = '$materi' and t.t_no = $tugas";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the result as an associative array
        $row = $result->fetch_assoc();

        // The value of $row['us_id'] will be of the type that is stored in the 'us_id' column in the database
        $sub_id = $row['si'];

        // Now, $usIdValue could be a string or an integer, depending on the data type of 'us_id' in the database.
    } else {
        // Handle the case where no rows are returned
    }

    $sql = "UPDATE submission SET sub_nilai =$nilai WHERE sub_id='$sub_id'";
    $query = mysqli_query($db, $sql);

    if( $query ){
        header('Location: kelas.php');
    } else {
        die("gagal upload...");
    }

} else {
    die("akses dilarang...");
}


?>