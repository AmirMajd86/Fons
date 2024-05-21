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
    $Chats = file("../Explore/" . md5($_GET["UserTarget"]) . "/Posts.txt");
    foreach ($Chats as $line) {
        echo "<b>" . str_replace("\n","",$line) . " : " . str_replace("\n", "", file_get_contents("../Explore/" . md5($_GET["UserTarget"]) . "/" . trim($line) . "/Text.txt"));
        echo "</b><br><br>";
    }
}
?>