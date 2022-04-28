<?php
require "../Model/conexion.php";

$conexion=new Connection_db();



if (isset($_POST['Nombre'],$_POST['ApellidoP'],$_POST['ApellidoM'],$_POST['Mail'])){
    $datos=array();
    array_push($datos,$_POST['Nombre'],$_POST['ApellidoP']
    ,$_POST['ApellidoM'],$_POST['Mail']);
    $resultado=$conexion->insertarTecnico($datos);

    echo json_encode($resultado);
 
 
}

if (isset($_POST['idT'], $_POST['habilidad'] ,$_POST['prioridad']))
{
    $datos=array();
    array_push($datos,$_POST['idT'], $_POST['habilidad'] ,$_POST['prioridad']);

    
    $resultado=$conexion->insertartHabilidad($datos);

   echo json_encode($resultado);
 

}


if (isset($_POST['idTec']) ){

    $id=$_POST['idTec'];
    $resultado=$conexion->showHablidad($id);
    if ($resultado!=null){
    
        foreach($resultado as $fila){
           echo $consulta= "<tr value='{$fila['idHabilidad']}'>
                      <td>{$fila['Habilidad']}</td>
                      <td>{$fila['Prioridad']}</td>
                      <td><a class='eventEliminar btn btn-danger'>Eliminar</a></td></tr>";
    
    }
     }
    else {
        echo "error";    
    
    }
    
    } 
      
    
    
    if (isset($_POST['idHab'])){ //eliminar habilidad
             
        if ($conexion->statusEliminarHabilidad($_POST['idHab'])){

   echo         json_encode(array("success"=>true));
        }else{
            echo       json_encode(array("success"=>false));
            
        }
    }    

    if (isset($_POST['idTD'])){ //elimnar tecnico y habilida
             
        if ($conexion->EliminarTecnico($_POST['idTD'])){
            echo         json_encode(array("success"=>true));

        }else{
            echo       json_encode(array("success"=>false));
            
        }
    }    



    if (isset($_POST['idTDU'])){ //elimnar tecnico y habilida
             
        if ($conexion->ActulizarDatosTecnico($_POST['idTDU'], $_POST['Correo'], intval($_POST['estado']) )){
            echo  json_encode(array("success"=>true));
        }else{
            echo  json_encode(array("success"=>false));
        }
    }    


 
    