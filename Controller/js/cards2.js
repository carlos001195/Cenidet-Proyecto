var seleccionadOpcion = null;
var bts = document.querySelectorAll(".boton_personalizado");

var tipo;
for (x = 0; x < bts.length; x++) {

    bts[x].addEventListener("click", function(e) {
        tipo = e.target.parentNode.parentNode.getAttribute("value");



        if (tipo != "OTRO") {
            radioselect();

        } else {

            otro = document.getElementById("text").value;
            action(tipo, null, otro);
        }


    })
}


function radioselect() {
    var OptionSeleccionado = document.getElementsByName('flexRadioDefault');

    for (i = 0; i < OptionSeleccionado.length; i++) {

        if (OptionSeleccionado[i].checked === true) {
            seleccionadOpcion = OptionSeleccionado[i].parentNode.childNodes[3].textContent;
            $("#exampleModal").modal("show");
            break;
        }
    }


}

function action(tipo, opcion, detalles) {

    sendMAil(1);

    $.ajax({
        url: "../Controller/sendMail.php",
        type: "POST",

        data: { 'solicitud': tipo, "opcion": opcion, "detalles": detalles },
        success: function(result) {
            var json = JSON.parse(result);
            if (json.success == true) {
                window.location.assign("../View/Bitacora.php");
            } else if (json.success == false) {
                sendMAil(2);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            sendMAil(2);
        }

    });

}


var close = document.querySelector("#Cerrar");


close.addEventListener("click", function() {
    message = document.getElementById("message-text").value;
    action(tipo, seleccionadOpcion, message);
    $('#exampleModal').modal('hide')
});


function sendMAil(Option) {
    var cells = document.getElementsByTagName("input");
    for (var i = 0; i < cells.length; i++) {

        if (cells[i].type === "button") {

            switch (Option) {
                case 1:
                    cells[i].classList.replace("boton_personalizado", "not-boton_personalizado");
                    break;
                case 2:
                    cells[i].classList.replace("not-boton_personalizado", "boton_personalizado");
                    break;

            }

        }
    }


}

$(document).ready(function() {


    $('#exampleModal').modal({
        keyboard: false
    });

    $('#exampleModal').modal({
        backdrop: false
    });


    $('.collapse').on('hidden.bs.collapse', function() {
        let desacRadio = document.querySelectorAll("input[type='radio']");

        for (x = 0; x < desacRadio.length; x++) {
            desacRadio[x].checked = false;
        }
        //  alert(desacRadio.length);
    })

});