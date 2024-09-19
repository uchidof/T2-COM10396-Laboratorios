<?php
    require_once "../dao/informacoesDAO.php";

    $opcao = null;
    if (isset($_REQUEST['opcao'])) {
        $opcao = (int)$_REQUEST['opcao'];
    }    

    if ($opcao == 1) {  //ADICIONAR
        //echo "Tentando inserir no BD:";
        $artigo= new Artigo();
        $artigo->setArtigo($_REQUEST['iTitulo'], $_REQUEST['iIntro'], $_REQUEST['iLink'],);

        $informacoesDAO = new InformacoesDAO();
        $informacoesDAO->incluirArtigo($artigo);

        header("Location: ../views/informacoes.php");

    }else if ($opcao == 2) {    //EXCLUIR   //REFAZER
        $id = $_REQUEST['id'];

        $monitoriaDAO = new MonitoriaDAO(); //Faz a conexao para Acessar o BD

        $monitoriaDAO->excluirMonitoria($id);   //Passa o id para a funcao de EXCLUIR o Produto do BD (pelo produtoDAO)

        header("Location: ../views/monitoria.php");
        //Direciona para a Pagina de Exibir Produtos
    }else if ($opcao == 3) {
        //RECUPERAR ARTIGOS

        $artigosDAO = new InformacoesDAO();
        $lista = $artigosDAO->getArtigos();

        session_start();
        $_SESSION['artigos'] = $lista;

        header("Location: ../views/informacoes.php");
    }




?>