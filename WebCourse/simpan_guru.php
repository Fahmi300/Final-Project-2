<?php
include 'config.php';

if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $kontak = $_POST['kontak'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

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

    $sql = "INSERT INTO guru (g_nama, g_jk, g_alamat,g_kontak, g_us_id) VALUE ('$nama', '$jk',  '$alamat', '$kontak', '$us_id')";
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