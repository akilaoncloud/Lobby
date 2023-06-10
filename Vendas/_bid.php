<?php

function deVirgulaParaPonto($numString){
    $pattern = '/' . "," . '/';//Padrão a ser encontrado na string 
    if (preg_match($pattern, $numString)) {
        $newString = str_replace(',', '.', $numString);
        return $newString;
    }else{
        return $numString;
    }
}

?>