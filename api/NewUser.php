<?php
if (is_dir("../Data/".md5($_GET["Username"]."")) == true) {
    if (file_get_contents("../Data/".md5($_GET["Username"])."/Pass.txt") == md5($_GET["Password"]))
    {
        echo " Logined As : ". $_GET["Username"];
    }
    else {
        echo " Pass Wrong";
    }
} else {
    mkdir("../Data/".md5($_GET["Username"])."/");
    $File_User = fopen(("../Data/".md5($_GET["Username"])."/User.txt"),"w+");
    fwrite($File_User,md5($_GET["Username"]));
    $File_Pass = fopen(("../Data/".md5($_GET["Username"])."/Pass.txt"),"w+");
    fwrite($File_Pass,md5($_GET["Password"]));
    echo "Created Account";
}
?>