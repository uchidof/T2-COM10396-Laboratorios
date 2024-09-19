<?php

function formatarData($data)
{
    return date('d/m/Y',$data); //Formata DateTime para Exibicao desejada
}

function converterDataMysql($data) {    
    return date('Y-m-d', $data);    //Formata DateTime para Exibicao desejada
    //Neste caso, o formato SQL
}

function formatarDataHora($data)
{
    return date('d/m/Y H:i', strtotime($data)); // Formata para 'dia/mês/ano horas:minutos'
}


?>