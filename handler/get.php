<?php
    include '../databasebroker.php';
    include '../model/Kurs.php';


    if(isset($_POST['prikazid'])) {
        $response = array();
        $rez = Kurs::vratiJedan($_POST['prikazid'], $conn);
        $red = mysqli_fetch_assoc($rez);
        
        if ($red) {
        $response = $red;
        echo json_encode($response);
        } else {
        $response['status'] = 200;
        $response['message'] = "Data not found";
        echo json_encode($response);
        }
        }

 
  

?>