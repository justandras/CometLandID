<?php
    class DiscordApi {
        private $bot_token;
        
        function __construct($bot_token){
            $this->bot_token = $bot_token;
        }

        function getAppInfo(){

            $ch = curl_init();

            curl_setopt($ch,CURLOPT_URL, "https://discord.com/api/oauth2/applications/@me");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Authorization: Bot '.$this->bot_token
            ));
            curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
            
            return json_decode(curl_exec($ch));
        }
        function getUser(){

            $ch = curl_init();

            curl_setopt($ch,CURLOPT_URL, "https://discord.com/api/users/@me");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Authorization: '.$_SESSION['authorisation']->token_type.' '.$_SESSION['authorisation']->access_token
            ));
            curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

            return json_decode(curl_exec($ch),false);
        }
        function revokeUserToken($config){
            $ch = curl_init();

            curl_setopt($ch,CURLOPT_URL, "https://discord.com/api/oauth2/token/revoke?token=");
            $fields = [
                'client_id' => $config->getClientId(),
                'client_secret' => $config->getClientSecret(),
                'token' => $_SESSION['authorisation']->access_token
            ];
            curl_setopt($ch,CURLOPT_POSTFIELDS, $fields);
            
            curl_exec($ch);
        }
    }
?>