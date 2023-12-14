<?php
require_once("config.php");

if(isset($_POST['send'])){
    $idPenerima = mysqli_real_escape_string($db, $_POST['targetID']);
    $idPengirim = mysqli_real_escape_string($db, $_POST['userID']);
    $isiMessage = mysqli_real_escape_string($db, $_POST['message']);
    if((isset($idPenerima)) && (isset($idPengirim)) && (isset($isiMessage))){
        
        $result = mysqli_query($db, "INSERT INTO pesan (p_us_1_id, p_us_2_id, p_isipesan) VALUES ($idPenerima, $idPengirim, '$isiMessage');");
    }


    header("Location: komunikasi.php?targetID=$idPenerima&userID=$idPengirim");
}

?>