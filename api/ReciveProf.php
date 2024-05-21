<?php
$Path = file_get_contents("../Profile/".$_GET["UserT"]."/name.txt");
echo "Profile/".$_GET["UserT"]."/".$Path;
?>