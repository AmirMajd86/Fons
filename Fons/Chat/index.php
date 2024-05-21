<?php
// Test Login Or Logined or .. For Start
// Logined 
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Fons</title>
    <link rel="icon" type="image/png" href="../../ico/chat.png">
    <meta name="description" content="Chat Fons ">
</head>

<body class="background" onload="LoadPage()">
    <div id='LoginForm'>
        <input type="text" id='User' placeholder='Username' value="">
        <input type="password" id='Pass' placeholder='Password' value="">
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
        <pre></pre>
    </div>
    <div id="imgtitle">
        <img src="../../ico/chat.png" alt="" id="imgtitlesrc" style="max-width: 100%; max-height: 100%;">
    </div>
    <div id="PanelRight">
        <a href="../../Fons/Setting/"><button id="Setting"></button></a>
    </div>
    <div id="PanelLeft">
        <button id="account" onclick="location.href = ('../../Fons/account')"></button>
        <a href="../../"><button id="Home"></button></a>
        <a href="../../Fons/Explore"><button id="Search"></button></a>
    </div>
    <button id="PanelShow" onclick="PanelShow()">
    </button>
    <div id="UserTarget" class="Users">

    </div>
    <div id="Messages">
        <div id="MessShow">
        </div>
        <div contenteditable="true" id="MessSend" title="Your Message For Send"></div>
        <button id="Send" onclick="SendMess()" title="Ctrl + Enter"></button>
    </div>

    <!-- Button New Message -->
    <button onclick="ShowNewMess()" id="NewMess">
        +
    </button>
    <!-- Div New Mess -->
    <div id="NewMessForm">
        <input type="text" id="UserTargetChat" placeholder="Username Target">
        <button id="SearchUT" onclick="NewChat()">Search</button>
        <button id="Close" onclick="HideNewMess()">
            X
        </button>
    </div>
    <button id="Saved" onclick="Saved()">

    </button>
    <button id="Clear" onclick="ClearMess()">
        Clear
    </button>
</body>
<style>
    .background {
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        transition: background-image 5s ease-in-out;
    }
</style>

