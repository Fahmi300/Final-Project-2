<?php


session_start();

     if (!isset($_SESSION["login"])) {
         echo "<script>
                 alert('Login terlebih dahulu');
                document.location.href = 'login.php';
                </script>";
  exit;
 }


include 'layout/header.php';
?>
<style>
     /* Reset some default styles */

/* Header styles */


/* Main content styles */
.containerkelas {
    background-color: #a68d8d;
    max-width: 1500px;
    margin: 0 auto;
    padding: 20px;
}
/* CSS for the checkbox */
.material input[type="checkbox"] {
    align-items: end;
    margin-left: 600px;
}
.status-label {
    right: 0;
}

/* CSS for the label (optional) */
.status-label label {
    font-weight: bold;
}
/* CSS for the label (optional) */

/* CSS for the label (optional) */
.material label {
    font-weight: bold;
}

/* Class description styles */
.class-description {
    text-align: center;
    padding: 20px;
    background-color: #fffafa;
}
.class-description img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin: 10px;
}

.teacher, .assistant {
    display: inline-block;
    margin: 20px;
}
/* Class content styles */
.dashboard-content {
    margin-RIGHT:10PX;
    width: 1000PX;
    height: 50%%;
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
}
.dashboard-content .containerkelas{
    flex: 1;
    margin: 40px 10px 20px;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}
h2{
    text-allign:center;
}
/* Material styles */
.material {
    height:500px;
    margin-top:30px;
    display: flex;
    align-items: center;
}
.material button {
    background: url('https://eduauraapublic.s3.ap-south-1.amazonaws.com/webassets/images/blogs/how-to-be-good-at-math.jpg') center/cover no-repeat; /* Set your image */
    width: 500px;
    height: 400px;
    margin-right: 10px;
    margin-bottom: 10px;

    padding: 10px 20px;
    background-color: #007BFF;
    color: white;
    border: none;
    cursor: pointer;
}
.material button:hover {
    background-color: #0056b3;
}
.material-box, .assignment-box {
    max-width: 1090px; /* Adjust this width as needed */
    max-height:1000px;
    margin-right:20px;
    height:100%;
    overflow-y: auto ;
    overflow-x: auto;
    white-space: nowrap; 
}

/* Ensure the inner elements don't break into new lines */
.material, .assignment {
    display: inline-block;
}



</style>
<body>
    <div class="KELASPAGE">
        <!-- KELASPAGE item 1 -->
        <div class="KELASPAGE-item">
            <div class="class-description">
                <h1>Kelas Anda</h1>
                <div class="assistant">
                    <?php 
                    require_once("config.php");
                    if ($_SESSION['us_role'] == 'siswa') {
                        $result = mysqli_query($db, "SELECT user.us_image as us_img, siswa.s_nama as nama FROM siswa join user on user.us_id=siswa.s_us_id where s_us_id=".$_SESSION['us_id']."");
                        $res = mysqli_fetch_assoc($result);
                    } else {
                        $result = mysqli_query($db, "SELECT user.us_image as us_img, guru.g_nama as nama FROM guru join user on user.us_id=guru.g_us_id where g_us_id=".$_SESSION['us_id']."");
                        $res = mysqli_fetch_assoc($result);
                    }
                    ?>
                
                    <img src="img/user/<?php echo $res['us_img'] ?>" alt="Assistant Photo">
                    <?php
                        
                        echo "<p>".$res['nama']."</p>";
                    ?>
                </div>
            </div>
                
            <!-- Second Container: Class Material and Assignments -->
            <div class="dashboard-content">
                <div class="containerkelas">
                    <h2>Kelas Yang Ada</h2>
                    <div class="material-box">
                        <?php
                            if ($_SESSION['us_role'] == 'guru') {
                                $result = mysqli_query($db, "select kelas.k_id as idKelas, kelas.k_nama as namaKelas
                                from kelas 
                                join guru on guru.g_id=kelas.k_g_id
                                where guru.g_us_id=".$_SESSION['us_id'].";");
                                if($result){
                                    while($res=mysqli_fetch_assoc($result))
                                    echo "<div class=\"material\">
                                    <button onclick=\"window.location.href='kelas.php?idKelas=$res[idKelas]'\">
                                        <h3>".$res['namaKelas']."</h3>
                                    </button>
                                    </div>";
                                }
                            } else {
                                $result = mysqli_query($db, "select kelas.k_id as idKelas, kelas.k_nama as namaKelas
                                from kelas 
                                join partisipasi_kelas on partisipasi_kelas.k_id=kelas.k_id
                                join siswa on siswa.s_id=partisipasi_kelas.s_id
                                where siswa.s_us_id=".$_SESSION['us_id'].";");
                                if($result){
                                    while($res=mysqli_fetch_assoc($result))
                                    echo "<div class=\"material\">
                                    <button onclick=\"window.location.href='kelas.php?idKelas=$res[idKelas]'\">
                                        <h3>".$res['namaKelas']."</h3>
                                    </button>
                                    </div>";
                                }
                            }
                        ?>
                        
                       
                        
                    </div>
                    

 
</script>
</body>



<?php
include 'layout/footer.php';
?>