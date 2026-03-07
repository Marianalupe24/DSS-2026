<?php
    class guestData{

        //propiedades
        protected $ipGuest;
        protected $nameScript;
        protected $dateTimeGuest;
        private $file;

        //métodos para escribir 

        function setIpGuest($ipGuest){
            $this->ipGuest = $ipGuest;
        }

        function setNameScript($nameScript){
            $this->nameScript = $nameScript;
        }

        function setDateTimeGuest($dateTimeGuest){
            $this->dateTimeGuest = $dateTimeGuest;
        }
        function setFile($file){
            $this->file = $file;
        }

         //métodos de lectura 
        function getIpGuest($ipGuest){
            $this->ipGuest = $ipGuest;
        }

        function getNameScript($nameScript){
            $this->nameScript = $nameScript;
        }

        function getDateTimeGuest($dateTimeGuest){
            $this->dateTimeGuest = $dateTimeGuest;
        }
        function getFile($file){
            $this->file = $file;
        }

         //Funciónes

        function showGuest(){
            echo "<div id=\"showGuest\">";
            echo "$this->ipGuest.<br>";
            echo "$this->nameScript.<br>";
            echo "$this->dateTimeGuest.<br>";
            echo "</div>";
        }

        function saveGuest(){
           $outputstring = $this->ipGuest . " : " . $this->nameScript . " : " . $this->dateTimeGuest. "\n";
            
           $path = "./datos/$this->file";
            @$fh = fopen($path, "ab");
            if(!$fh){
                $fh = fopen($path, "wb");
                }
                fwrite($fh, utf8_decode($outputstring), strlen($outputstring));

                fclose($fh);
                echo "<div class='alerta'>Datos guardados en la ruta indicada $path</div>";
               
                }   
        }

?>