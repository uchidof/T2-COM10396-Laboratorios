<?php
require_once "../dao/conexao.php";
require_once "../model/Monitoria.php";

class MonitoriaDAO{
    private PDO $con;

public function __construct()
{
    $c = new Conexao();
    $this->con = $c->getConexao();
}

public function incluirMonitoria(Monitoria $monitoria){
    $sql = $this->con->prepare("insert into monitorias 
    (nome_monitor, sala, horario, disciplina) values 
    (:nome_monitor, :sala, :horario, :disciplina)");
        //Parametriza/Prepara a query

    //Vincula o valor do atributo do OBJETO ao atributo no BD
    $sql->bindValue(':nome_monitor', $monitoria->nome_monitor);
    $sql->bindValue(':sala', $monitoria->sala);
    $sql->bindValue(':horario', $monitoria->horario);
    $sql->bindValue(':disciplina', $monitoria->disciplina);
    

    //Realiza a query de INSERCAO no BD
    $sql->execute();
}

public function excluirMonitoria($id){
    $sql = $this->con->prepare("delete from monitorias where id = :monitoria_id");
        //Parametriza/Prepara a query

    $sql->bindValue(':monitoria_id', $id); //Vincula o valor do atributo do OBJETO ao atributo no BD
    $sql->execute();    //Realiza a query de EXCLUSAO no BD, usando o id Vinculado
}

public function alteraMonitoria(Monitoria $monitoria){
    $sql = $this->con->prepare("update monitorias set nome_monitor = :nome_monitor, sala = :sala, horario = :horario, disciplina = :disciplina where id = :id ");

    $sql->bindValue(':nome_monitor', $monitoria->nome_monitor);
    $sql->bindValue(':sala', $monitoria->sala);
    $sql->bindValue(':horario', $monitoria->horario);
    $sql->bindValue(':disciplina', $monitoria->disciplina);
        
    $sql->bindValue(':id', $monitoria->monitoria_id);
    $sql->execute();
}

public function getMonitorias(){  //Adquire os (objetos) monitoria do BD
    $rs = $this->con->query("select * from monitorias");

    $lista = array();

    while($row = $rs->fetch(PDO::FETCH_OBJ)){   //FETCH_OBJ -> vem direto do BD como OBJETO
        $monitoria=new Monitoria();
        $monitoria->monitoria_id=$row->id;  //logo, row eh igual ao BD
        $monitoria->nome_monitor=$row->nome_monitor;
        $monitoria->sala=$row->sala;
        $monitoria->horario=$row->horario;
        $monitoria->disciplina=$row->disciplina;

        $lista[] = $monitoria;
    }
    return $lista;
}

public function getMonitoria($id){

    $sql = $this->con->prepare("select * from monitorias where id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();
    $row = $sql->fetch(PDO::FETCH_OBJ);

    $monitoria = new Monitoria();
        $monitoria->monitoria_id=$row->id;
        $monitoria->nome_monitor=$row->nome_monitor;
        $monitoria->sala=$row->sala;
        $monitoria->horario=$row->horario;
        $monitoria->disciplina=$row->disciplina;

    return $monitoria;
}

}

?>