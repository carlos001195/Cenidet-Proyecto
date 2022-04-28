
<?php

session_start();
include "../Model/conexion.php";
$connect=new Connection_db();
$sql=$connect->conexion();
              

if(!isset($_SESSION['mail'])){
echo "<script> window.location.href='Login.php'; </script>";

}






$EQ='<div class="card"  style="width: 18rem;" value="EQUIPO DE COMPUTO" >
    <div><img class="card-img-top" src="../Source/img/PC.jpg" alt="Card image cap">
    <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseequipo" aria-expanded="false" aria-controls="flush-collapseOne">
      EQUIPO DE CÓMPUTO Y SOFTWARE
      </button>
    </h2>
    <div id="flush-collapseequipo" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
      <div class="form-check">
      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
      <label class="form-check-label" for="flexRadioDefault2">
      Ruidos extraños.
      </label>
      </div>
       <div class="form-check">
      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
      <label class="form-check-label" for="flexRadioDefault2">
      Se bloquea el sistema o se reinicia.
      </label>
      </div>               
       <div class="form-check">
      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
      <label class="form-check-label" for="flexRadioDefault2">
      No funcionan las aplicaciones.
      </label>
      </div>               
      </div> 
    </div>
  </div>
   </div>
     <div>
       <input class="boton_personalizado" id="b1" type="button" value="Solicitar" >
    </div>
  </div>

';


$IP='<div class="card"  style="width: 18rem;" value="IMPRESORA">
    <div> <img src="../Source/img/impre.png">

    <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseimpresora" aria-expanded="false" aria-controls="flush-collapseOne">
      IMPRESORA
      </button>
    </h2>

    <div id="flush-collapseimpresora" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
      <!-- -->

      <div class="form-check">
      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">  Se atoro el papel.
  </label>
  </div>

  <div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
  <label class="form-check-label" for="flexRadioDefault2">
  No enciende.
  </label>
    </div>


    <div class="form-check">
    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
    <label class="form-check-label" for="flexRadioDefault2">  
    Mancha las hojas.
    </label>
    </div>     
    
    

    <div class="form-check">
    
    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
    <label class="form-check-label" for="flexRadioDefault2">
    No funciona en red.
    </label>
    </div>

       </div>
        </div>
        </div>
        
        </div>
     <div>
        <input class="boton_personalizado" id="b1" type="button" value="Solicitar">
    </div>
  </div>
';


/*-------------------------------------------------------------------------------------- */
$IT='<div class="card"  style="width: 18rem;" value="INTERNET">
    <div> <img src="../Source/img/INTERNET.png">

  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsetelefonia" aria-expanded="false" aria-controls="flush-collapseOne">
      INTERNET Y TELEFONÍA
      </button>
    </h2>

    <div id="flush-collapsetelefonia" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">


      <div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
  El equipo no se conecta a internet.
  </label>
  </div>

  <!--    --><div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
  <label class="form-check-label" for="flexRadioDefault2">
  No puedo descargar documentos de Internet.
  </label>
    </div>


    <div class="form-check">
    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
    <label class="form-check-label" for="flexRadioDefault2">
    
    No hay línea telefónica.
    </label>
    </div>     
    
    

    <div class="form-check">
    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
    <label class="form-check-label" for="flexRadioDefault2">
    No tengo acceso a números externos.
    </label>
    </div>
            
      
    </div>
  </div>
  </div>

   </div>
     <div>
        <input class="boton_personalizado" id="b1" type="button" value="Solicitar">
    </div>
  </div>';
/*--------------------------------------------------------------------------------------- */
$WB='<div class="card"  style="width: 18rem;" value="SERVICIO WEB">
    <div> <img src="../Source/img/web y correo.jpg">

  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseServicioweb" aria-expanded="false" aria-controls="flush-collapseOne">
      SERVICIOS WEB Y CORREO ELECTRÓNICO
      </button>
    </h2>

    <div id="flush-collapseServicioweb" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">

    

  <div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
  Problemas con el portal web.
  </label>
    </div>

    <div class="form-check">
    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
    <label class="form-check-label" for="flexRadioDefault2">
    Actualización de información en el portal web.
    </label>
    </div>


    <div class="form-check">
    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
    <label class="form-check-label" for="flexRadioDefault2">
    
    Problemas con cuenta de correo.
    </label>
    </div>     
    

    <div class="form-check">
    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
    <label class="form-check-label" for="flexRadioDefault2">
    Actualizacion de datos en cuenta de correo.
    </label>
     </div>  
    
    </div>
  </div>
  </div>

   </div>
     <div>
        <input class="boton_personalizado" id="b1" type="button" value="Solicitar">
    </div>
