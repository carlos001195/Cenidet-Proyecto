<?php 
    include_once "../Controller/sendMailAdmin.php";
    include_once '../Model/conexion.php';
    include_once "../include/banner_tenc.php";

       $con=new Connection_db();

if (!isset($_GET["mail"]) ){
  header ("Location: index.php");
  }
?>

<!doctype html>
<html lang="es">
    <meta http-equiv="content-type" content="text/html; utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 


    <link rel="stylesheet" href="../Source/css/normalize.css">
    <link rel="stylesheet" href="../Source/css/index.css">
  <head>
    <title>Verificacion</title>
  </head>
  <body>
  
  <?php 
    
    

       $mail =trim($_GET["mail"]," \t\n\r\0\x0B");
       $log=strlen($mail);
       

      ?>    

 <div class="content-position">
    <div id="content-status_liberacion" class="content-liberacion">
    <div class="image-status">
    <img  id="img-status" src="../Source/img/loading.gif" >       
                  </div>
                  <div class="div-text-status"> 
                  <span id="menssage-status" >Espere Por favor</span></div>               
             
    <div><a href='Bitacora.php'>Ver Bitácora</a></div>
 </div>



<?php 
if ($log>30){
    ?>
    
    <script>
    function iniciar(){
  
      
    document.querySelector("#content-status_liberacion").insertAdjacentHTML("afterbegin","Error de correo");
    }

    window.onload= iniciar; 
    </script>


     <?php
}
  else {
    $sql=$con->conexion();
    
    $ex=$sql->prepare("CALL Act_Registro('{$mail}')");
    ?>  
<script>
    function iniciar(){
      var comenzar2="<?php 
        if ($ex->execute()){
       
          $result=$ex->fetchAll();
              
          foreach($result as $key=>$fila){
            switch($fila['Asignacion']){
              case 1:
                $mails=new classSendMail($fila['idRegistro'],$fila['Nombre'],$fila['NombreT'],$fila['CorreoT'],$fila['FechaR'],$fila['Area'],$fila['Tipo'],$fila['opcion'],$fila['detalle']);
              
              $mails->mailAdmin  ();
              $mails->mailAdminT ();
                
                   echo  '../Source/img/status-ok.png';
                  $tecnico="Técnico Asignado: {$fila['NombreT']}";
                
                break;
                case 2:
                  echo  '../Source/img/precaucion.png';
                  $tecnico="Solicitud Verificada.";
                  break;
                  case 3:
                    echo  '../Source/img/precaucion.png';
                    $tecnico="Correo no encontrado.";
                    break;
                  
                  case 4:
                    echo  '../Source/img/precaucion.png';
                    $tecnico="Ultima solicitud esta cancelado o Liberado.";
                    break;
                  }
                }
          }
          $con=null;
        $sql=null;
        ?>"; 
        
        var img = document.getElementById("img-status");
        img.setAttribute("src", comenzar2);
        var text = document.getElementById("menssage-status");
        text.innerText="<?php echo $tecnico?>";
  }
    iniciar(); 

</script>
 <?php 
} ?>
</body>
</html>