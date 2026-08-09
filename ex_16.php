<?php

function contarMaiusculas($senha) {
    $quantidade = 0;

    for ($i = 0; $i < strlen($senha); $i++) {
        if (ctype_upper($senha[$i])) {
            $quantidade++;
        }
    }

    return $quantidade;
}

function contarMinusculas($senha) {
    $quantidade = 0;

    for ($i = 0; $i < strlen($senha); $i++) {
        if (ctype_lower($senha[$i])) {
            $quantidade++;
        }
    }

    return $quantidade;
}

function contarNumeros($senha) {
    $quantidade = 0;

    for ($i = 0; $i < strlen($senha); $i++) {
        if (ctype_digit($senha[$i])) {
            $quantidade++;
        }
    }

    return $quantidade;
}

function contarEspeciais($senha) {
    $quantidade = 0;

    for ($i = 0; $i < strlen($senha); $i++) {
        if (!ctype_alnum($senha[$i])) {
            $quantidade++;
        }
    }

    return $quantidade;
}

function classificarSenha($maiusculas, $minusculas, $numeros, $especiais, $tamanho) {

    $pontos = 0;

    if ($tamanho >= 8) {
        $pontos++;
    }

    if ($maiusculas > 0) {
        $pontos++;
    }

    if ($minusculas > 0) {
        $pontos++;
    }

    if ($numeros > 0) {
        $pontos++;
    }

    if ($especiais > 0) {
        $pontos++;
    }

    if ($pontos <= 1) {
        return "Fraca";
    } elseif ($pontos == 2) {
        return "Média";
    } elseif ($pontos == 3 || $pontos == 4) {
        return "Forte";
    } else {
        return "Muito Forte";
    }
}

function analisarSenha($senha) {

    $maiusculas = contarMaiusculas($senha);
    $minusculas = contarMinusculas($senha);
    $numeros = contarNumeros($senha);
    $especiais = contarEspeciais($senha);
    $tamanho = strlen($senha);

    $nivel = classificarSenha(
        $maiusculas,
        $minusculas,
        $numeros,
        $especiais,
        $tamanho
    );

    return [
        "Maiúsculas" => $maiusculas,
        "Minúsculas" => $minusculas,
        "Números" => $numeros,
        "Especiais" => $especiais,
        "Tamanho" => $tamanho,
        "Nível de segurança" => $nivel
    ];
}

$senha = "Carine123";

$resultado = analisarSenha($senha);

print_r($resultado);

?>








































































 