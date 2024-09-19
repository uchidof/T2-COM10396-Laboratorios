<?php
class Suporte {
    private int $suporte_id;
    private string $nome_solicitante;
    private string $matricula;
    private int $laboratorio;
    private string $dia_horario; // Mantido como string para fácil manipulação, pode ser convertido posteriormente
    private string $tipo_solicitacao;
    private string $descricao;
    private string $protocolo;
    private string $status;
    private int $data_solicitacao;

    // Método para definir as propriedades da solicitação de suporte
    public function setSuporte($nome, $matricula, $laboratorio, $diaHorario, $tipoSolicitacao, $descricao) {
        $this->nome_solicitante = $nome;
        $this->matricula = $matricula;
        $this->laboratorio = $laboratorio;
        $this->dia_horario = $diaHorario;
        $this->tipo_solicitacao = $tipoSolicitacao;
        $this->descricao = $descricao;
        $this->status = "Aberto";
    }

    // Método mágico __set para definir valores
    public function __set($atrib, $value) {
        $this->$atrib = $value;
    }

    // Método mágico __get para obter valores
    public function __get($atrib) {
        return $this->$atrib;
    }

    // Método para definir a data de solicitação em formato de timestamp
    public function setDtSolicitacao($dataE) {
        $this->data_solicitacao = strtotime($dataE); // Converte a string de data para timestamp
    }

    // Método para definir o protocolo
    public function setProtocolo($id, $matricula) {
        // Inverter a string da matrícula
        $matriculaInvertida = strrev($matricula);
        
        // Concatenar o id com a matrícula invertida
        return $this->protocolo = $id . $matriculaInvertida;
    }
}
?>
