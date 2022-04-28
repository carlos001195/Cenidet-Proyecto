<?php
include_once '../Model/conexion.php';

class adminn{

    public  $resultT ;
    
    public  $resultH ;

    function conexion(){
        $conn=new Connection_db();
        return $conn;
    }


    function setListaTecnico(){
        $conexion=$this->conexion();
      $this-> $resultT= $conexion->listaTecnico();
   }    

   function getListaTecnico(){
       return $this->$resultT;
    }



    function añadirTecnico($datos){
        $conexion=$this->conexion();
        $conexion->addTecnico($datos);
    }

    
    function   habilidad(){
        $conexion=$this->conexion();
        $this-> $resultH=$conexion->showHablidad();
        return $this-> $resultH;
    }


 


}


