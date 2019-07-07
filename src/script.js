var lockKristopher = false;

function animateKristopher() {
    if (lockKristopher)
        return;
    lockKristopher = true;

    var isIos = navigator.userAgent.match(/iPhone|iPad|iPod/i);

    document.getElementsByClassName("concert")[0].style.backgroundColor = "black";
    document.getElementsByClassName("oval-thought-border")[0].style.display = "none";

    var elements = document.getElementsByClassName("speaker");
    elements[0].style.left = "0";
    elements[1].style.right = "0";

    // turn off transition after the animation is done
    setTimeout(function () {
        elements[0].style.transition = "0s";
        elements[1].style.transition = "0s";
    }, 1000);

    if (isIos) {
        document.getElementsByClassName("concert")[0].style.backgroundImage = "url(img/rave.gif)";
    } else {
        document.getElementsByClassName("concert")[0].className += " big";
        document.getElementById('concert-iframe').src = "https://youtube.com/embed/BWO6VDxSg4o?autoplay=1&controls=0&showinfo=0&autohide=1";
    }

    var h = 0, v = 0;
    var fn = function () {
        v += 1;
        h += v;
        if (h > 120){
            v = -10;
            h = 100;
        }
        document.getElementById("kristopher").style.bottom = "-" + (h / 10) + "%";
        setTimeout(fn, 30);
    };
    setTimeout(fn, isIos ? 0 : 60000);
}

function animateRachel() {
    document.getElementById("rsplash").className += " showImage";
    return false;
}

function animateBen() {
    document.getElementById("bsplash").className += " showImage";
    return false;
}

function animateSanJose() {
    document.getElementById("living").className += " showImage";
    return false;
}

function startKristopherSpeech() {
    if (lockKristopher) return;

    var p = document.getElementById("myspeech");
    var c = document.getElementById("myspeech-container");

    var fadeout = function () { c.className = "oval-thought-border fadeout"; };
    var fadein = function () { c.className = "oval-thought-border fadein"; };

    setTimeout(fadeout, 3000);
    setTimeout(function () { p.innerHTML = "Please click me..."; }, 3500);
    setTimeout(fadein, 3500);
    setTimeout(fadeout, 6500);
    setTimeout(function () { p.innerHTML = "You know you want to..."; }, 7000);
    setTimeout(fadein, 7000);
    setTimeout(fadeout, 10000);
    setTimeout(function () { p.innerHTML = "Hi, I'm Kristopher..."; }, 10500);
    setTimeout(fadein, 10500);
    setTimeout(startKristopherSpeech, 10500);
}

function postload() {
    // Loading hidden background images is deferred
    document.getElementById("rsplash").className += " activated";
    document.getElementById("bsplash").className += " activated";
    document.getElementById("living").className += " activated";

    // Load speakers for maximum base
    for (var i = 0; i <= 1; i++)
        document.getElementById("ksplash").getElementsByClassName("speaker")[i].src = "img/big-speaker.jpg";

    // Swap the JPG of me with an identical PNG (larger) that has transparency
    var loaded = false;
    var bobble = function () {
        if (loaded) return; else loaded = true;
        document.getElementById("kristopher").src = img.src;
    };
    var img = new Image();
    img.src = "img/bobble-me2.png";
    img.addEventListener('load', bobble);
    if (img.complete) bobble();
}

function init() {
    document.getElementById('email').href = 'mailto:kristopherwindsor' + '@gmail.com';
    startKristopherSpeech();
    document.getElementById('concert-iframe').src = ""; // refreshing the page would not stop the video from playing

    // Allow time for a render before post-loading
    setTimeout(postload, 1);
}
