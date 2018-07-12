var cfilmbtn = document.getElementById("cfilmbtn");
var mfilmbtn = document.getElementById("mfilmbtn");
var muserbtn = document.getElementById("muserbtn");
var fuserbtn = document.getElementById("fuserbtn");
var ffilmbtn = document.getElementById("ffilmbtn");
var cfilm = document.getElementById("cfilm");
var mfilm = document.getElementById("mfilm");
var muser = document.getElementById("muser");
var fuser = document.getElementById("fuser");
var ffilm = document.getElementById("ffilm");

cfilmbtn.addEventListener('click', cfilmf);
mfilmbtn.addEventListener('click', mfilmf);
muserbtn.addEventListener('click', muserf);
fuserbtn.addEventListener('click', fuserf);
ffilmbtn.addEventListener('click', ffilmf);

function cfilmf() {
    cfilm.style.display = "block";
    mfilm.style.display = "none";
    muser.style.display = "none";
    fuser.style.display = "none";
    ffilm.style.display = "none";
}

function mfilmf() {
    cfilm.style.display = "none";
    mfilm.style.display = "block";
    muser.style.display = "none";
    fuser.style.display = "none";
    ffilm.style.display = "none";
}

function muserf() {
    cfilm.style.display = "none";
    mfilm.style.display = "none";
    muser.style.display = "block";
    fuser.style.display = "none";
    ffilm.style.display = "none";
}

function fuserf() {
    cfilm.style.display = "none";
    mfilm.style.display = "none";
    muser.style.display = "none";
    fuser.style.display = "block";
    ffilm.style.display = "none";
}

function ffilmf() {
    cfilm.style.display = "none";
    mfilm.style.display = "none";
    muser.style.display = "none";
    fuser.style.display = "none";
    ffilm.style.display = "block";
}