var insint = document.getElementById("conn");
var insbtn = document.getElementById("connbtn");
var insann = document.getElementById("annulerco");

insbtn.addEventListener('click', menuco);
insann.addEventListener('click', closeco);

function menuco() {
    insint.style.display = "inline-block";
}

function closeco() {
    insint.style.display = "none";
}