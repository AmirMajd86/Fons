<?php
// Test Login Or Logined or .. For Start
// Logined 
function Logined()
{
    echo <<<HTML
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Fons</title>
    </head>
    <body>
        
    </body>
</html>

HTML;
}
// Not Logined
function NotLogined()
{
    echo <<<HTML
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="../../ico/search.png">
    </head>
    <body>
        <div id='LoginForm'>
                <input type="text" id='User' placeholder='Username'>
                <input type="password" id='Pass' placeholder='Password'>
                <button type='button' id='submit' onclick='location.href = "../../"'>Submit</button>
        </div>
    </body>
</html>
<style>

</style>
HTML;
}
NotLogined();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore</title>
</head>

<body class="background">
    <div id="Window">
        <button id="UserTargetS"></button>
        <img src="" id="ImgUserTarget" alt="">
        <label for="Posts" id='lbposts'>Explore </label>
        <div id="Posts">

        </div>
    </div>
    <div id="Searcher">
        <input type="text" id="UserTarget" placeholder="Username Target">
        <button id="SearchSubmit" onclick="Searching()">Search</button>
        <button id="BackToHome" onclick="location.reload()" >Back</button>
    </div>
    <div id="MessageWindow">
        <pre id="MessageTitle">
    Title
</pre>
        <pre id="MessageText">
        Message
    </pre>
    </div>
    <div id="imgtitle">
        <img src="../../ico/search.png" alt="" style="max-width: 100%; max-height: 100%;">
    </div>
    <div id="PanelRight">
        <a href="../../Fons/Setting/"><button id="Setting"></button></a>
    </div>
    <div id="PanelLeft">
        <button id="Home" onclick="location.href = ('../../Fons/account/')"></button>
        <a href="../../Fons/Chat"><button id="Chat"></button></a>
        <a href="../../"><button id="Search"></button></a>
    </div>
    <button id="PanelShow" onclick="PanelShow()">
    </button>
</body>

</html>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const backgrounds = [
            "2.jpg",
            "3.jpg",
            "4.jpg",
            "5.jpg",
            "6.jpg",
            "7.jpg",
            "8.jpg",
            "9.jpg",
            "10.jpg",
            "11.jpg",
            "12.jpg",
            "13.jpg",
            "14.jpg",
            "15.jpg",
            "16.jpg",
            "17.jpg",
            "18.jpg",
            "19.jpg",
            "20.jpg",
            "21.jpg",
            "22.jpg",
            "23.jpg",
            "24.jpg",
            "25.jpg",
            "26.jpg",
            "27.jpg",
            "28.jpg",
            "29.jpg",
            "30.jpg",
            "31.jpg",
            "32.jpg",
            "33.jpg"
        ];
        const backgroundElement = document.querySelector(".background");

        function setRandomBackground() {
            const randomIndex = Math.floor(Math.random() * backgrounds.length);
            const randomBackground = "../../Background/" + backgrounds[randomIndex];
            const backgroundUrl = `url('${randomBackground}')`;
            backgroundElement.style.backgroundImage = backgroundUrl;
        }

        setRandomBackground();

        setInterval(setRandomBackground, 200000);
    });
    var PanelShowed = false;
    // Start Test Logined 
    function getCookie(cookie_name) {
        var name = cookie_name + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
    document.getElementById("User").value = getCookie("User");
    document.getElementById("Pass").value = getCookie("Pass");
    if (document.getElementById("User").value.trim().length > 3) {
        document.getElementById("LoginForm").style.visibility = "hidden";
    }
    function clickOnUser(user) {
        document.getElementById("UserTarget").value = user;
        Searching();
    }
    function Searching() {
        document.getElementById("BackToHome").style.visibility = "visible";
        var UserTargetSel = document.getElementById("UserTarget").value;
        // Recive Pic Profile User Target
        document.getElementById("UserTargetS").innerText = UserTargetSel;
        var RecivePic = new XMLHttpRequest();
        RecivePic.onload = function () {

            document.getElementById("ImgUserTarget").src = "../../"+ RecivePic.responseText;
        }
        RecivePic.open("GET", "../../api/ReciveProf.php?" + "UserT=" + UserTargetSel);
        RecivePic.send();
        // End : Recive Pic Profile User Target
        document.getElementById("UserTargetS").innerText = UserTargetSel;
        var RecivePosts = new XMLHttpRequest();
        RecivePosts.onload = function () {

            document.getElementById("Posts").innerHTML = RecivePosts.responseText.replace("\n", "");
        }
        RecivePosts.open("GET", "../../api/RecivePosts.php?" + "Username=" + getCookie("User") + "&Password=" + getCookie("Pass") + "&UserTarget=" + UserTargetSel);
        RecivePosts.send();
        document.getElementById("ImgUserTarget").style.visibility = "visible";
        document.getElementById("UserTargetS").style.visibility = "visible";
    }
    function PanelShow() {
        if (PanelShowed == false) {
            document.getElementById("PanelLeft").style.transition = "1.1s";
            document.getElementById("PanelRight").style.transition = "1.1s";
            document.getElementById("PanelLeft").style.height = "10%";
            document.getElementById("PanelLeft").style.height = "20%";
            document.getElementById("PanelLeft").style.height = "29%";
            document.getElementById("PanelLeft").style.visibility = "visible";
            document.getElementById("PanelRight").style.visibility = "visible";
            document.getElementById("PanelRight").style.width = "10%";
            document.getElementById("PanelRight").style.width = "20%";
            document.getElementById("PanelRight").style.width = "30%";
            PanelShowed = true;
            document.getElementById("PanelShow").style.rotate = "30deg";

        } else {
            document.getElementById("PanelLeft").style.transition = "1.1s";
            document.getElementById("PanelRight").style.transition = "1.1s";
            document.getElementById("PanelLeft").style.height = "29%";
            document.getElementById("PanelLeft").style.height = "20%";
            document.getElementById("PanelLeft").style.height = "10%";
            document.getElementById("PanelLeft").style.height = "00%";
            document.getElementById("PanelLeft").style.visibility = "hidden";
            document.getElementById("PanelRight").style.visibility = "hidden";
            document.getElementById("PanelRight").style.width = "30%";
            document.getElementById("PanelRight").style.width = "20%";
            document.getElementById("PanelRight").style.width = "10%";
            document.getElementById("PanelRight").style.width = "00%";
            PanelShowed = false
            document.getElementById("PanelShow").style.rotate = "0deg";

        }
    }
    var RecivePosts = new XMLHttpRequest();
    RecivePosts.onload = function () {

        document.getElementById("Posts").innerHTML = RecivePosts.responseText.replace("\n", "");
    }
    RecivePosts.open("GET", "../../api/ReciveExplore.php?" + "Username=" + getCookie("User") + "&Password=" + getCookie("Pass"));
    RecivePosts.send();
    PanelShow();
</script>