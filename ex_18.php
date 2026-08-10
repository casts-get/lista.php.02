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

function pesquisarPaciente($consultas, $nome) {
    $resultado = [];

    foreach ($consultas as $consulta) {

        if (strtolower($consulta["paciente"]) == strtolower($nome)) {
            $resultado[] = $consulta;
        }
    }

    return $resultado;
}

function verificarHorariosDuplicados($consultas) {
    $horarios = [];
    $duplicados = [];

    foreach ($consultas as $consulta) {

        $horario = $consulta["horario"];

        if (isset($horarios[$horario])) {
            $duplicados[] = $horario;
        } else {
            $horarios[$horario] = 1;
        }
    }

    return array_unique($duplicados);
}
function organizarAgenda($consultas, $pacientePesquisado) {

    $consultasOrdenadas = ordenarHorarios($consultas);

    $resultado = [
        "Quantidade total de consultas" => contarConsultas($consultas),
        "Quantidade de pacientes diferentes" => contarPacientesDiferentes($consultas),
        "Consultas por especialidade" => contarEspecialidades($consultas),
        "Primeiro atendimento" => primeiroAtendimento($consultas),
        "Último atendimento" => ultimoAtendimento($consultas),
        "Lista ordenada pelo horário" => $consultasOrdenadas,
        "Pesquisa do paciente" => pesquisarPaciente($consultas, $pacientePesquisado),
        "Horários duplicados" => verificarHorariosDuplicados($consultas)
    ];

    return $resultado;
}
$consultas = [
    [
        "paciente" => "Carine",
        "especialidade" => "Cardiologia",
        "data" => "10/08/2026",
        "horario" => "08:00"
    ],

    [
        "paciente" => "Ana",
        "especialidade" => "Dermatologia",
        "data" => "10/08/2026",
        "horario" => "09:30"
    ],

    [
        "paciente" => "Gabriela",
        "especialidade" => "Cardiologia",
        "data" => "10/08/2026",
        "horario" => "10:00"
    ],

    [
        "paciente" => "Amanda",
        "especialidade" => "Pediatria",
        "data" => "10/08/2026",
        "horario" => "09:30"
    ]
];

$nome = "Carine";

$resultado = organizarAgenda($consultas, $nome);

print_r($resultado);

?>