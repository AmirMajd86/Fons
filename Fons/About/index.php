<?php
//  PHP CODE

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fo , System Down GROUP , SHELL™</title>
</head>

<body>
    <div id="Fo">
        <p id='titleFO'>
            <span id="blink">F</span>
            <span id="blink1">O</span>
            <span id="blink2">N</span>
            <span id="blink3">S</span>
        <pre id="deskFo">
    Devolper : System Down GROUP And SHELL TM
    Price : Free
    Description : Messenger And Post Text AG Store
    Version : 1.5
        </pre>
        <button onclick="location.href = '../../'" id="FoWeb">
            Web
        </button>
        <button style="visibility: hidden;">
            Windows
        </button>
        <button style="visibility: hidden;">
            Linux
        </button>
        <button style="visibility: hidden;">
            Android
        </button>
        </p>
    </div>
</body>
<style>
    #deskFo {
        position: absolute;
        top: 25%;
        color: white;
        font-family: 'Courier New', Courier, monospace;
        font-size: 20px;
        font-weight: bold;
        font-style: italic;
        letter-spacing: 1px;
        line-height: 20px;
        word-spacing: 2px;
        word-wrap: break-word;
        white-space: pre-wrap;
        white-space: -moz-pre-wrap;
    }

    #FoWeb {
        position: absolute;
        top: 50%;
        left: 10%;
        font-family: 'Courier New', Courier, monospace;
        font-size: 20px;
        font-weight: bold;
        font-style: italic;
        background-color: blue;
        color: white;
        border-radius: 15px;
        font-size: 25px;

    }

    body {
        overflow-x: hidden;
        background-color: black;
        scroll-behavior: smooth;
    }

    ::-webkit-scrollbar {
        width: 10px;
    }

    ::-webkit-scrollbar-track {
        background: #dddddd;
    }

    ::-webkit-scrollbar-thumb {
        background-color: #888888;
        border-radius: 0px;
    }

    #Fo {
        width: 100%;
        height: 100vh;
        left: -10;
        top: -10;
        background-color: black;
        border: 5px solid rgba(47, 49, 69, 0.3);
        border-radius: 15px;
    }

    #titleFO {
        font-size: 50px;
        position: absolute;
        top: 0;
        width: 25%;
        left: 45%;
        align-items: center;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    #blink {
        text-align: center;
        visibility: hidden;
    }

    #blink1 {
        text-align: center;
        visibility: hidden;
    }

    #blink2 {
        text-align: center;
        visibility: hidden;
    }

    #blink3 {
        text-align: center;
        visibility: hidden;
    }

    @keyframes ShowText {
        10% {
            color: #25CE4F;
            visibility: visible;
        }

        20% {
            color: #B9D684;

        }

        30% {
            color: #25CE58;

        }

        40% {
            color: #C0B9DF;

        }

        50% {
            color: #D7D7EE;

        }

        60% {
            color: #D1BEBE;

        }

        70% {
            color: #AF2B2B;

        }

        80% {
            color: #CE254F;

        }

        90% {
            color: #CE2525;

        }

        100% {
            visibility: visible;
        }

    }
</style>
<script>
    document.getElementById("blink").style.animation = "ShowText 1.5s infinite";
    setTimeout(() => {
        document.getElementById("blink").style.transition = "0.8s";
        document.getElementById("blink").style.visibility = "visible";
        document.getElementById("blink").style.animation = "";
        document.getElementById("blink").style.color = "white";
    }, 1500);
    //
    document.getElementById("blink1").style.animation = "ShowText 2.5s infinite";
    setTimeout(() => {
        document.getElementById("blink1").style.transition = "0.8s";
        document.getElementById("blink1").style.visibility = "visible";
        document.getElementById("blink1").style.animation = "";
        document.getElementById("blink1").style.color = "white";
    }, 2500);
    //
    document.getElementById("blink2").style.animation = "ShowText 3.5s infinite";
    setTimeout(() => {
        document.getElementById("blink2").style.transition = "0.8s";
        document.getElementById("blink2").style.visibility = "visible";
        document.getElementById("blink2").style.animation = "";
        document.getElementById("blink2").style.color = "white";
    }, 3500);
    //
    document.getElementById("blink3").style.animation = "ShowText 4.5s infinite";
    setTimeout(() => {
        document.getElementById("blink3").style.transition = "0.8s";
        document.getElementById("blink3").style.visibility = "visible";
        document.getElementById("blink3").style.animation = "";
        document.getElementById("blink3").style.color = "white";
    }, 4500);
    //
</script>

</html>