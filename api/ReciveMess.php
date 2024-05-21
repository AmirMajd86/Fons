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
    // Recive Users From File Chats.txt And Show 
    $Chats = file("../Data/" . md5($_GET["Username"]) . "/Chat" . "/" . $_GET["UserTarget"] . "/Chat.txt");
    foreach ($Chats as $line) {
        echo $line."\n";
    }
}
?>