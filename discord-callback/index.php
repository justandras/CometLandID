<?php
    session_start();

    require_once("../includes/include-all.php");

    $ch = curl_init();

    curl_setopt($ch,CURLOPT_URL, "https://discord.com/api/oauth2/token");
    curl_setopt($ch,CURLOPT_POST, true);
    $fields = [
        'client_id' => $config->getClientId(),
        'client_secret' => $config->getClientSecret(),
        'grant_type' => "authorization_code",
        'code'=> $_GET["code"],
        'redirect_uri' => $config->getRedirectUri(),
        'scope' => $config->getScope()
    ];
    curl_setopt($ch,CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

    $authorisation = json_decode(curl_exec($ch),false);

    $_SESSION['authorisation'] = $authorisation;

    header('Location: /dev/cometland/');
?>