</html>
<script>
    function Saved() {
        document.getElementById("UserTargetChat").value = getCookie("User");
        NewChat();
        ReciveMess(usert = getCookie("User"));
        document.getElementById("UserTargetChat").value = "";
    }
    // Var Global
    var SendMessReq = new XMLHttpRequest();
    var ClearMessage = new XMLHttpRequest();
    var UserTargetSel = "";
    // End Var Global
    function LoadPage() {
        var Users = new XMLHttpRequest();
        Users.onload = function () {
            document.getElementById("UserTarget").innerHTML = Users.responseText;
        }
        Users.open("GET", "../../api/ReciveUsersMess.php?" + "Username=" + getCookie("User") + "&Password=" + getCookie("Pass"));
        Users.send();
        setInterval(function () {
            ReciveMess(usert = UserTargetSel, mode = 'ref')
        }, 5000);
        PanelShow();
    }
    function ReqApi(url) {
        var xhr = new XMLHttpRequest();
        console.log("START")
        // URL صفحه دیگری که می‌خواهید به آن درخواست ارسال کنید

        // تنظیم نوع درخواست (GET در این مثال)
        xhr.open('GET', url, true);

        // تعریف یک تابع برای پردازش پاسخ درخواست
        xhr.onload = function () {
            console.log(xhr.responseText)
            return xhr.responseText;
        }

        // ارسال درخواست
        xhr.send();
    }
    document.addEventListener("keydown", function (event) {
        if (event.ctrlKey & event.key === "Enter") {
            document.getElementById("Send").click();
        }
    });
    function ReciveMess(usert, mode) {
        UserTargetSel = usert;
        console.log(usert);
        var ReciveMess = new XMLHttpRequest();
        ReciveMess.onload = function () {
            document.getElementById("MessShow").innerHTML = ReciveMess.responseText;
            document.getElementById("title").innerHTML = UserTargetSel;
        }
        ReciveMess.open("GET", "../../api/ReciveMess.php?" + "Username=" + getCookie("User") + "&Password=" + getCookie("Pass") + "&UserTarget=" + UserTargetSel);
        ReciveMess.send();
        if (mode == "one") {
            function checkFileExists(path) {
                var xhr = new XMLHttpRequest();
                xhr.open('HEAD', path, true);
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === xhr.DONE) {
                        if (xhr.status === 200) {
                            document.getElementById("imgtitlesrc").src = path;
                        } else {
                        }
                    }
                };
                xhr.send();
            }
            var url = "../../api/ReciveProf.php?UserT=" + UserTargetSel;
            var xhr = new XMLHttpRequest();
            console.log("START")
            // URL صفحه دیگری که می‌خواهید به آن درخواست ارسال کنید

            // تنظیم نوع درخواست (GET در این مثال)
            xhr.open('GET', url, true);

            // تعریف یک تابع برای پردازش پاسخ درخواست
            xhr.onreadystatechange = function () {
                var Path = xhr.responseText;
                console.log(xhr.responseText)
                document.getElementById("imgtitlesrc").src = "../../" + xhr.responseText;

            }

            // ارسال درخواست
            xhr.send();
        }
    }
    function SendMess() {
        SendMessReq.open("GET", "../../api/SendMess.php?" + "Username=" + getCookie("User") + "&Password=" + getCookie("Pass") + "&UserTarget=" + UserTargetSel + "&Mess=" + document.getElementById("MessSend").innerText.replace("\n", "<br>"));
        SendMessReq.send();
        console.log(SendMessReq.responseText + "");
        SendMessReq.onreadystatechange = function () {
            console.log(SendMessReq.responseText)
            ReciveMess(usert = UserTargetSel, mode = "ref")
        }
        document.getElementById("MessSend").innerText = "";
    }
    function ClearMess() {
        ClearMessage.open("GET", "../../api/SendMess.php?" + "Username=" + getCookie("User") + "&Password=" + getCookie("Pass") + "&UserTarget=" + UserTargetSel + "&Mess=" + "Cleared All Chats" + "&Clear=Clear");
        ClearMessage.send();
        console.log(ClearMessage.responseText + "");
        ClearMessage.onreadystatechange = function () {
            console.log(ClearMessage.responseText)
            ReciveMess(usert = UserTargetSel, mode = "ref")

        }
    }
    function NewChat() {
        var recived = ReqApi("../../api/NewChat.php?" + "Username=" + getCookie("User") + "&Password=" + getCookie("Pass") + "&UserTarget=" + document.getElementById("UserTargetChat").value);
        if (recived.indexOf("Not") == -1) {
            console.log("TRUE");
            ReciveMess(usert = document.getElementById("UserTargetChat").value,mode="one");
        }
        console.log(recived);
    }
    function ShowNewMess() {
        document.getElementById("NewMessForm").style.visibility = "visible";
        document.getElementById("NewMessForm").style.transition = "0.1s";
    }
    function HideNewMess() {
        document.getElementById("NewMessForm").style.visibility = "hidden";
        document.getElementById("NewMessForm").style.transition = "0.1s";
    }
    function heightSet(textarea) {
        const lines = document.getElementById("MessSend").value.split('\n').length;
        const currentWidth = document.getElementById("MessSend").scrollHeight;
        document.getElementById("MessSend").style.height = currentWidth + 'px';
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
            backgroundElement.style.transition = "1s";
            backgroundElement.style.backgroundImage = backgroundUrl;
        }

        setRandomBackground();

        setInterval(setRandomBackground, 25000);
    });
    var PanelShowed = false;
    var NewsShowed = false;
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

    function ShowNews() {
        if (NewsShowed == false) {
            document.getElementById("News").style.visibility = "visible";
            document.getElementById("News").style.transition = "0.9s";
            document.getElementById("News").style.transform = "scale(1)";
            NewsShowed = true;
        } else {
            document.getElementById("News").style.visibility = "hidden";
            document.getElementById("News").style.transition = "0.9s";
            document.getElementById("News").style.transform = "scale(0.0)";
            document.getElementById("newsshow").style.display = "none";
            NewsShowed = false;
        }

    }
</script>