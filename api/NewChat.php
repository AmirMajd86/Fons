<?php
if (is_dir("../Data/" . md5($_GET["Username"])) . "/" == true) {
    $Pass = file_get_contents("../Data/" . md5($_GET["Username"]) . "/Pass.txt");
    if ($Pass == md5($_GET["Password"])) {
        if (is_dir("../Data/" . md5($_GET["UserTarget"]) . "/") == true) {
            if (is_dir("../Data/" . md5($_GET["UserTarget"]) . "/Chat") == false) {
                mkdir("../Data/" . md5($_GET["UserTarget"]) . "/Chat");
            }
            if (is_dir("../Data/" . md5($_GET["UserTarget"]) . "/Chat" . "/" . $_GET["Username"]) == false) {
                mkdir("../Data/" . md5($_GET["UserTarget"]) . "/Chat" . "/" . $_GET["Username"]);
            }
            else {
                echo "You are already in the chat";
                exit();
            }
            $Chats = "../Data/" . md5($_GET["UserTarget"]) . "/Chat/Chat.txt";
            $contentToAdd = $_GET["Username"] . "\n";
            if (!file_exists($Chats)) {
                // اگر فایل وجود نداشته باشد، آن را ایجاد کنید
                file_put_contents($Chats, $contentToAdd);
            } else {
                // اگر فایل وجود داشته باشد، محتوا
                $fileContent = file_get_contents($Chats);
                if (strpos($fileContent, $contentToAdd) === false) {
                    // If the contentToAdd is not in the file, add it
                    file_put_contents($Chats, $contentToAdd, FILE_APPEND);
                } else {
                    echo "";
                }
            }
            echo "User Found";
        } else {
            echo "UserTarget Not Found : " . $_GET["UserTarget"];
            exit();
        }
        if (is_dir("../Data/" . md5($_GET["Username"]) . "/Chat") == false) {
            mkdir("../Data/" . md5($_GET["Username"]) . "/Chat");
        }
        if (is_dir("../Data/" . md5($_GET["Username"]) . "/Chat" . "/" . $_GET["UserTarget"]) == false) {
            mkdir("../Data/" . md5($_GET["Username"]) . "/Chat" . "/" . $_GET["UserTarget"]);
        }
        else {
            echo "You are already in the chat";
            exit();
        }
        $Chats = "../Data/" . md5($_GET["Username"]) . "/Chat/Chat.txt";
        $contentToAdd = $_GET["UserTarget"] . "\n";
        if (!file_exists($Chats)) {
            // اگر فایل وجود نداشته باشد، آن را ایجاد کنید
            file_put_contents($Chats, $contentToAdd);
        } else {
            // اگر فایل وجود داشته باشد، محتوا
            $fileContent = file_get_contents($Chats);
            if (strpos($fileContent, $contentToAdd) === false) {
                // If the contentToAdd is not in the file, add it
                file_put_contents($Chats, $contentToAdd, FILE_APPEND);
            } else {
                echo "";
            }
        }

    }
}
?>