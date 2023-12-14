<?php
include 'config.php';

if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $nama = $_POST['nama'];
    $wali = $_POST['wali'];
    $namasiswa = $_POST['namasiswa'];
    $kontak = $_POST['kontak'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['w_role'];

    $filename = $_FILES['w_foto']['name'];
    $tmpname = $_FILES['w_foto']['tmp_name'];
    $newfilename = date('dmYHis').$filename;
    $path = "img/user/".$newfilename;

    move_uploaded_file($tmpname, $path);
    $sql = "INSERT INTO user (us_username, us_password, us_email, us_role, us_image) VALUE ('$username', '$password', '$email', '$role', '$newfilename')";
    $query = mysqli_query($db, $sql);
   
    // buat query

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

    $sqlll = "SELECT s_id FROM siswa WHERE s_nama='$namasiswa' LIMIT 1" ;
    $result = $db->query($sqlll);

    if ($result->num_rows > 0) {
        // Fetch the result as an associative array
        $row = $result->fetch_assoc();

        // The value of $row['us_id'] will be of the type that is stored in the 'us_id' column in the database
        $s_id = $row['s_id'];

        // Now, $usIdValue could be a string or an integer, depending on the data type of 'us_id' in the database.
    } else {
        // Handle the case where no rows are returned
    }

    $sql = "INSERT INTO wali (w_nama, w_sebagai, w_kontak, w_us_id, w_s_id) VALUE ('$nama','$wali', '$kontak', '$us_id', '$s_id')";
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