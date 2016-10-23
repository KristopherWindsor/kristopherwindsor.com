<?php
header("Link: </style.css>; rel=preload; as=style", false);
header("Link: </img/big-speaker.jpg>; rel=preload; as=image", false);
?><!DOCTYPE html>
<html>
    <head>
        <title>Kristopher Windsor</title>
        <link rel="shortcut icon" href="favicon.png">
        <link rel="stylesheet" type="text/css" href="style.css">

        <meta name="description" content="Kristopher Windsor's domain">
        <meta name="keywords" content="kristopher windsor, kristopherwindsor, php, pinger, sjsu, san jose">
    </head>
    <body onLoad="init()">
        <div id="ksplash" class="splash">
            <div class="concert">
                <iframe id="concert-iframe" frameborder="0" height="100%" width="100%" src=""></iframe>
            </div>
            <img class="speaker l" src="img/big-speaker.jpg">
            <img class="speaker r" src="img/big-speaker.jpg">

            <blockquote id="myspeech-container" class="oval-thought-border">
                <p id="myspeech">Hi, I'm Kristopher...</p>
            </blockquote>
            <a href="javascript:void(0)" onClick="return animateKristopher()"><img id="kristopher" class="character" src="img/bobble-me2.jpg"></a>
        </div>

        <div id="rsplash" class="splash">
            <a href="javascript:void(0)" onClick="return animateRachel()"><img class="rachel" src="img/rachel-cutout.png"></a>
            <p class="highlight">This is my wife, Rachel</p>
        </div>

        <div id="living" class="splash">
            <a href="javascript:void(0)" onClick="return animateSanJose()"><img src="img/san-jose-cutout.png"></a>
            <p>We live in downtown San Jose</p>
        </div>

        <footer class="splash">
            <ul>
                <li><a id="email" href=""><img src="img/gmail.png" alt="email"></a></li>
                <li><a href="https://github.com/KristopherWindsor"><img src="img/github.png" alt="GitHub"></a></li>
                <li><a href="http://www.linkedin.com/in/kristopherwindsor"><img src="img/linkedin.png" alt="LinkedIn"></a></li>
            </ul>
        </footer>

        <script>
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
                document.getElementById('rsplash').style.backgroundImage = "url(img/city-scenery.jpg)";
                return false;
            }

            function animateSanJose() {
                document.getElementById('living').style.backgroundImage = "url(img/sky.jpg)";
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

            function preload() {
                var loaded = false;
                var bobble = function () {
                    if (loaded) return; else loaded = true;
                    document.getElementById("kristopher").src = img.src;
                };
                var img = new Image();
                img.src = "img/bobble-me2.png";
                img.addEventListener('load', bobble);
                if (img.complete) bobble();

                var imgRachel = new Image();
                imgRachel.src = "img/city-scenery.jpg";

                var imgSanJose = new Image();
                imgSanJose.src = "img/sky.jpg";
            }

            function init() {
                document.getElementById('email').href = 'mailto:kristopherwindsor' + '@gmail.com';
                startKristopherSpeech();
                document.getElementById('concert-iframe').src = ""; // refreshing the page would not stop the video from playing

                setTimeout(preload, 1000);
            }
        </script>
    </body>
</html>
