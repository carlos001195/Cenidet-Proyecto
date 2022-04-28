<?php

include_once '../Model/conexion.php';

$conn=new Connection_db();
?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="../Source/css/normalize.css">
<link rel="stylesheet" href="../Source/css/index.css">
    <title>Asignacion</title>
</head>
<body>
    
<?php include "../include/banner_tenc.php";?>

<div class="content-position">
    <div id="content-status_liberacion" class="content-liberacion">
    <div class="image-status">
    <img  id="img-status" src="../Source/img/loading.gif" >       
                  </div>
                  <div class="div-text-status"> 
                  <span id="menssage-status" >Espere Por favor</span></div>               
             
    <div><a href='index.php'>Index</a></div>
 </div>

<script>
   let img=document.getElementById("img-status");

let text=document.getElementById("menssage-status");

function iniciar(){
    var verificar= "<?php  
        if (isset($_GET['solicitud'])){
            
                $Conexion=$conn->conexion();
            
                $id =trim($_GET["solicitud"]," \t\n\r\0\x0B");  //quitamos los espacio que pueda traer
                // se prepara el query y se ejecuta, si no hay error en la conexion se be actulizar  el estado si esta en asignacion, 
                $quey=$Conexion->prepare("UPDATE registro SET statusS='En proceso' WHERE idRegistro={$id} AND statusS in ('Asignado')");
               if ( $quey->execute()){
                    echo "true";
               }else{
                echo "false";
               }
            ?>"

 
if (verificar=="true"){
    img.setAttribute("src","../Source/img/status-ok.png");
    text.innerText="Asignacion de proceso";
}else {
    img.setAttribute("src","../Source/img/status-error.png");
    text.innerText="Error de asignacion de proceso";
}

}
    window.onload = iniciar;

</script>

<?php

    $quey=null;
    $Conexion=null;
}else{
    header ("Location:index.php");

}?>

</body>
</html>
