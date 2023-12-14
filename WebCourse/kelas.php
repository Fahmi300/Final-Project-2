<?php


session_start();

     if (!isset($_SESSION["login"])) {
         echo "<script>
                 alert('Login terlebih dahulu');
                document.location.href = 'login.php';
                </script>";
  exit;
 }

require_once("config.php");
if (isset($_GET['idKelas'])){
    $result = mysqli_query($db, "SELECT kelas.k_nama as namaKelas, guru.g_nama as namaGuru, user.us_image as imgGuru  FROM kelas join guru on kelas.k_g_id=guru.g_id join user on user.us_id=guru.g_us_id where k_id=".$_GET['idKelas'].";");
    $res = mysqli_fetch_assoc($result);
}else{
    header("Location: dashboardkelas.php");
}


include 'layout/header.php';
?>
<style>
    
.containerkelas {
    background-color: #a68d8d;
    max-width: 1500px;
    margin: 0 auto;
    padding: 20px;
}
.material input[type="checkbox"] {
    align-items: end;
    margin-left: 600px;
}
.status-label {
    right: 0;
}

.status-label label {
    font-weight: bold;
}

.material label {
    font-weight: bold;
}

.class-description {
    background-color:transparent;
    text-align: center;
    padding: 20px;

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
.class-content {
    width: 100%;
    height: 40%;
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
}
.class-content .containerkelas{
    flex: 1;
    margin: 0 10px 20px;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}
/* Material styles */
.material {
    display: flex;
    align-items: center;
}
.material button {
    width: 200px;
    height: 250px;
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
.material p {
    margin: 0;
}
/* Scrollable containers */
.material-box, .assignment-box {
    max-height: 300px;
    overflow-y: auto;
}
/* Carousel styles */
.carousel {
    display: flex;
    overflow-x: auto;
    scroll-behavior: smooth;
}
.carousel-item {
    flex: 0 0 100%;
}
/* Button styles */
#prevBtn, #nextBtn {
    position: fixed;
    top: 50%;
    background-color:transparent;
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    z-index: 1000;
    height:0px;
}
#prevBtn { left: 10px; }
#nextBtn { right: 10px; }
.upload-form {
    text-align: center;
    margin: 20px auto;
    padding: 20px;
    max-width: 300px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background-color: #f2f2f2;
    display: none; /* Initially hide the form */
}
.upload-form input {
    display:flex;
    
}

.upload-form input[type="file"] {
    margin-bottom: 10px;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
}
.upload-form input[type="textarea"] {
    margin-bottom: 10px;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
}
.upload-form input[type="text"] {
    margin-bottom: 10px;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
}
.upload-form input[type="datetime-local"] {
    margin-bottom: 10px;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.upload-form button[type="submit"] {
    padding: 10px 20px;
    background-color: #007BFF;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.upload-form button[type="submit"]:hover {
    background-color: #0056b3;
}

.toggleFormButton {
    margin-left: 43%;
    margin-top: 20px;
    background-color: #007BFF;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
}

.toggleFormButton:hover {
    background-color: #0056b3;
}


</style>
<body>
    <div class="KELASPAGE">
        <!-- KELASPAGE item 1 -->
        <div class="KELASPAGE-item">
            <div class="class-description">
                <h1><?php echo $res['namaKelas'] ?></h1>
                <div class="teacher">
                    <img src="img/user/<?php echo $res['imgGuru'] ?>" alt="Teacher Photo">
                    <p><?php echo $res['namaGuru'] ?></p>
                </div>
            </div>
                
            <!-- Second Container: Class Material and Assignments -->
            <div class="class-content">
                <div class="containerkelas">
                    <h2>Materi Kelas</h2>
                    <div class="material-box">
                        <?php 
                            $result = mysqli_query($db, "select materi.m_nama as namaMateri, materi.m_id as idMateri from materi
                            join kelas on materi.m_k_id=kelas.k_id
                            where kelas.k_id=".$_GET['idKelas']."");
                            while ($res = mysqli_fetch_assoc($result)) {
        
                                
                                echo "
                                <div class=\"material\">
                                <button onclick=\"window.location.href='material.html'\">
                                    <h3>".$res['namaMateri']."</h3>
                                </button>
                                
                                <p>Description of ".$res['namaMateri']."</p>
                                </div>  
                                ";
                            }
                            
                        ?>
                        
                                            </div>
                    <?php
                    if($_SESSION['us_role']=='guru'){
                        echo "<button class=\"toggleFormButton\">Upload Materi</button>
                        <form class=\"submissionForm\" action=\"upload_materi.php?id=".$_GET['idKelas']."\" method=\"post\" enctype=\"multipart/form-data\" class=\"upload-form\" style=\"display: none;\">
                            <label class=\"required\">Nama Materi:</label>
                            <input type=\"text\" name=\"nama_mat\" id=\"assignmentFile\">
                            <label class=\"required\">Waktu</label>
                            <input type=\"datetime-local\" name=\"waktu\" id=\"assignmentFile\">
                            <label class=\"required\">Deskripsi</label>
                            <input type=\"textarea\" name=\"deskripsi\" id=\"assignmentFile\" >
                            <input type=\"file\" name=\"assignmentFile\" id=\"assignmentFile\" accept=\".pdf,.docx\">
                            <button type=\"submit\">Upload Material</button>
                        </form>";
                    } 
                    ?>
                </div>
            </div>

            <div class="class-content">
                <div class="containerkelas">
                    <h2>Tugas Kelas</h2>
                    <div class="material-box">
                        <?php 
                            $result = mysqli_query($db, "select materi.m_nama as namaMateri,tugas.t_no as noTugas, tugas.t_id as idTugas, DATE_FORMAT(tugas.t_deadline, '%d %M %Y (%H:%i)') as deadlineTugas
                            from tugas
                            join materi on materi.m_id=tugas.t_m_id
                            join kelas on kelas.k_id=materi.m_k_id
                            where kelas.k_id=".$_GET['idKelas'].";");
                            while ($res = mysqli_fetch_assoc($result)) {
                                echo "
                                <div class=\"material\">
                                <button onclick=\"window.location.href='material.html'\">
                                    <h3>Tugas ".$res['noTugas']." ".$res['namaMateri']."</h3>
                                </button>
                                
                                <p>Wajib dikumpulkan sebelum: ".$res['deadlineTugas']."</p>
                                ";
                                if ($_SESSION['us_role']=='siswa') {
                                    echo "<button class=\"toggleFormButton\">Upload Tugas</button>
                                    <form class=\"submissionForm\" action='upload_tugas.php?t_id=".$res['idTugas']."' method=\"post\" enctype=\"multipart/form-data\" class=\"upload-form\" style=\"display: none;\">
                                        <input type=\"file\" name=\"assignmentFile\" id=\"assignmentFile\" accept=\".pdf,.docx\">
                                        <button type=\"submit\">Upload Material</button>
                                    </form>";
                                }
                            }
                        
                        ?>
                        
                        </div>
                    
                </div>
                <?php
                    if($_SESSION['us_role']=='guru'){
                        echo "<button class=\"toggleFormButton\">Upload Tugas</button>
                        <form class=\"submissionForm\" action=\"submit-assignment\" method=\"post\" enctype=\"multipart/form-data\" class=\"upload-form\" style=\"display: none;\">
                            <label class=\"required\">Nama Materi:</label>
                            <input type=\"text\" name=\"nama_mat\" id=\"assignmentFile\" accept=\".pdf,.docx\">
                            <label class=\"required\">Waktu</label>
                            <input type=\"datetime-local\" name=\"waktu\" id=\"assignmentFile\" accept=\".pdf,.docx\">
                            <label class=\"required\">Deskripsi</label>
                            <input type=\"textarea\" name=\"deskripsi\" id=\"assignmentFile\" accept=\".pdf,.docx\">
                            <input type=\"file\" name=\"assignmentFile\" id=\"assignmentFile\" accept=\".pdf,.docx\">
                            <button type=\"submit\">Upload Material</button>
                        </form>";
                    } 
                    ?>
            </div>
        </div>
        

        <!-- Add more KELASPAGE items as needed -->
    </div>
    


    <script> 
document.addEventListener('DOMContentLoaded', function() {
    // Get all elements with the class 'toggleFormButton'
    const toggleFormButtons = document.querySelectorAll('.toggleFormButton');
    
    // Loop through each button
    toggleFormButtons.forEach(function(button) {
        // Add a click event listener to each button
        button.addEventListener('click', function() {
            // Find the corresponding form based on the button's index
            const index = Array.from(toggleFormButtons).indexOf(button);
            const submissionForm = document.querySelectorAll('.submissionForm')[index];
            
            // Toggle the form's visibility
            if (submissionForm.style.display === 'none' || submissionForm.style.display === '') {
                submissionForm.style.display = 'block';
            } else {
                submissionForm.style.display = 'none';
            }
        });
    });
});

</script>
</body>



<?php
include 'layout/footer.php';
?>