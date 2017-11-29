<?php

    

    function comprobarlong($text, $min, $max){
        $len = strlen($text);
        if($len<$min){
            return FALSE;
        }
        elseif ($len>$max) {
            return FALSE;
        }
        return TRUE;

    }

    function error($texto, $url){
        $urlLocal = "../";
        echo '<div class="card">
        <p class="pCentrado">
            ' . $texto . '
        </p>
        <div id="botones">
            <a class="button" href='. $urlLocal . $url .'> Atrás </a>
        </div>
        </div>';
        die();
    }
    ?>