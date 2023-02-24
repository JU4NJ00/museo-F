<?php
    function concatenar($palabra){
        $palabra=trim($palabra);
            $palabras= explode(' ',$palabra);
            $ini="";
            foreach ($palabras AS $elemento){
                

                $ini=$ini.$elemento[0]."-";
                
            }

            $ini=substr($ini,0,strlen($ini)-1);
            $ini=strtoupper($ini);

            return $ini;
        }
?>