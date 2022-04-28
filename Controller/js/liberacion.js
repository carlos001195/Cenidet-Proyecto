var idButton = document.getElementById("liberar_button");
var idc = document.getElementById("calificacion");
var div_lib = document.getElementById("div-liberacion");

function antesEnvio() {
    calSelect = idc.options[idc.selectedIndex].value; //extraer el id del tecnico
    comentario = document.getElementById("comentario").value;
    div_lib.classList.replace("content", "content-no");
}

function despuesEnvio() {
    text_mensaje = document.getElementById("menssage-status");
    var content_status = document.getElementById("content-status_liberacion");
    img_status = document.getElementById("img-status");
    content_status.classList.replace("content-liberacion-no", "content-liberacion");
    img_status.setAttribute("src", "../Source/img/loading.gif");
    text_mensaje.innerText = "Liberando ... Espera porfavor";
}

idButton.addEventListener("click", function() {
    antesEnvio();
    despuesEnvio();

    $.ajax({
        url: "../Controller/Liberacion_Registro.php",
        type: "POST",
        data: { "calificacion": calSelect, "comentario": comentario.trim() },
        success: function(result) {

            var json = JSON.parse(result);

            if (json.estado == 0) {
                text_mensaje.innerText = "Solicitud Liberado exitosamente";
                img_status.setAttribute("src", "../Source/img/status-ok.png");

            } else if (json.estado == 1) {
                text_mensaje.innerText = "Solicitud ya ha sido liberado o no existe";
                img_status.setAttribute("src", "../Source/img/precaucion.png");

            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            text_mensaje.innerText = "Error";
        }
    });

});