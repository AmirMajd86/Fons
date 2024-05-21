<?php
// Test Login Or Logined or .. For Start
// Logined 
?>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setting Fons</title>
    <link rel="icon" type="image/png" href="../../ico/ac.png">
</head>

<body class="background">
    <div id='LoginForm'>
        <input type="text" id='User' placeholder='Username'>
        <input type="password" id='Pass' placeholder='Password'>
        <button type='button' id='submit' onclick='location.href = "../../"'>Submit</button>
    </div>
    <div id="MessageWindow">
        <pre id="MessageTitle">
    Title
</pre>
        <pre id="MessageText">
        Message
    </pre>
    </div>
    <div id="title">
        Setting
    </div>
    <div id="Settinginto">
        <div id="BackCustom">
            <p id="TextBackCustom">BackGround Const</p>
            <label class="switch">
                <input type="checkbox" id="Shuffle" onchange="ShffleBack()">
                <span class="slider"></span>
            </label>
        </div>
        <style>
            #TextBackCustom {
                color: white;
                font-family: Georgia, 'Times New Roman', Times, serif;
                font-size: 20px;
            }

            #Settinginto {
                top: 10%;
                left: 5%;
                width: 90%;
                position: absolute;
                border: 5px solid #000;
                height: 80%;
            }

            /* The switch - the box around the slider */
            .switch {
                top: 10%;
                font-size: 17px;
                position: absolute;
                display: inline-block;
                width: 3.5em;
                height: 2em;
            }

            /* Hide default HTML checkbox */
            .switch input {
                opacity: 0;
                width: 0;
                height: 0;
            }

            /* The slider */
            .slider {
                position: absolute;
                cursor: pointer;
                inset: 0;
                background: #d4acfb;
                border-radius: 50px;
                transition: all 0.4s cubic-bezier(0.23, 1, 0.320, 1);
            }

            .slider:before {
                position: absolute;
                content: "";
                height: 1.4em;
                width: 1.4em;
                left: 0.3em;
                bottom: 0.3em;
                background-color: white;
                border-radius: 50px;
                box-shadow: 0 0px 20px rgba(0, 0, 0, 0.4);
                transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            }

            .switch input:checked+.slider {
                background: #b84fce;
            }

            .switch input:focus+.slider {
                box-shadow: 0 0 1px #b84fce;
            }

            .switch input:checked+.slider:before {
                transform: translateX(1.6em);
                width: 2em;
                height: 2em;
                bottom: 0;
            }
        </style>
    </div>

    <div id="imgtitle">
        <img src="../../ico/setting.png" alt="" style="max-width: 100%; max-height: 100%;">
    </div>
    <div id="PanelRight">
        <a href="../../"><button id="Setting"></button></a>
    </div>
    <div id="PanelLeft">
        <button id="Home" onclick="location.href = ('../../Fons/account')"></button>
        <a href="../../Fons/Chat"><button id="Chat"></button></a>
        <a href="../../Fons/Explore"><button id="Search"></button></a>
    </div>
    <button id="PanelShow" onclick="PanelShow()">
    </button>
</body>
<button id='SignOut' onclick='SignOut()' title="Logout Account">

</button>

</html>
<script>
    if (getCookie("Back") == 'true') {
        console.log("Seted");
        document.getElementById("Shuffle").click();
    }
    function ShffleBack() {
        if (getCookie("Back") == 'true') {
            document.cookie = "Back=false; SameSite=Strict; Secure";
            document.cookie = "Backurl=false;";
        }
        else {
            document.cookie = "Back=true; SameSite=Strict; Secure";
            document.cookie = "Backurl=" + document.querySelector(".background").style.backgroundImage.replace("../../","") + ";";
        }
    }
    // تابعی برای پاک کردن تمام کوکی ها
    function deleteAllCookies() {
        location.href = "../../SignOut.html"
    }

    // استفاده از تابع برای پاک کردن کوکی‌ها
    function SignOut() {
        // Del Cookies for Forget User And Pass in Browser
        deleteAllCookies();
    }
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
        ShowPage();
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
    function ShowPage() {
        document.getElementById("MessageWindow").style.width += "25%";
        if (document.getElementById("User").value.trim().length > 3) {
            document.getElementById("LoginForm").style.visibility = "hidden";
            document.getElementById("LoginForm").style.transition = "1.3s";
            document.getElementById("LoginForm").style.transform = "scale(0.0)"
            setTimeout(function () {
                document.getElementById("MessageWindow").style.visibility = "hidden";
            }, 5500);
        } else {
            document.getElementById("MessageWindow").style.visibility = "visible";
            document.getElementById("MessageWindow").style.transition = "1.3s";
            document.getElementById("MessageWindow").style.width = "25%";
            document.getElementById("MessageWindow").style.animation = "MessageWindow 6.5s infinite";
            setTimeout(function () {
                document.getElementById("MessageWindow").style.width = "0%";
                document.getElementById("MessageWindow").style.animation = "none";
            }, 5500);
            document.getElementById("MessageTitle").innerHTML = " Error Logined";
            document.getElementById("MessageText").innerHTML = " Not Logined As " + document.getElementById("User").value;
        }
    }
    PanelShow();
    if (getCookie("Back") == 'true'){
        console.log("SA");
        document.querySelector(".background").style.backgroundImage ="url(\"../../Background/"+getCookie("Backurl").replace("url(\"BackGround/", "");
    }
</script>