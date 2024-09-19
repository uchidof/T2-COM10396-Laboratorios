<?php
require_once "../dao/conexao.php";
require_once "../includes/utils.php";
require_once "../model/Suporte.php";

class SuporteDAO{
    private PDO $con;

    public function __construct()
    {
        $c = new Conexao();
        $this->con = $c->getConexao();
    }

    public function incluirSuporte(Suporte $suporte) {
        // Preparar a inserção no banco
        $sql = $this->con->prepare("INSERT INTO solicitacoes_suporte 
        (nome_solicitante, numero_matricula, laboratorio_id, dia_horario, tipo_solicitacao, descricao_solicitacao, status) 
        VALUES 
        (:nome_solicitante, :matricula, :laboratorio, :dia_horario, :tipo_solicitacao, :descricao, :status)");
    
        // Vincular os valores do objeto Suporte aos parâmetros
        $sql->bindValue(':nome_solicitante', $suporte->nome_solicitante);
        $sql->bindValue(':matricula', $suporte->matricula);
        $sql->bindValue(':laboratorio', $suporte->laboratorio);
        $sql->bindValue(':dia_horario', $suporte->dia_horario);
        $sql->bindValue(':tipo_solicitacao', $suporte->tipo_solicitacao);
        $sql->bindValue(':descricao', $suporte->descricao);
        $sql->bindValue(':status', $suporte->status);
    
        // Executar a inserção no banco de dados
        $sql->execute();
    
        // Obter o ID gerado automaticamente pelo banco de dados
        $suporteId = $this->con->lastInsertId();
    
        // Gerar o protocolo: concatenar o ID com a matrícula invertida
        $matriculaInvertida = strrev($suporte->matricula);
        $protocolo = $suporteId . $matriculaInvertida;
    
        // Atualizar o suporte no banco com o protocolo gerado
        $sqlUpdate = $this->con->prepare("update solicitacoes_suporte SET protocolo = :protocolo WHERE id = :id");
        $sqlUpdate->bindValue(':protocolo', $protocolo);
        $sqlUpdate->bindValue(':id', $suporteId);
        $sqlUpdate->execute();
    
        // Atribuir o protocolo ao objeto Suporte
        $suporte->protocolo = $protocolo;
    
        return $suporteId; // Retornar o ID do suporte
    }
    

    public function getSuportes(){
        $rs = $this->con->query("select * from solicitacoes_suporte");

        $lista = array();

        while($row = $rs->fetch(PDO::FETCH_OBJ)){   //FETCH_OBJ -> vem direto do BD como OBJETO
            $suporte=new Suporte();
            $suporte->suporte_id=$row->id;  //logo, row eh igual ao BD
            $suporte->nome_solicitante=$row->nome_solicitante;
            $suporte->matricula=$row->numero_matricula;
            $suporte->laboratorio=$row->laboratorio_id;
            $suporte->dia_horario=formatarDataHora($row->dia_horario);
            $suporte->tipo_solicitacao= $row->tipo_solicitacao;
            $suporte->descricao=$row->descricao_solicitacao;
            $suporte->protocolo=$row->protocolo;
            $suporte->status=$row->status;
    
            $lista[] = $suporte;
        }
        return $lista;

    }

    public function getSuporte($id){
        $sql = $this->con->prepare("select * from solicitacoes_suporte where id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_OBJ);

        $suporte = new Suporte();
            $suporte->suporte_id=$row->id;
            $suporte->nome_solicitante=$row->nome_solicitante;
            $suporte->matricula=$row->numero_matricula;
            $suporte->laboratorio=$row->laboratorio_id;
            $suporte->dia_horario=$row->dia_horario;
            $suporte->tipo_solicitacao=$row->tipo_solicitacao;
            $suporte->descricao=$row->descricao_solicitacao;
            $suporte->protocolo=$row->protocolo;
            $suporte->status=$row->status;

        return $suporte;
    }

    public function atualizaSuporte(Suporte $suporte) {
        // Preparar a atualização no banco
        $sql = $this->con->prepare("update solicitacoes_suporte 
        SET nome_solicitante = :nome_solicitante, 
            numero_matricula = :matricula, 
            laboratorio_id = :laboratorio, 
            dia_horario = :dia_horario, 
            tipo_solicitacao = :tipo_solicitacao, 
            descricao_solicitacao = :descricao, 
            status = :status 
        WHERE id = :id");
    
        // Vincular os valores do objeto Suporte aos parâmetros
        $sql->bindValue(':nome_solicitante', $suporte->nome_solicitante);
        $sql->bindValue(':matricula', $suporte->matricula);
        $sql->bindValue(':laboratorio', $suporte->laboratorio);
        $sql->bindValue(':dia_horario', $suporte->dia_horario);
        $sql->bindValue(':tipo_solicitacao', $suporte->tipo_solicitacao);
        $sql->bindValue(':descricao', $suporte->descricao);
        $sql->bindValue(':status', $suporte->status);
            $sql->bindValue(':id', $suporte->suporte_id); 
            // ID da solicitação que será atualizada
    
        // Executar a atualização no banco de dados
        $sql->execute();
    }
    

}

?>