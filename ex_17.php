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

function palavraMaisLonga($texto) {
    $texto = trim($texto);
    $palavras = explode(" ", $texto);

    $maior = "";

    foreach ($palavras as $palavra) {
        if (strlen($palavra) > strlen($maior)) {
            $maior = $palavra;
        }
    }

    return $maior;
}

function palavraMaisCurta($texto) {
    $texto = trim($texto);
    $palavras = explode(" ", $texto);

    $menor = $palavras[0];

    foreach ($palavras as $palavra) {
        if (strlen($palavra) < strlen($menor)) {
            $menor = $palavra;
        }
    }

    return $menor;
}

function contarPalavrasRepetidas($texto) {
    $texto = trim($texto);
    $palavras = explode(" ", $texto);

    $contagem = array_count_values($palavras);
    $repetidas = 0;

    foreach ($contagem as $quantidade) {
        if ($quantidade > 1) {
            $repetidas++;
        }
    }

    return $repetidas;
}

function palavrasMaisFrequentes($texto) {
    $texto = trim($texto);
    $palavras = explode(" ", $texto);

    $contagem = array_count_values($palavras);

    arsort($contagem);

    return array_slice($contagem, 0, 5, true);
}

function removerEspacosDuplicados($texto) {
    $texto = trim($texto);
    $texto = preg_replace('/\s+/', ' ', $texto);

    return $texto;
}

function formatarTexto($texto) {
    $texto = removerEspacosDuplicados($texto);

    return ucwords(strtolower($texto));
}

function processarTexto($texto) {

    $textoSemEspacosDuplicados = removerEspacosDuplicados($texto);

    $resultado = [
        "Quantidade de caracteres" => contarCaracteres($texto),
        "Quantidade de palavras" => contarPalavras($textoSemEspacosDuplicados),
        "Quantidade de frases" => contarFrases($texto),
        "Palavra mais longa" => palavraMaisLonga($textoSemEspacosDuplicados),
        "Palavra mais curta" => palavraMaisCurta($textoSemEspacosDuplicados),
        "Quantidade de palavras repetidas" => contarPalavrasRepetidas($textoSemEspacosDuplicados),
        "Cinco palavras mais frequentes" => palavrasMaisFrequentes($textoSemEspacosDuplicados),
        "Texto sem espaços duplicados" => $textoSemEspacosDuplicados,
        "Texto formatado" => formatarTexto($texto)
    ];

    return $resultado;
}

$texto = "o gato gosta de brincar e de dormir e o cachorro gosta de brincar.";

$resultado = processarTexto($texto);

print_r($resultado);

?>

