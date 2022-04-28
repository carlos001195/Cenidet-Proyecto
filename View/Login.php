<?php
session_start();

if (isset($_SESSION['mail'])){
session_destroy();
}
?>
<!DOCTYPE html>
<html lang="es">
<meta http-equiv="content-type" content="text/html; utf-8">
<head>

  
    <meta charset="UTF-8">
    <title>Login / Sistema Solicitudes de Servicio</title>
    
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../Source/css/normalize.css">
    
    <link rel="stylesheet" href="../Source/css/login.css">
    
    <link rel="stylesheet" href="../Source/css/circleLoad.css">
    
</head>
<body>
<script src="../Controller/js/jquey.js"></script>


    <div class="log-main">
        <div class="container-form">

            <div class="item">
            </div>

           
                    <div class="item"> 
                        <div class="header_mail"> BIENVENIDO</div>

                                             
                        <div class="input-mail"  >
                        <form  id="form" method="post"
                        enctype="multipart/form-data" utocomplete="off">   
                        <input type="mail" name="mail" 
                         placeholder="Ingrese Correo"
                        oninput="this.value = this.value.toLowerCase()" ></div>
                        <div class="aling-circle vis-circle-no" id="circle-load"> 
                            <div class="lds-roller" ><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                        </div>

                        <input  type="button" id="submi" value="ENTRAR"  class="idbutton">
                        </form>                 
            </div>
        </div>
    </div>      
    

                                                                  
<script >
  const clickSend = document.getElementById("submi");
  const divLoad =   document.getElementById("circle-load");
clickSend.addEventListener('click', function(e) {
    e.preventDefault();
query();
  });

function query(){
    clickSend.classList.replace("idbutton", "idbutton-no");
    divLoad.classList.replace("vis-circle-no","vis-circle");
   
    $.ajax({
        url: "../Controller/validar.php",
        type:"POST",
        data:$("#form").serialize(),
        timeout:8000,
      
        success: function(result) {
            var json = JSON.parse(result);

            if (json.success == true) {
                window.location.assign("../View/cards.php");
             } else {
            clickSend.classList.replace( "idbutton-no","idbutton");
            divLoad.classList.replace("vis-circle","vis-circle-no");
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            clickSend.classList.replace( "idbutton-no","idbutton");
            divLoad.classList.replace("vis-circle","vis-circle-no");        
        }
    });
}

</script>    
         

</body>
</html>