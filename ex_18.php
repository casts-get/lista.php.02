<?php

function contarConsultas($consultas) {
    return count($consultas);
}

function contarPacientesDiferentes($consultas) {
    $pacientes = [];

    foreach ($consultas as $consulta) {
        $pacientes[] = $consulta["paciente"];
    }

    $pacientes = array_unique($pacientes);

    return count($pacientes);
}

function contarEspecialidades($consultas) {
    $especialidades = [];

    foreach ($consultas as $consulta) {

        $especialidade = $consulta["especialidade"];

        if (isset($especialidades[$especialidade])) {
            $especialidades[$especialidade]++;
        } else {
            $especialidades[$especialidade] = 1;
        }
    }

    return $especialidades;
}

function ordenarHorarios($consultas) {
    usort($consultas, function($a, $b) {
        return strcmp($a["horario"], $b["horario"]);
    });

    return $consultas;
}

function primeiroAtendimento($consultas) {
    $consultas = ordenarHorarios($consultas);

    return $consultas[0];
}

function ultimoAtendimento($consultas) {
    $consultas = ordenarHorarios($consultas);

    $ultima = count($consultas) - 1;

    return $consultas[$ultima];
}