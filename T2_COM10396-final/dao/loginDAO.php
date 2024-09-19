<?php
require_once "conexao.php";

class LoginDAO{
    private PDO $con;

    public function __construct()
    {
        $c = new Conexao();
        $this->con = $c->getConexao();
    }

    public function Autenticar($matricula, $senha) {
        echo "Buscando ADM";
        $sql = $this->con->prepare("select * from usuarios where matricula = :matricula and senha = :senha");

        $matricula = strtolower($matricula);
        $senha = strtolower($senha);

        $sql->bindValue(":matricula", $matricula);
        $sql->bindValue(":senha", $senha);
        $sql->execute();

        $cliente = null;

        if($sql->rowCount() == 1){
            $cliente = $sql->fetch(PDO::FETCH_ASSOC);
        }

        return $cliente;
            //Se o cliente foi encontrado no SELECT sera retornado pela funcao
    }
}