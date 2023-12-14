<?php
include 'config.php';
?>
<a href="login.php"><button>Kembali</button></a>

<h1>USER</h1>
<table border="1">
    <thead>
        <tr>
            <th>User ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Email</th>
            <th>Role</th>
            <th>Foto</th>
            <th>Tindakan</th>
        </tr>
    </thead>
<tbody>

        <?php
        $sql = "SELECT * FROM user";
        $query = mysqli_query($db, $sql);
        

        while($siswa = mysqli_fetch_array($query)){
            echo "<tr>";

            echo "<td>".$siswa['us_id']."</td>";
            echo "<td>".$siswa['us_username']."</td>";
            echo "<td>".$siswa['us_password']."</td>";
            echo "<td>".$siswa['us_email']."</td>";
            echo "<td>".$siswa['us_role']."</td>";
            echo "<td><img src='img/user/".$siswa['us_image']."' width='100' height='100'></td>";


            echo "<td>";
            echo "<a href='form-edit.php?us_id=".$siswa['us_id']."'>Edit</a> | ";
            echo "<a href='hapus.php?us_id=".$siswa['us_id']."'>Hapus</a>";
            echo "</td>";

            echo "</tr>";

        }
        ?>

    </tbody>
</table>
<p>Total: <?php echo mysqli_num_rows($query) ?></p>

