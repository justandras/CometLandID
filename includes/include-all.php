<?php 
    $path = $_SERVER['DOCUMENT_ROOT']."/dev/cometland";

    require_once($path."/includes/config.php");
    require_once($path."/includes/locales/locale-loader.php");

    $config = new Config($path."/config.json");
?>