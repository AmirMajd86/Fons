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
    $Chats = file("../Explore/His.txt");
    $Con = 0;
    foreach ($Chats as $line) {
        $ran_num = random_int(0,count($Chats));
        if ($Con == 55){
            break;
        }
        if ($ran_num <= count($Chats)-$ran_num)
        {
            echo "<div>" . str_replace("\n", "", $Chats[$ran_num]);
            echo "</div><hr>";
            $Con++;
        }
    }
}
?>