</div>';
 /*--------------------------------------------------------------------------------------- */
$SI='<div class="card" style="width: 18rem;"value="SII">
    <div>   <img src="../Source/img/SII.png">

  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSii" aria-expanded="false" aria-controls="flush-collapseOne">
      SII
      </button>
    </h2>

    <div id="flush-collapseSii" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">

    

      <div class="form-check">
    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
    <label class="form-check-label" for="flexRadioDefault1">
    Problemas de inicio sesión.
    </label>
    </div>

    <div class="form-check">
    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
    <label class="form-check-label" for="flexRadioDefault2">
    Servidor caido.
    </label>
    </div>


    <div class="form-check">
    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
    <label class="form-check-label" for="flexRadioDefault2">
    
    Modificación a módulos del sistema.
    </label>
    </div>     
    
    

    <div class="form-check">
    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
    <label class="form-check-label" for="flexRadioDefault2">
    
    Modificación de reportes.
    </label>
    </div>                 
      
    </div>
  </div>
  </div>

   </div>
     <div>
        <input class="boton_personalizado" id="b1" type="button" value="Solicitar">
    </div>
  </div>
';
/*----------------------------------------------------------------------------------------- */
$OT='<div class="card"style="width: 18rem;" value="OTRO">
    <div>
  <h4>Si el problema no se esta disponible en las tarjetas, favor de redactar  a continuación.</h4>
  
    </div>
    <div>
    <textarea id="text" class="textarea" placeholder="Espacio de texto para redactar."></textarea></li>
  
    <input class="boton_personalizado" type="button" id="b6" value="Solicitar">
    </div>
</div>';
?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Menu de Solicitudes</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" type="img/jpg" href="../Source/img/icon.jpg">
    <link rel="stylesheet" href="../Source/css/normalize.css">
    <link rel="stylesheet" href="../Source/css/menus.css">
    
</head>

<body>
<script src="../Controller/js/jquey.js"></script>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<div  class="accordion accordion-flush " id="accordionFlushExample">
    <div class="container" >
 
<?php        
                         /* LISTA PREDETERMINDAD*/

                    $lisT=array($EQ=>"EQUIPO DE COMPUTO",
                    $IP=>"IMPRESORA",$IT=>"INTERNET",
                    $WB=>"SITIO WEB",$SI=>"SII",
                    $OT=>"OTRO");
                          $arrayn=array();/*ARRAY PARA TIPO DE SOLCITUD ENCONTRADA */
                    $resul=$sql->prepare("SELECT tipoS as tipo from registro   where activacion=1 group by tipoS order by count(tipos) desc");
                    $resul->execute();
                     
                    $result=$resul->fetchAll();
               
                    if ($result>0){
                        
                   foreach($result as $fila){   //resultado de la base de datos           
                        foreach($lisT as $clave => $valor){ /* RECORRER LA LISTA PREDERTEMINADA COMPRARANDO LA COSULTA PARA QUE SE ORDENE DE LA MAS SOLICITADO O POCO */                    
                            
                            if ($valor==strtoupper($fila["tipo"])){
                     
                                   echo $clave;
                                     array_push($arrayn,$clave);
                                        break;                 
                                }                       
                                 }
                    }  // vemos que problemas no se vieron en la base de detos
                      $arrayF= array_diff(array_keys($lisT),$arrayn);    /* RECORRERAR OTRAS SOLITUDES SI NO FUERON ENCONTRADO EN LA BD */      
                    foreach($arrayF as $clav){
                      echo $clav;
                    }
                    $sql=null;
                    $connect=null;
               } 
                else {  /// si no hay  registro en l base de datos
               $arrayF= array_diff(array_keys($lisT),$arrayn);    /* RECORRERAR OTRAS SOLITUDES SI NO FUERON ENCONTRADO EN LA BD */      
                    foreach($arrayF as $clav){
                      echo $clav;
                    }           }
          
?>



</div><!-- acordeon-->
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">
       Aqui puede explicar mejor  su problema:</label>
          
          </div>
          <div class="form-group">
            <textarea class="form-control" id="message-text"  placeholder="Espacio de texto para redactar."></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="Cerrar" class="btn btn-primary" data-dismiss="modal">Enviar</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    
<script src="../Controller/js/cards2.js"> </script>


</body>
</html>