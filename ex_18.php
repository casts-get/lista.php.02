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
