<?php 
    require_once("config.php");
    require_once("locales/locale-loader.php");

    $currd = getcwd();
    if (strpos($currd,"discord-callback") !== false) {
        $currd = str_replace("\discord-callback", "", $currd);
    }
    $config = new Config($currd."/config.json");
?>