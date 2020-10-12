<?php 
    $path = $_SERVER['DOCUMENT_ROOT']."/dev/cometland";

    require_once($path."/includes/config.php");

    $config = new Config($path."/config.json");
?>