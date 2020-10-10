<?php 
    $path = $_SERVER['DOCUMENT_ROOT']."/dev/cometland";

    include $path."/includes/config.php";

    $config = new Config($path."/config.json");
?>