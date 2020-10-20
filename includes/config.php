<?php
    class Config {
        private $app_path;
        private $redirect_url;
        private $client_id;
        private $client_secret;
        private $scope;
        private $bot_token;
        private $default_locale;

        function __construct($path){
            $jsonConfig = file_get_contents($path);
            $decodedConfig = json_decode($json = $jsonConfig, $assoc = false );
            
            $this->app_path = $decodedConfig->app_path;
            $this->client_id = $decodedConfig->client_id;
            $this->client_secret = $decodedConfig->client_secret;
            $this->redirect_url = $decodedConfig->redirect_url;
            $this->scope = $decodedConfig->scope;
            $this->bot_token = $decodedConfig->bot_token;
            $this->default_locale = $decodedConfig->default_locale;
        }

        function getAppPath(){
            return $this->app_path;
        }
        function getRedirectUrl(){
            return $this->redirect_url;
        }
        function getClientId(){
            return $this->client_id;
        }
        function getClientSecret(){
            return $this->client_secret;
        }
        function getScope(){
            return $this->scope;
        }
        function getBotToken(){
            return $this->bot_token;
        }
        function getDefaultLocale(){
            return $this->default_locale;
        }
    }
?>