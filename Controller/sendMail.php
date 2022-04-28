<?php
include_once  '../Model/conexion.php';
require '../Source/PHPMailer/Exception.php';
require '../Source/PHPMailer/PHPMailer.php';
require '../Source/PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
$conection=new Connection_db();

$CorreoUsuario=$_SESSION['mail'];
$tipo_solictud=$_POST['solicitud'];
$opcion=$_POST['opcion'];
$detalles=$_POST['detalles'];

          //parametro a mofidicar  el emisor del correo 
   $correoAdmin="carlos.floresmontes11@gmail.com";
   $contraseña="36AA5171b7@";
   $smtpCorreo="smtp.gmail.com";
   $puerto="587";

$conection->registration_request($CorreoUsuario,$tipo_solictud,$opcion,$detalles);


  if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    $url ="https://"; 
    }else{
      $url  ="http://"; 
    }

 
 

$mail = new PHPMailer(true);

  try {
      //Server settings
      $mail->SMTPDebug = SMTP::DEBUG_OFF;                      // Enable verbose debug output
      $mail->isSMTP();                                            // Send using SMTP
      $mail->SMTPSecure = 'tls';
      $mail->Host       = $smtpCorreo;                    // Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
      $mail->Username   = $correoAdmin;                     // SMTP username
      $mail->Password   = $contraseña;                               // SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
      $mail->Port       = $puerto;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
  
      //Recipients
      $mail->setFrom($correoAdmin);
      $mail->addAddress($CorreoUsuario);     // Add a recipient   AGREGAR OTRA PERSONA PARA EN REMVIO AL ADMIN
     
    
      // Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'Verificacion de Servicio';
  
      $mail->Body    ="
 
   <style>
          .conteiner{
            display:flex;
            justify-content:space-around;
          }
          .conteiner div{
            display:block;
            background-color: rgba(24, 24, 175, 0.609);
            text-align: center;
            border-radius:8px ;
            margin-left:10px;
            }

          a{
            text-decoration: none;  
            color:rgba(255, 255, 255, 1);
          } 
          span{
              color: rgba(145, 30, 10, 0.89);
              font-size:1rem;
          }
        .nota{
        width:auto;
        border:2px solid black;
      }
  </style>
  <h2>Usted ha generado una solicitud</h2>
      <div class='nota'>
        <h3>Nota :</h3>
         <span>No debe eliminar el correo hasta liberar la solicitud</span>
         <br>
      </div>
      <br>
      <div  class='conteiner'>
      
      
            <div>
          <a href='{$url}{$_SERVER["HTTP_HOST"]}/View/Verificacion.php?mail={$CorreoUsuario}'>Verificar Solicitud</a>
            </div>
            <br>
            <div >
            <a href='{$url}{$_SERVER["HTTP_HOST"]}/View/Liberacion.php?mail={$CorreoUsuario}' >Liberar Solicitud</a>
            </div>
            <div >
            <a href='{$url}{$_SERVER["HTTP_HOST"]}/View/Cancelacion.php?mail={$CorreoUsuario}' >Cancelar Solicitud</a>
            </div>
      </div>";

            if ($mail->send()==true){
  $_SESSION['mensaje']="notifiacion";
  echo json_encode(array("success"=>true));
              
             }else {
               echo json_encode(array("success"=>false));
        }

  } catch (Exception $e) {
    echo json_encode(array("success"=>false));  
}