<h1>SISWA</h1>
<table border="1">
    <thead>
        <tr>
            <th>Siswa ID</th>
            <th>Nama</th>
            <th>Usia</th>
            <th>JenisKel</th>
            <th>Alamat</th>
            <th>Kontak</th>
            <th>Akun</th>
            <th>Tindakan</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM siswa s JOIN user u ON s.s_us_id = u.us_id";
        $query = mysqli_query($db, $sql);
        while($siswa = mysqli_fetch_array($query)){
            echo "<tr>";
            echo "<td>".$siswa['s_id']."</td>";
            echo "<td>".$siswa['s_nama']."</td>";
            echo "<td>".$siswa['s_usia']."</td>";
            echo "<td>".$siswa['s_jk']."</td>";
            echo "<td>".$siswa['s_alamat']."</td>";
            echo "<td>".$siswa['s_kontak']."</td>";
            echo "<td>".$siswa['us_username']."</td>";
            echo "<td>";
            echo "<a href='form-edit.php?s_id=".$siswa['s_id']."'>Edit</a> | ";
            echo "<a href='hapus.php?s_id=".$siswa['s_id']."'>Hapus</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>

    </tbody>
</table>
<p>Total: <?php echo mysqli_num_rows($query) ?></p>

<h1>GURU</h1>
<table border="1">
    <thead>
        <tr>
            <th>Guru ID</th>
            <th>Nama</th>
            <th>Usia</th>
            <th>JenisKel</th>
            <th>Alamat</th>
            <th>Kontak</th>
            <th>Akun</th>
            <th>Tindakan</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM guru g JOIN user u ON g.g_us_id = u.us_id ";
        $query = mysqli_query($db, $sql);
        while($siswa = mysqli_fetch_array($query)){
            echo "<tr>";
            echo "<td>".$siswa['g_id']."</td>";
            echo "<td>".$siswa['g_nama']."</td>";
            echo "<td>".$siswa['g_usia']."</td>";
            echo "<td>".$siswa['g_jk']."</td>";
            echo "<td>".$siswa['g_alamat']."</td>";
            echo "<td>".$siswa['g_kontak']."</td>";
            echo "<td>".$siswa['us_username']."</td>";
            echo "<td>";
            echo "<a href='form-edit.php?g_id=".$siswa['g_id']."'>Edit</a> | ";
            echo "<a href='hapus.php?g_id=".$siswa['g_id']."'>Hapus</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>

    </tbody>
</table>
<p>Total: <?php echo mysqli_num_rows($query) ?></p>

<h1>WALI</h1>
<table border="1">
    <thead>
        <tr>
            <th>Wali ID</th>
            <th>Nama</th>
            <th>Sebagai</th>
            <th>Kontak</th>
            <th>Siswa</th>
            <th>Akun</th>
            <th>Tindakan</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT w.w_id,w.w_nama,w.w_sebagai, w.w_kontak,s.s_nama, u.us_username FROM wali w JOIN siswa s ON w.w_s_id = s.s_id JOIN user u ON w.w_us_id = u.us_id";
        $query = mysqli_query($db, $sql);
        while($siswa = mysqli_fetch_array($query)){
            echo "<tr>";
            echo "<td>".$siswa['w_id']."</td>";
            echo "<td>".$siswa['w_nama']."</td>";
            echo "<td>".$siswa['w_sebagai']."</td>";
            echo "<td>".$siswa['w_kontak']."</td>";
            echo "<td>".$siswa['s_nama']."</td>";
            echo "<td>".$siswa['us_username']."</td>";
            echo "<td>";
            echo "<a href='form-edit.php?w_id=".$siswa['w_id']."'>Edit</a> | ";
            echo "<a href='hapus.php?w_id=".$siswa['w_id']."'>Hapus</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>

    </tbody>
</table>
<p>Total: <?php echo mysqli_num_rows($query) ?></p>

<h1>PELAJARAN</h1>
<table border="1">
    <thead>
        <tr>
            <th>Pelajaran ID</th>
            <th>Nama Pelajaran</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM pelajaran";
        $query = mysqli_query($db, $sql);
        while($siswa = mysqli_fetch_array($query)){
            echo "<tr>";
            echo "<td>".$siswa['p_id']."</td>";
            echo "<td>".$siswa['p_nama']."</td>";

            echo "<td>";
            echo "<a href='form-edit.php?p_id=".$siswa['p_id']."'>Edit</a> | ";
            echo "<a href='hapus.php?p_id=".$siswa['p_id']."'>Hapus</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>

    </tbody>
</table>
<p>Total: <?php echo mysqli_num_rows($query) ?></p>


<h1>KELAS</h1>
<table border="1">
    <thead>
        <tr>
            <th>Kelas ID</th>
            <th>Nama</th>
            <th>Jadwal</th>
            <th>Guru</th>
            <th>Siswa</th>
            <th>Pelajaran</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM kelas k JOIN guru g ON k.k_g_id = g.g_id JOIN siswa s ON k.k_s_id = s.s_id JOIN pelajaran p ON k.k_p_id = p.p_id";
        $query = mysqli_query($db, $sql);
        while($siswa = mysqli_fetch_array($query)){
            echo "<tr>";
            echo "<td>".$siswa['k_id']."</td>";
            echo "<td>".$siswa['k_nama']."</td>";
            echo "<td>".$siswa['k_jadwal']."</td>";
            echo "<td>".$siswa['g_nama']."</td>";
            echo "<td>".$siswa['s_nama']."</td>";
            echo "<td>".$siswa['p_nama']."</td>";

            echo "<td>";
            echo "<a href='form-edit.php?k_id=".$siswa['k_id']."'>Edit</a> | ";
            echo "<a href='hapus.php?k_id=".$siswa['k_id']."'>Hapus</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>

    </tbody>
</table>
<p>Total: <?php echo mysqli_num_rows($query) ?></p>


<h1>MATERI</h1>
<table border="1">
    <thead>
        <tr>
            <th>kelas</th>
            <th>Materi ID</th>
            <th>Nama Materi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM materi m JOIN kelas k ON m.m_k_id = k.k_id ORDER BY k.k_id";
        $query = mysqli_query($db, $sql);
        while($siswa = mysqli_fetch_array($query)){
            echo "<tr>";
            echo "<td>".$siswa['k_nama']."</td>";
            echo "<td>".$siswa['m_id']."</td>";
            echo "<td>".$siswa['m_nama']."</td>";

            echo "<td>";
            echo "<a href='form-edit.php?m_id=".$siswa['m_id']."'>Edit</a> | ";
            echo "<a href='hapus.php?m_id=".$siswa['m_id']."'>Hapus</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>

    </tbody>
</table>
<p>Total: <?php echo mysqli_num_rows($query) ?></p>