document.onkeydown = checkKey;

function checkKey(e) {
    var man = document.getElementById("kanrishafr");

    e = e || window.event;

    if (e.keyCode == '115') {
        man.style.display = "inline-block";
    }

}

var cancel = document.getElementById("reset");

cancel.addEventListener("click", closef);

function closef() {
    var man = document.getElementById("kanrishafr");
    man.style.display = "none";
}