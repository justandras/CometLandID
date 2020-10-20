<?php 
    require_once("config.php");
    require_once("locales/locale-loader.php");
    require_once("discord-api.php");

    $currd = getcwd();
    if (strpos($currd,"discord-callback") !== false) {
        $currd = str_replace("discord-callback", "", $currd);
    }
    else{
        $currd .= "/";
    }
    $config = new Config($currd."config.json");
?>