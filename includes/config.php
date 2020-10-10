<?php
    class Config {
        private $redirect_url;
        private $client_id;
        private $client_secret;
        private $redirect_uri;
        private $scope;

        function __construct($path){
            $jsonConfig = file_get_contents($path);
            $decodedConfig = json_decode($json = $jsonConfig, $assoc = false );
            
            $this->client_id = $decodedConfig->client_id;
            $this->client_secret = $decodedConfig->client_secret;
            $this->redirect_url = $decodedConfig->redirect_url;
            $this->redirect_uri = $decodedConfig->redirect_uri;
            $this->scope = $decodedConfig->scope;
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
        function getRedirectUri(){
            return $this->redirect_uri;
        }
        function getScope(){
            return $this->scope;
        }
    }
?>