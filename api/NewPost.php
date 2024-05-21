<?php
if (is_dir("../Data/" . md5($_GET["Username"])) . "/" == true) {
    $Pass = file_get_contents("../Data/" . md5($_GET["Username"]) . "/Pass.txt");
    if ($Pass == md5($_GET["Password"])) {
        $Explore = "../Explore/His.txt";
        $contentToAdd = "\n <button onclick='clickOnUser(user = \"".$_GET["Username"]."\")'>".$_GET["Username"]." </button> <b> ".$_GET["Text"]."</b>";
        file_put_contents($Explore, $contentToAdd, FILE_APPEND);
        mkdir("../Explore/" . md5($_GET["Username"]) . "/");
        $dirCount = 0;
        $files = scandir("../Explore/" . md5($_GET["Username"]) . "/");
        foreach ($files as $file) {
            if (is_dir("../Explore/" . md5($_GET["Username"]) . "/" . '/' . $file) && $file != '.' && $file != '..') {
                $dirCount++;
            }
        }
        $dirCount++;
        mkdir("../Explore/" . md5($_GET["Username"]) . "/" . $dirCount . "/");
        $Explore = "../Explore/" . md5($_GET["Username"]) . "/Posts.txt";
        $contentToAdd = $dirCount . "\n";
        if (!file_exists($Explore)) {
            // اگر فایل وجود نداشته باشد، آن را ایجاد کنید
            file_put_contents($Explore, $contentToAdd);
        } else {
            // اگر فایل وجود داشته باشد، محتوا
            $fileContent = file_get_contents($Explore);
            if (strpos($fileContent, $contentToAdd) === false) {
                // If the contentToAdd is not in the file, add it
                file_put_contents($Explore, $contentToAdd, FILE_APPEND);
            } else {
                echo "";
            }
        }
        $Explore = "../Explore/" . md5($_GET["Username"]) . "/" . $dirCount . "/" . "Text.txt";
        $contentToAdd = $_GET["Text"] . "\n";
        if (!file_exists($Explore)) {
            // اگر فایل وجود نداشته باشد، آن را ایجاد کنید
            file_put_contents($Explore, $contentToAdd);
        } else {
            // اگر فایل وجود داشته باشد، محتوا
            $fileContent = file_get_contents($Explore);
            if (strpos($fileContent, $contentToAdd) === false) {
                // If the contentToAdd is not in the file, add it
                file_put_contents($Explore, $contentToAdd, FILE_APPEND);
            } else {
                echo "";
            }
        }
    }
}
?>