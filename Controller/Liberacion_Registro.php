<?php 

include_once "../Model/conexion.php";
include_once "../Controller/sendMailL.php";

session_start();

if (isset($_SESSION['mail'])){
    $conn=new Connection_db();
    
    if ($resultado=$conn->liberacion($_SESSION['mail'],$_POST['calificacion'],$_POST['comentario'])){ //mandamos llamar la fucion de liberacion para que procese la informacion
   
    foreach($resultado as $fila){ //recorrera el resultado para ver el estado del liberacin
    $estado=$fila["estado"];
    $nombre=$fila['Nombre'];
  }   

  if ($estado==0){ //si el resultadi es 0 entoces se le toficara al jefe de sistema 
    sendMailL($nombre);
    }         
        
    echo json_encode(array("estado"=>$estado));   //enviar el resultado para cambio de imagen en el usaurio 
    }

}