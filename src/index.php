<?php

header("Link: </style.css>; rel=preload; as=style", false);

header("Link: </img/rachel-cutout.png>; rel=preload; as=image", false);
header("Link: </img/san-jose-cutout.png>; rel=preload; as=image", false);
header("Link: </img/github.png>; rel=preload; as=image", false);
header("Link: </img/linkedin.png>; rel=preload; as=image", false);
header("Link: </img/gmail.png>; rel=preload; as=image", false);
header("Link: </img/big-speaker.jpg>; rel=preload; as=image", false);
header("Link: </img/bobble-me2.png>; rel=preload; as=image", false);
header("Link: </img/rave.gif>; rel=preload; as=image", false);
header("Link: </img/sky.jpg>; rel=preload; as=image", false);
header("Link: </img/city-scenery.jpg>; rel=preload; as=image", false);

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

        <script src="script.js"></script>
    </body>
</html>
