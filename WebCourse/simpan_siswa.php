<?php
include 'config.php';

if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $nama = $_POST['s_nama'];
    $jk = $_POST['s_jk'];
    $usia = $_POST['s_usia'];
    $alamat = $_POST['s_alamat'];
    $kontak = $_POST['s_kontak'];
    $email = $_POST['us_email'];
    $username = $_POST['us_username'];
    $password = $_POST['us_password'];
    $role = $_POST['us_role'];

    $filename = $_FILES['foto']['name'];
    $tmpname = $_FILES['foto']['tmp_name'];
    $newfilename = date('dmYHis').$filename;
    $path = "img/user/".$newfilename;

    move_uploaded_file($tmpname, $path);
    $sql = "INSERT INTO user (us_username, us_password, us_email, us_role, us_image) VALUE ('$username', '$password', '$email', '$role', '$newfilename')";
    $query = mysqli_query($db, $sql);

    $sqll = "SELECT us_id FROM user ORDER BY us_id DESC LIMIT 1";

    $result = $db->query($sqll);

    if ($result->num_rows > 0) {
        // Fetch the result as an associative array
        $row = $result->fetch_assoc();

        // The value of $row['us_id'] will be of the type that is stored in the 'us_id' column in the database
        $us_id = $row['us_id'];

        // Now, $usIdValue could be a string or an integer, depending on the data type of 'us_id' in the database.
    } else {
        // Handle the case where no rows are returned
    }

    $sql = "INSERT INTO siswa (s_nama, s_jk, s_usia, s_alamat,s_kontak, s_us_id) VALUE ('$nama', '$jk', '$usia', '$alamat', '$kontak', '$us_id')";
    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: list.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: list.php?status=gagal');
    }


} else {
    die("Akses dilarang...");
}
?>