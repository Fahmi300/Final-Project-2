<?php
require_once("config.php");

// Fetch class data from the database
if ($_SESSION['us_role']=='guru') {
    $classData = [];
    $classQuery = "select kelas.k_nama as namaKelas,materi.m_nama as namaMateri,DATE_FORMAT(materi.m_jadwal, '%Y/%m/%d (%H:%i)') as waktu from materi
    join kelas on materi.m_k_id=kelas.k_id
    join guru on guru.g_id=kelas.k_g_id
    join user on user.us_id=guru.g_us_id
    where materi.m_jadwal > NOW() and user.us_id=".$_SESSION['us_id'].";"; // Replace with your table name
    $classResult = mysqli_query($db, $classQuery);

    if (mysqli_num_rows($classResult) > 0) {
        while ($row = mysqli_fetch_assoc($classResult)) {
            $classData[] = $row;
        }
    }
} else {
    $classData = [];
    $classQuery = "select kelas.k_nama as namaKelas,materi.m_nama as namaMateri,DATE_FORMAT(materi.m_jadwal, '%Y/%m/%d (%H:%i)') as waktu from materi
    join kelas on materi.m_k_id=kelas.k_id
    join partisipasi_kelas on kelas.k_id=partisipasi_kelas.k_id
    join siswa on siswa.s_id=partisipasi_kelas.s_id
    join user on user.us_id=siswa.s_us_id
    where materi.m_jadwal > NOW() and user.us_id=".$_SESSION['us_id'].";"; // Replace with your table name
    $classResult = mysqli_query($db, $classQuery);

    if (mysqli_num_rows($classResult) > 0) {
        while ($row = mysqli_fetch_assoc($classResult)) {
            $classData[] = $row;
        }
    }
}


// Fetch task data from the database
$taskData = [];
$taskQuery = "select kelas.k_nama as namaKelas,materi.m_nama as namaMateri,DATE_FORMAT(materi.m_jadwal, '%Y/%m/%d (%H:%i)') as waktu 
from tugas
join materi on tugas.t_m_id=materi.m_id
join kelas on materi.m_k_id=kelas.k_id
join partisipasi_kelas on kelas.k_id=partisipasi_kelas.k_id
join siswa on siswa.s_id=partisipasi_kelas.s_id
join user on user.us_id=siswa.s_us_id
where materi.m_jadwal > NOW() and user.us_id=".$_SESSION['us_id'].";"; // Replace with your table name
$taskResult = mysqli_query($db, $taskQuery);

if (mysqli_num_rows($taskResult) > 0) {
    while ($row = mysqli_fetch_assoc($taskResult)) {
        $taskData[] = $row;
    }
}

mysqli_close($db);
?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        
        function createCards(dataArray, containerId) {
            const container = document.getElementById(containerId);
            
            dataArray.forEach(item => {
                const cont = document.createElement('div');
                cont.style.position = 'relative';
                cont.style.backgroundImage = 'url(img/pelajaran/bgHist.jpg)';
                cont.style.backgroundSize = 'cover';
                cont.style.backgroundRepeat = 'no-repeat';
                container.appendChild(cont);

                const div = document.createElement('p');
                div.innerHTML = `${item.namaMateri || item.namaTugas}<br> ${item.waktu || item.name}`;
                div.style.fontSize = '12px';

                const p = document.createElement('p');
                p.textContent = `${item.namaKelas || item.due}`;

                cont.appendChild(p);
                cont.appendChild(div);
            });
        }

        const classes = <?php echo json_encode($classData); ?>;
        const tasks = <?php echo json_encode($taskData); ?>;

        createCards(classes, 'class-cards');
        createCards(tasks, 'task-cards');
        

        window.scrollCarousel = function(carouselId, direction) {
            const carousel = document.getElementById(carouselId);
            const track = carousel.querySelector('.carousel-track');
            const cardSize = track.querySelector('div').clientWidth;
            
            // Get the current transform value, or default to 0 if none set yet
            const currentTransform = track.style.transform ? parseInt(track.style.transform.match(/-?\d+/)[0]) : 0;
            
            const numCardsVisible = Math.floor(track.clientWidth / cardSize);
            let scrollAmount = direction === 'right' ? currentTransform - (cardSize * numCardsVisible) : currentTransform + (cardSize * numCardsVisible);
            
            // Ensure that the track doesn't go out of bounds
            const maxScroll = 0;
            const minScroll = -(track.scrollWidth - track.clientWidth);
            if (scrollAmount > maxScroll) {
                scrollAmount = maxScroll;
            } else if (scrollAmount < minScroll) {
                scrollAmount = minScroll;
            }
            
            track.style.transform = `translateX(${scrollAmount}px)`;
        };
    });
</script>
