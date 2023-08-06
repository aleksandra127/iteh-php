<?php
    require_once '../databasebroker.php';
    require_once '../model/Kurs.php';

    $deleteid = $_POST['deleteid'] ?? null;
    if ($deleteid) {
        $result = Kurs::obrisi($deleteid, $conn);
        echo $result ? 'Success' : 'Failed';
    }
?>