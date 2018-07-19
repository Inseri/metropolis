var conint = document.getElementById("contact");
var conbtn = document.getElementById("contactbtn");
var conann = document.getElementById("annuler");

conbtn.addEventListener('click', menuapp);
conann.addEventListener('click', closef);

function menuapp() {
    conint.style.display = "inline-block";
}

function closef() {
    conint.style.display = "none";
}