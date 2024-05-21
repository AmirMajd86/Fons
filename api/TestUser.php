<?php
if (is_dir("../Data/" . md5($_GET["Username"])) . "/" == true) {
    $Pass = file_get_contents("../Data/" . md5($_GET["Username"]) . "/Pass.txt");
    if ($Pass == md5($_GET["Password"])) {
        // Run if Pass = true And User = true;
        Run();
    }
    else {
        echo "False";
    }
}
function Run()
{
    echo "True";
}
?>