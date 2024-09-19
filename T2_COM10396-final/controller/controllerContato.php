<?php
    include "../dao/contatoDAO.php";

    $opcao = null;
    if (isset($_REQUEST['opcao'])) {
        $opcao = (int)$_REQUEST['opcao'];
    }   

    if ($opcao == 1) {
        //echo "Tentando inserir mensagem no BD:";
        $contato = new Contato();
        $contato->setMensagem($_REQUEST['cNome'], $_REQUEST['cEmail'], $_REQUEST['cAssunto'], $_REQUEST['cMensagem'] );

        $contatoDAO = new ContatoDAO();
        $contatoDAO->incluirContato($contato);

        //TROCAR
        header("Location: ../views/index.php");
    }

    function recuperaContatos(){ //Recupera os Contatos do BD 
        $contatoDAO = new ContatoDAO();
        $lista = $contatoDAO->getContatos();

        return $lista;
    }
?>