<?php
    require_once '../databasebroker.php';
    require_once '../model/Kurs.php';

    $naziv = $_POST['naziv'] ?? null;
    $predavaci = $_POST['predavaci'] ?? null;
    $cena = $_POST['cena'] ?? null;

    if ($naziv && $predavaci && $cena) {
        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "../images/".$filename;
        move_uploaded_file($tempname, $folder);

        $kurs = new Kurs(null, $naziv, $_POST['opis'] ?? null, $cena, $filename, $_POST['predavaci'] ?? null);
        $status = Kurs::dodaj($kurs, $conn);

        echo $status ? 'Success' : 'Failed';
    }
?>