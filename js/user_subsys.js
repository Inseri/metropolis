var cfilmbtn = document.getElementById("bienbtn");
var mfilmbtn = document.getElementById("gesdbtn");
var muserbtn = document.getElementById("gesfbtn");
var fuserbtn = document.getElementById("delebtn");
var ffilmbtn = document.getElementById("confbtn");
var cfilm = document.getElementById("bien");
var mfilm = document.getElementById("gesd");
var muser = document.getElementById("gesf");
var fuser = document.getElementById("dele");
var ffilm = document.getElementById("conf");

cfilmbtn.addEventListener('click', bienf);
mfilmbtn.addEventListener('click', gesdf);
muserbtn.addEventListener('click', gesff);
fuserbtn.addEventListener('click', delef);
ffilmbtn.addEventListener('click', conff);

function bienf() {
    bien.style.display = "block";
    gesd.style.display = "none";
    gesf.style.display = "none";
    dele.style.display = "none";
    conf.style.display = "none";
}

function gesdf() {
    bien.style.display = "none";
    gesd.style.display = "block";
    gesf.style.display = "none";
    dele.style.display = "none";
    conf.style.display = "none";
}

function gesff() {
    bien.style.display = "none";
    gesd.style.display = "none";
    gesf.style.display = "block";
    dele.style.display = "none";
    conf.style.display = "none";
}

function delef() {
    bien.style.display = "none";
    gesd.style.display = "none";
    gesf.style.display = "none";
    dele.style.display = "block";
    conf.style.display = "none";
}

function conff() {
    bien.style.display = "none";
    gesd.style.display = "none";
    gesf.style.display = "none";
    dele.style.display = "none";
    conf.style.display = "block";
}