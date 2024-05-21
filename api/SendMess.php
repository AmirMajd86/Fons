<?php
if (is_dir("../Data/" . md5($_GET["Username"])) . "/" == true) {
    $Pass = file_get_contents("../Data/" . md5($_GET["Username"]) . "/Pass.txt");
    if ($Pass == md5($_GET["Password"])) {
        // Run if Pass = true And User = true;
        Run();
    }
}
function Run()
{
    // Write Message To File User Chat Sender     
    $Chats = "../Data/" . md5($_GET["Username"]) . "/Chat" . "/" . $_GET["UserTarget"] . "/Chat.txt";
    $contentToAdd = "<pre id='i'>" . $_GET["Mess"] . "</pre>" . "\n";
    if (!file_exists($Chats)) {
        // اگر فایل وجود نداشته باشد، آن را ایجاد کنید
        file_put_contents($Chats, $contentToAdd);
    } else {
        // اگر فایل وجود داشته باشد، محتوا
        file_put_contents($Chats, $contentToAdd, FILE_APPEND);
    }
    // Write Message To File User Chat Reciver     
    if ($_GET["Username"] == $_GET["UserTarget"]) {

    } else {
        $Chats = "../Data/" . md5($_GET["UserTarget"]) . "/Chat" . "/" . $_GET["Username"] . "/Chat.txt";
        $contentToAdd = "<pre id='w'>" . $_GET["Mess"] . "</pre>" . "\n";
        if (!file_exists($Chats)) {
            // اگر فایل وجود نداشته باشد، آن را ایجاد کنید
            file_put_contents($Chats, $contentToAdd);
        } else {
            // اگر فایل وجود داشته باشد، محتوا
            file_put_contents($Chats, $contentToAdd, FILE_APPEND);
        }
    }

    if (isset($_GET["Clear"]) == true) {
        // Recive Users From File Chats.txt And Show 
        $Chats = "../Data/" . md5($_GET["Username"]) . "/Chat" . "/" . $_GET["UserTarget"] . "/Chat.txt";
        $contentToAdd = "<p id='i'>" . $_GET["Mess"] . "</p>" . "\n";
        if (!file_exists($Chats)) {
            // اگر فایل وجود نداشته باشد، آن را ایجاد کنید
            file_put_contents($Chats, $contentToAdd);
        } else {
            // اگر فایل وجود داشته باشد، محتوا
            file_put_contents($Chats, $contentToAdd);
        }
        $Chats = "../Data/" . md5($_GET["UserTarget"]) . "/Chat" . "/" . $_GET["Username"] . "/Chat.txt";
        $contentToAdd = "<p id='w'>" . $_GET["Mess"] . "</p>" . "\n";
        if (!file_exists($Chats)) {
            // اگر فایل وجود نداشته باشد، آن را ایجاد کنید
            file_put_contents($Chats, $contentToAdd);
        } else {
            // اگر فایل وجود داشته باشد، محتوا
            file_put_contents($Chats, $contentToAdd);
        }
    }
}
?>