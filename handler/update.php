<?php
    require_once '../databasebroker.php';
    require_once '../model/Kurs.php';

    $naziv = $_POST['naziv2'] ?? null;
    $predavaci = $_POST['predavaci2'] ?? null;
    $cena = $_POST['cena2'] ?? null;

    if ($naziv && $predavaci && $cena) {
        $filename = null;
        if ($_FILES["uploadfile2"]["name"] !== "") {
            $filename = $_FILES["uploadfile2"]["name"];
            $tempname = $_FILES["uploadfile2"]["tmp_name"];
            $folder = "../images/".$filename;
            move_uploaded_file($tempname, $folder);
        } else {
            $filename = $_POST['sakrivenoPolje2'];
        }

        $kurs = new Kurs($_POST['sakrivenoPolje'], $naziv, $_POST['opis2'] ?? null, $cena, $filename, $predavaci);
        $status = Kurs::azuriraj($kurs, $conn);

        echo $status ? 'Success' : 'Failed';
    }
?>