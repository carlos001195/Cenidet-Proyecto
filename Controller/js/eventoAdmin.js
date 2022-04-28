 var idt;
 var urlcrud = "../Controller/crud.php";
 var perfil = document.querySelectorAll('.imgt');
 const addtec = document.getElementById("addTecnico");

 var Addskill = document.getElementById("addhabilidad"); //Button

 var selectHab = document.getElementById("lista-habilidad");
 var selectPrio = document.getElementById("lista-prioridad");

 var nombreLabel = document.getElementById("nombre-label");
 tbod = document.getElementById("body");

 var btnhabilidad = document.getElementById("btnhabilidad");
 var btnpeditarT = document.getElementById("btnedit");
 var btnUpdate = document.getElementById("buttonupdate");

 var btndeleteR = document.getElementById("delete");
 var ckeckbstatus = document.getElementById("estatusCheck");

 /*desabilitamos los botones de editar y crear */
 btnhabilidad.disabled = true;
 btnpeditarT.disabled = true;



 listaTecnicos(); //iniciar los click delos numero de tecncios 



 function listaTecnicos() { //click en los perfiles
     var perfil = document.querySelectorAll('.imgt');



     for (var i = 0; i < perfil.length; i++) {
         perfil[i].addEventListener("click", function(e) {
             selectElement = e.target.parentNode.parentNode;

             idt = e.target.parentNode.classList[1];
             perfilSelec = e.target.parentNode.parentNode.parentNode;

             NperfilSelect = document.querySelector(".perfil-acepter");

             if (NperfilSelect == null) {
                 perfilSelec.classList.replace("perfil-hover", "perfil-acepter");

             } else {
                 NperfilSelect.classList.remove("perfil-acepter");
                 perfilSelec.classList.add("perfil-acepter");
             }

             nombreLabeltext = e.target.parentNode.innerText;
             nombreLabel.innerText = nombreLabeltext;
             /*  habilidar bones */
             btnhabilidad.disabled = false;
             btnpeditarT.disabled = false;
             ListaHabilidades();
             statustecnico();

         });
     }


 }


 function ListaHabilidades() {
     var rowtr = document.querySelectorAll("tr");
     if (rowtr.length > 0) {
         for (x = 1; x < rowtr.length; x++) {
             rowtr[x].remove();
         }
     }
     $.ajax({
         url: urlcrud,
         type: "POST",
         data: { 'idTec': idt },
         success: function(result) {
             if (result == "error") {
                 /*tbod.insertAdjacentHTML("afterbegin",
                     "<tr><td colspan='3'>sin datos</td></tr>");*/
             } else {
                 tbod.insertAdjacentHTML("afterbegin", result);
                 EliminarHabilidad();
             }
         },
         error: function(jqXHR, textStatus, errorThrown) {}
     });
 }



 function EliminarHabilidad() {
     var filatr = document.querySelectorAll('tr');

     var btnDelete = document.querySelectorAll(".eventEliminar");

     for (var i = 0; i < btnDelete.length; i++) {
         btnDelete[i].addEventListener("click", function(e) {
             const fila = e.target.parentNode.parentNode;
             $.ajax({
                 url: urlcrud,
                 type: "POST",
                 data: { 'idHab': fila.getAttribute("value") },
                 success: function(result) {
                     result = JSON.parse(result);
                     if (result.success == true) {
                         fila.remove();
                     }
                 },
                 error: function(jqXHR, textStatus, errorThrown) {}
             });
         });
     }
 }

 function statustecnico() {


     valorStatus = perfilSelec.getAttribute("value");

     if (valorStatus === "0") {

         $('.form-check-input').prop('checked', false);
         $('.form-check-label').text("Inabilitado");
     } else {
         $('.form-check-label').text("Habilitado");
         $('.form-check-input').prop('checked', true);
     }

 }



 menu = document.getElementById("menu-tecnico");

 //añadir tecnico
 addtec.addEventListener("click", function() {
     let nombre = document.getElementById("recipient-Nombre").value;
     let ApellidoP = document.getElementById("recipient-Apellidop").value;
     let ApellidoM = document.getElementById("recipient-Apellidom").value;
     let mail = document.getElementById("recipient-mail").value;



     $.ajax({
         url: urlcrud,
         type: "POST",
         data: { 'Nombre': nombre, 'ApellidoP': ApellidoP, 'ApellidoM': ApellidoM, 'Mail': mail },
         success: function(result) {
             idR = JSON.parse(result);

             $('#formTecnico').trigger("reset");

             menu.insertAdjacentHTML("beforeend", "<div class='perfil'>" +
                 "<div class='conteiner-perfil'>" +
                 "<div class='imgtecn " + idR[0].idtecnico + "'> " +
                 " <img src='../Source/img/perfil-tec.png' class='imgt  '>" +
                 "<div id='nombre-tec-menu' class='nombre-tecn'> " + nombre + " " + " " + ApellidoP + "</div> </div> </div> </div>");

             listaTecnicos(); //inciamos los click , para que  funcione
         },
         error: function(jqXHR, textStatus, errorThrown) {}

     });

 });



 Addskill.addEventListener("click", function() {
     let habilidadvalue = selectHab.options[selectHab.selectedIndex].value;
     let prioridadvalue = selectPrio.options[selectPrio.selectedIndex].value;
     $.ajax({
         url: urlcrud,
         type: "POST",
         data: { 'idT': idt, 'habilidad': habilidadvalue, 'prioridad': prioridadvalue },
         success: function(result) {

             idR = JSON.parse(result);
             tbod.insertAdjacentHTML("afterbegin", "<tr value='" + idR[0].idhabilidad + "'>" +
                 " <td>" + habilidadvalue + "</td>" +
                 " <td>" + prioridadvalue + "</td>" +
                 " <td><a class='eventEliminar btn btn-danger'>Eliminar</a><br></td></tr>");
             ListaHabilidades();

         },
         error: function(jqXHR, textStatus, errorThrown) {}

     });

 });


 $('.form-check-input').change(function() {
     if ($('.form-check-input').prop('checked')) {
         $('.form-check-label').text("Habilitado");
         perfilSelec.setAttribute("value", 1);
     } else {
         $('.form-check-label').text("Inabilitado");
         perfilSelec.setAttribute("value", 0);
     }
 });



 btnUpdate.addEventListener("click", function() {

     UpdateCorreo = $('#recipient-mailupdate').val();
     var statusEdit = perfilSelec.getAttribute("value");

     $.ajax({
         url: urlcrud,
         type: "POST",
         data: { "idTDU": idt, "Correo": UpdateCorreo, "estado": statusEdit },
         success: function(result) {
             resp = JSON.parse(result);

             if (resp.success == true) {

                 //   $('#formTecnico').trigger("reset");
                 /*    if (valorStatus == "1" && statusEdit == "0") {
                         perfilSelec.classList.add("perfil-enabled");
                     } else if (valorStatus == "0" && statusEdit == "1") { //en el momento que entren
                         perfilSelec.classList.remove("perfil-enabled");
                     } else*/
                 if (statusEdit == "1") { //despues
                     perfilSelec.classList.remove("perfil-enabled");
                     valorStatus = statusEdit;
                 } else if (statusEdit == "0") {
                     perfilSelec.classList.add("perfil-enabled");
                     valorStatus = statusEdit;
                 }

                 $('#exampleModaledit').modal('hide');
             }

         },
         error: function(jqXHR, textStatus, errorThrown) {}

     });
 });


 btndeleteR.addEventListener("click", function() {


     $.ajax({
         url: urlcrud,
         type: "POST",
         data: { 'idTD': idt },
         success: function(result) {
             resp = JSON.parse(result);

             if (resp.success == true) {

                 var rowtr = document.querySelectorAll("tr");
                 if (rowtr.length > 0) {
                     for (x = 1; x < rowtr.length; x++) {
                         rowtr[x].remove();
                     }
                 }

                 btnhabilidad.disabled = true;
                 btnpeditarT.disabled = true;


                 perfilSelec.remove();
                 $('#exampleModaledit').modal('hide');
             }

         },
         error: function(jqXHR, textStatus, errorThrown) {}

     });

 });


 $(document).ready(function() {

     $("#btn_exit").click(function() {
         $("#exampleModaledit").modal("hide");
     });
     $("#exampleModaledit").on('hidden.bs.modal', function() {
         perfilSelec.setAttribute("value", valorStatus);
         statustecnico();
     });
 });