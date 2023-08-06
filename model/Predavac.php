<?php

class Predavac{

    private $id;
    private $imePrezime;
 


    public function __construct($id=null, $imePrezime=null )
    {
        $this->id=$id;
        $this->imePrezime =$imePrezime;
        
 
    }
 

    public static function vratiSve($conn){
        $upit = " select * from predavac";
       
        return $conn->query($upit); 
    }

 
 
   

}


?>