var openLogin = document.getElementById("openlogin");
var login = document.getElementById("login.admin");
var Xlogin = document.getElementById("closelogin");

if (Xlogin === undefined) {

} else {
    closeX();
    // estas instrucciones no se ejecutan
}

openLogin.addEventListener("dblclick", function(e) {
    login.classList.replace("fadeInDown-not", "fadeInDown");
    login.classList.replace("wrapper-not", "wrapper");
    closeX();
});


function closeX() {

    Xlogin.addEventListener("click", function(e) {
        login.classList.replace("fadeInDown", "fadeInDown-not");
        login.classList.replace("wrapper", "wrapper-not");

    });

}