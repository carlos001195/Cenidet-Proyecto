<?php

use FFI\Exception;
class Connection_db{



function conexion(){

  
    try {
      $conn = new PDO("mysql:hostname={$_SERVER['SERVER_NAME']};dbname=solicitud;","cenidet", "EYJmqDCWYuq6ASt");
      
      
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
      return $conn ;
    } catch(PDOException $e) {
   //echo "Connection failed: " . $e->getMessage();
   die "Error en la conexion a la base de datos";
    }
    return null;
}

  // funciones para el solitate 
  #1 verificar si el correo del estudiante o empleado esta en la base de datos
function VereficarMailSolicitante($mail):bool{
   $conexion =$this->conexion();


    $smtp=$conexion->prepare("CALL Verficacion_Correo('{$mail}')" );

      $smtp->execute();
      $result=$smtp->fetchall();

    foreach($result as $fila){
      if ($fila['estado']==1){
        $smtp=null;                  
        $conexion=null;
        return true;
      }

    }
   
    $smtp=null;                  
    $conexion=null;
    return false;

}


#2 mostramos la lista de solitudes activadas
function ListaBitacora(){
  $conexion =$this->conexion();
  

 $smtp=$conexion->prepare('call Bitacora()')  ;

  $smtp->execute();
  $result=$smtp->fetchall(PDO::FETCH_ASSOC);
  
  $smtp=null;
 $conexion=null;
  return $result;

}
#3 Registrar solucitud
function registration_request($CorreoUsuario,$tipo_solictud,$opcion,$detalles){
          $conexion=$this->conexion();
        
       $consult="CALL registro('{$CorreoUsuario}','{$tipo_solictud}','{$opcion}','{$detalles}');";
        $smtp = $conexion->prepare($consult);
       
        
        if($smtp->execute()){

  $smtp=null;
  $conexion=null;

        return true;
        }
        
        
        $smtp=null;
        $conexion=null;
        return false;

}

function liberacion($correo,$calif,$Comentario){
    $conexion=$this->conexion();
    $consult="CALL Liberacion(?,?,?)";
    $smtp= $conexion->prepare($consult);

    $smtp->bindParam(1,$correo);
    $smtp->bindParam(2,$calif);
    $smtp->bindParam(3,$Comentario);
      try{   
          $smtp->execute();
          $result=$smtp->fetchAll(PDO::FETCH_ASSOC);

      }catch(Exception $e){
          echo $e;
      }

      $smtp=null;
      $conexion=null;

      return $result;
  
}

/* se puso despues de arreglar el index */
function listaTecnico(){
  $conexion=$this->conexion();
  $smtp=$conexion->prepare("SELECT * FROM tecnico ");

  $smtp->execute();  
  $result=$smtp->fetchAll(PDO::FETCH_ASSOC);
  $smtp=null;
  $conexion=null;
 
  return  $result;
}

function addTecnico($datos){
  $conexion=$this->conexion();
  $smtp=$conexion->prepare("INSERT INTO tecnico (Nombre,ApellidoP,ApellidoM,Correo) 
  values('{$datos[0]}','{$datos[1]}','{$datos[2]}','{$datos[3]}')");

  if ($smtp->execute()){
    $smtp=null;
    $conexion=null;
   
    return true;
  } 
  $smtp=null;
  $conexion=null;
 
  return  false;
}

function showHablidad($id){
  $conexion=$this->conexion();
  $smtp=$conexion->prepare("SELECT * FROM habilidad where idTecnico={$id}");

  $smtp->execute();  
  $result=$smtp->fetchAll(PDO::FETCH_ASSOC);
  $smtp=null;
  $conexion=null;
  return  $result;
}

function statusEliminarHabilidad($id){
  $conexion=$this->conexion();
  $smtp=$conexion->prepare("DELETE FROM habilidad where idHabilidad={$id}");

  if ( $smtp->execute()){
    $smtp=null;
    $conexion=null;
    return true;
  }  
  $smtp=null;
  $conexion=null;
  return  false;
}

function insertarTecnico($datos){
  $conexion=$this->conexion();

  $smtp=$conexion->prepare("INSERT INTO tecnico(Nombre,ApellidoP,ApellidoM,Correo) 
  values('{$datos[0]}','{$datos[1]}','{$datos[2]}','{$datos[3]}')");

      if ( $smtp->execute()){
      $smtp2=$conexion->prepare("SELECT MAX(idTecnico) as idtecnico from tecnico");
          if ($smtp2->execute()){
            $result=$smtp2->fetchAll(PDO::FETCH_ASSOC);
            
            $smtp=null;
            $smtp2=null;
            $conexion=null;
            return $result;
          }

      }


}

function insertartHabilidad($datos){
  $conexion=$this->conexion();

  $smtp=$conexion->prepare("INSERT INTO habilidad(idTecnico,Habilidad,Prioridad) 
  values({$datos[0]},'{$datos[1]}',{$datos[2]})");

      if ( $smtp->execute()){

      $smtp2=$conexion->prepare("SELECT MAX(idHabilidad) as idhabilidad from habilidad");
          if ( $smtp2->execute()){
            $result2=$smtp2->fetchAll(PDO::FETCH_ASSOC);
                $smtp=null;
                $smtp2=null;
                $conexion=null;

                
            return $result2;
          }

      } 
}

function EliminarTecnico($idt){
  $conexion=$this->conexion();

  $smtp=$conexion->prepare("DELETE from habilidad ha where ha.idTecnico={$idt}");

      if ( $smtp->execute()){

      $smtp2=$conexion->prepare("DELETE from tecnico tec where tec.idTecnico={$idt}");

          if ( $smtp2->execute()){
                $smtp=null;
                $smtp2=null;
                $conexion=null;
               
            return true;
          }

      } 
}

function ActulizarDatosTecnico($id,$correo,$status){
  $conexion=$this->conexion();
  
  if (empty($correo)){
    $smtp=$conexion->prepare("UPDATE tecnico set status={$status} where idTecnico={$id}");
  }else{
    $smtp=$conexion->prepare("UPDATE tecnico set Correo='{$correo}', status=1 where idTecnico={$id}");
  }
   

  if ( $smtp->execute()){
    $smtp=null;
    $conexion=null;
  }
    
  return true;
     }


}
