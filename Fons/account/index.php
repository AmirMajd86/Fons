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
        <link rel="icon" type="image/ico" href="ac.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <link rel="icon" type="image/ico" href="ac.ico">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <div id="progress" style="display: none;">
        <progress id="progress-bar" max="100" value="0"></progress>
        <span id="progress-label">0%</span>
    </div>
</head>

<body class="background">
    <div id="MessageWindow">
        <pre id="MessageTitle">
    Title
</pre>
        <form action="../../api/SetProfile.php" method="post" enctype="multipart/form-data">
            <input type="file" name="image" placeholder="File" id="image" accept="image/*" onchange="uploadFile()">
            <input type="submit" name="upload" id="UpImg" value="Image">
            <input type="text" name="Username" id="Username" style=" visibility:hidden;">
            <input type="text" name="Password" id="Password" style=" visibility:hidden;">
            <input type="text" name="dis" id="dis" style=" visibility:hidden;">
        </form>
        <pre id="MessageText">
        Message
    </pre>
    </div>
    <div id="title">
        Account
    </div>
    <div id="PanelRight">
        <a href="../../Fons/Setting/"><button id="Setting"></button></a>
    </div>
    <div id="PanelLeft">
        <button id="Home" onclick="location.href = ('../../')"></button>
        <a href="../../Fons/Chat"><button id="Chat"></button></a>
        <a href="../../Fons/Explore"><button id="Search"></button></a>
    </div>
    <button id="PanelShow" onclick="PanelShow()">
    </button>
    <div id='Userinfo'>
        <img id="EditPic" src="edit.png" onclick="EditPicture()" alt="آپلود فایل">
        <input type="text" id="UsernameShow" title="Username">
        <input type="password" id="PasswordShow" title="Password" style=" visibility:hidden;">
        <label for="Posts" id="Lbposts">POSTS</label>
        <div id="Posts">

        </div>
    </div>
</body>
<style>
    .background {
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        transition: background-image 1s ease-in-out;
    }
</style>

</html>
<script>
    function EditPicture() {
        document.getElementById("image").click();
    }
    function uploadFile() {
        const fileInput = document.getElementById('image');
        const submitButton = document.querySelector('input[type="submit"]');
        const progressBar = document.getElementById('progress-bar');
        const progressLabel = document.getElementById('progress-label');
        const formData = new FormData();

        if (fileInput.files.length === 1) {
            const file = fileInput.files[0];

            // اگر فایل مناسب باشد، آپلود آن را شروع کنید
            if (validateFile(file)) {
                submitButton.removeAttribute('disabled');
                formData.append('image', file);
                formData.append('Username', getCookie("User"))
                formData.append('Password', getCookie("Pass"))
                formData.append('upload', document.getElementById("UpImg"))
                // نمایش نوار پیشرفت و آپلود فایل
                document.getElementById('progress').style.display = 'block';

                const xhr = new XMLHttpRequest();
                xhr.open('POST', '../../api/SetProfile.php', true);
                xhr.upload.onprogress = function (e) {
                    if (e.lengthComputable) {
                        const percent = (e.loaded / e.total) * 100;
                        progressBar.value = percent;
                        progressLabel.innerText = percent.toFixed(2) + '%';
                    }
                };
                xhr.onload = function () {
                    if (xhr.status === 200) {
                        // آپلود با موفقیت انجام شد
                        alert("SET Picture")
                        ShowPicProfile();
                    } else {
                        // خطا در آپلود
                        alert("NOT SET Picture")
                    }
                };
                xhr.send(formData);

            } else {
                alert('MAX SIZE : 5 MB' + "\nSupport Format : jpg , jpeg , gif , png");
            }
        } else {
            alert('Please Select Image');
        }
    }

    function validateFile(file) {
        const maxFileSize = 5 * 1024 * 1024; // 5 مگابایت
        const allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        const fileExtension = file.name.split('.').pop().toLowerCase();
        return file.type.startsWith('image/') && file.size <= maxFileSize && allowedExtensions.includes(fileExtension);
    }
</script>
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
    var NewsShowed = false;
    document.getElementById("UsernameShow").value = getCookie("User");
    document.getElementById("PasswordShow").value = getCookie("Pass");
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
    document.getElementById("Username").value = getCookie("User");
    document.getElementById("Password").value = getCookie("Pass");
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
            NewsShowed = false;
        }

    }
    PanelShow();
    var bool = true;
    function checkFileExists(path) {
        var xhr = new XMLHttpRequest();
        xhr.open('HEAD', path, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === xhr.DONE) {
                if (xhr.status === 200) {
                    document.getElementById("EditPic").src = path;
                    bool = true
                } else {
                    bool = false
                }
            }
        };
        xhr.send();
    }
    function ShowPicProfile() {
        var filePath2 = "../../Profile/" + getCookie("User") + "/profile.jpeg";
        var filePath = "../../Profile/" + getCookie("User") + "/profile.png";
        var filePath1 = "../../Profile/" + getCookie("User") + "/profile.gif";
        var filePath3 = "../../Profile/" + getCookie("User") + "/profile.jpg";
        checkFileExists(filePath)
        checkFileExists(filePath2)
        checkFileExists(filePath1)
        checkFileExists(filePath3)
        if (bool = false) {
            var DefualtPic = "edit.png";
            document.getElementById("EditPic").src = DefualtPic;
        }
    }
    ShowPicProfile();
    var RecivePosts = new XMLHttpRequest();
    RecivePosts.onload = function () {
        document.getElementById("Posts").innerHTML = RecivePosts.responseText.replace("\n", "");
    }
    RecivePosts.open("GET", "../../api/RecivePosts.php?" + "Username=" + getCookie("User") + "&Password=" + getCookie("Pass") + "&UserTarget=" + getCookie("User"));
    RecivePosts.send();
</script>