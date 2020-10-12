<?php
    class LocaleLoader {
        private $locale;

        function __construct($countryCode){
            $this->loadLocale($countryCode);
        }

        
        function loadLocale($countryCode){
            if (file_exists($this->getPath($countryCode)))
            {
                $this->locale = json_decode(file_get_contents($this->getPath($countryCode)),true);
            }
            else
            {
                $this->loadLocale("en-us");
            }
        }
        function getString($stringId){
            if (isset($this->locale[$stringId]))
            {
                return $this->locale[$stringId];
            }
            else{
                $lorem = explode(" ","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur fringilla, velit at suscipit fermentum");
                return $lorem[array_rand($lorem,1)];
            }
        }
        function getPath($countryCode){
            return "includes/locales/translations/$countryCode.json";
        }
        function echoString($stringId){
            echo $this->getString($stringId);
        }
    }
?>