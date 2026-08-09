<?php

function contarCaracteres($texto) {
    return strlen($texto);
}

function contarPalavras($texto) {
    $texto = trim($texto);
    $palavras = explode(" ", $texto);
    return count($palavras);
}

function contarFrases($texto) { 
    $ponto = substr_count($texto, "."); 
    $exclamacao = substr_count($texto, "!"); 
    $interrogacao = substr_count($texto, "?"); 
    return $ponto + $exclamacao + $interrogacao; 
}

