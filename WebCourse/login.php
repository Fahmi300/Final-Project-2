
<?php

session_start();

include 'config.php';

//check

if (isset($_POST['login'])) {
  //input user
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  
  //check database
  $result = mysqli_query($db, "SELECT * FROM user WHERE us_username='$username'");

  //check pass
  if (mysqli_num_rows($result) == 1) {
    
    $hasil = mysqli_fetch_assoc($result);
    
    if ($password == $hasil['us_password']) {
      //set session
      $_SESSION['login']       = true;
      $_SESSION['us_id']       = $hasil['us_id'];
      $_SESSION['us_username'] = $hasil['us_username'];
      $_SESSION['us_email']    = $hasil['us_email'];
      $_SESSION['us_role']     = $hasil['us_role'];
      $_SESSION['us_image']    = $hasil['us_image'];
      
      if ($_SESSION['us_role'] == 'siswa') {
        $sql = mysqli_query($db, "SELECT * FROM siswa WHERE s_us_id= $_SESSION[us_id]");
        $has = mysqli_fetch_assoc($sql);
        $_SESSION['s_id']       = $has['s_id'];
        $_SESSION['s_nama'] = $has['s_nama'];
        $_SESSION['s_usia']    = $has['s_usia'];
        $_SESSION['s_jk']     = $has['s_jk'];
        $_SESSION['s_alamat']    = $has['s_alamat'];
        $_SESSION['s_kontak']    = $has['s_kontak'];
      } else if ($_SESSION['us_role'] == 'guru') {
        $sql = mysqli_query($db, "SELECT * FROM guru WHERE g_us_id= $_SESSION[us_id]");
        $has = mysqli_fetch_assoc($sql);
        $_SESSION['g_id']       = $has['g_id'];
        $_SESSION['g_nama'] = $has['g_nama'];
        $_SESSION['g_usia']    = $has['g_usia'];
        $_SESSION['g_jk']     = $has['g_jk'];
        $_SESSION['g_alamat']    = $has['g_alamat'];
        $_SESSION['g_kontak']    = $has['g_kontak'];
      } else {
        $sql = mysqli_query($db, "SELECT * FROM wali w JOIN siswa s ON w.w_s_id = s.s_id WHERE w_us_id= $_SESSION[us_id]");
        $has = mysqli_fetch_assoc($sql);
        $_SESSION['w_id']       = $has['w_id'];
        $_SESSION['w_nama'] = $has['w_nama'];
        $_SESSION['w_sebagai']    = $has['w_sebagai'];
        $_SESSION['w_kontak']    = $has['w_kontak'];
        $_SESSION['s_nama']    = $has['s_nama'];
      }

      header("Location: index.php?id=".$_SESSION['s_id']."");
      exit;
    }
  }
  //jika error
  $error = true;


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
    body{
      margin-top: 2%;
      background-color:#2eccd442;
    }
  </style>
</head>
<body>
  <div class="login d-flex align-items-center py-5">
      <div class="container w-50 co-login">
          <div class="row">
              <div class="col-md-9 col-lg-8 mx-auto">
                    <h3 class="login-heading mb-4">Selamat Datang Kembali!</h3>

                    <?php if (isset($error)) : ?>
                      <div class="alert alert-danger text-center">
                          <b>Username/Password Salah</b>
                      </div>
                    <?php endif; ?>
              
                    <form action="" method="POST">
                        <div class="form-floating mb-3">
                            <input type="text" name="username"class="form-control" id="floatingInput" placeholder="Username">
                            <label for="floatingInput">Username</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <div class="form-check mb-0">
                                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                                <label class="form-check-label" for="form2Example3"> Remember me</label>
                            </div>
                            <a href="#!" class="text-body">Forgot password?</a>
                        </div>
                    
                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" name="login" class="btn btn-primary btn-lg w-100">Masuk</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Belum punya akun? <a href="daftar.php"
                                class="link-info">Buat Akun</a></p>
                        </div>
                     </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
      

 


<?php
include 'layout/footer.php';
?>