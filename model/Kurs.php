<?php

class Kurs{

    private $id;
    private $naziv;
    private $opis; 
 
    private $cena;
    private $slika;
    private $predavac;


    public function __construct($id=null, $naziv=null, $opis=null,$cena=null,$slika=null, $predavac=null)
    {
        $this->id=$id;
        $this->naziv=$naziv;
        $this->opis=$opis;       
        $this->cena=$cena;
        $this->slika=$slika;
        $this->predavac=$predavac;
    }




    
    public static function dodaj($obj, $conn){
        $upit = "insert into kurs (naziv,opis,predavac,cena,slika) values ('$obj->naziv','$obj->opis','$obj->predavac',$obj->cena,'$obj->slika')";
        
        return $conn->query($upit); 

    }

    public static function vratiSve($conn){
        $upit = " select * from kurs k join predavac p on k.predavac= p.id_predavac";
       
        return $conn->query($upit); 
    }

 
    public static function vratiJedan($id,$conn){
        $upit = " select * from  kurs k join predavac p on k.predavac= p.id_predavac where id=$id";
       
        return $conn->query($upit); 
    }

    public static function obrisi($id, $conn){
        $upit = " delete from  kurs where id=$id";
       
        return $conn->query($upit); 
    }


    public static function azuriraj($obj,$conn){

        $upit = "update kurs set cena=$obj->cena,naziv='$obj->naziv',opis='$obj->opis',slika='$obj->slika',predavac=$obj->predavac where id=$obj->id ";

        return $conn->query($upit); 

    }

   

}


?>