<?php
    require_once "../dao/monitoriaDAO.php";

    $opcao = null;
    if (isset($_REQUEST['opcao'])) {
        $opcao = (int)$_REQUEST['opcao'];
    }    

    if ($opcao == 1) {  //Adiciona e/ou Inclui uma nova Monitoria
        echo "Tentando inserir no BD:";
        $monitoria = new Monitoria();
        $monitoria->setMonitoria($_REQUEST['mNome'], $_REQUEST['mLaboratorio'], $_REQUEST['mHorario'],$_REQUEST['mDisciplina'] );

        $monitoriaDAO = new MonitoriaDAO();
        $monitoriaDAO->incluirMonitoria($monitoria);

        //TROCAR
        header("Location: ../views/monitoria.php");
    }else if ($opcao == 2) {
        $id = $_REQUEST['id'];

        $monitoriaDAO = new MonitoriaDAO(); //Faz a conexao para Acessar o BD

        $monitoriaDAO->excluirMonitoria($id);   //Passa o id para a funcao de EXCLUIR o Produto do BD (pelo produtoDAO)

        header("Location: ../views/monitoria.php");
        //Direciona para a Pagina de Exibir Produtos
    }else if ($opcao == 3) {
        //BUSCA

        $id = $_REQUEST['id'];

        $monitoriaDAO = new MonitoriaDAO(); //Faz a conexao para Acessar o BD

        $monitoria = $monitoriaDAO->getMonitoria($id);

        session_start();
        $_SESSION['monitoria'] = $monitoria;

        header("Location: ../views/monitoriaAlterar.php");
    }else if ($opcao == 4) {
        //ALTERAR MONITORIA
        echo "Tentando inserir no BD:";
        $monitoria = new Monitoria();
        $monitoria->setMonitoria($_REQUEST['mNome'], $_REQUEST['mLaboratorio'], $_REQUEST['mHorario'],$_REQUEST['mDisciplina'] );
        $monitoria->monitoria_id = $_REQUEST['mId'];

        $monitoriaDAO = new MonitoriaDAO();
        $monitoriaDAO->alteraMonitoria($monitoria);

        header("Location: ../views/monitoria.php");
    }

    function recuperaMonitorias(){ //Recupera os laboratorios do BD 
        $monitoriaDAO = new MonitoriaDAO();
        $lista = $monitoriaDAO->getMonitorias();

        return $lista;
    }

    // Função para encontrar o nome do laboratório com base no ID
    function getNomeLaboratorio($laboratorios, $laboratorioId) {
        foreach ($laboratorios as $lab) {
            if ($lab->id == $laboratorioId) {
                return $lab->nome;
            }
        }
        return "Laboratório não encontrado"; // Caso o laboratório não seja encontrado
    }



?>