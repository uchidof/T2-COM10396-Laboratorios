<?php
    include "../dao/suporteDAO.php";

    $opcao = null;
    if (isset($_REQUEST['opcao'])) {
        $opcao = (int)$_REQUEST['opcao'];
    }

    if ($opcao == 1) {  //Adiciona e/ou Inclui uma nova requisicao de Suporte
        //echo "Tentando inserir Suporte no BD:";
        $suporte = new Suporte();
        $suporte->setSuporte($_REQUEST['sNome'], $_REQUEST['sMatricula'], $_REQUEST['sLaboratorio'], $_REQUEST['sDiaHorario'], $_REQUEST['sTipoSolicitacao'], $_REQUEST['sDescricao'] );

        $suporteDAO = new SuporteDAO();
        $suporteDAO->incluirSuporte($suporte);

        header("Location: ../views/suporteAcompanha.php");
    }else if ($opcao == 2) {
        //RECUPERA SUPORTES
        $suporteDAO = new SuporteDAO();
        $lista = $suporteDAO->getSuportes();

        session_start();
        $_SESSION['suportes'] = $lista;

        header("Location: ../views/suporteAcompanha.php");
    }else if ($opcao == 3) {
        //BUSCA SUPORTES para Atualizar

        $id = $_REQUEST['id'];

        $suporteDAO = new SuporteDAO();

        $suporte = $suporteDAO->getSuporte($id);

        session_start();
        $_SESSION['suporte'] = $suporte;
        
        header("Location: ../views/suporteAtualiza.php");
    }else if ($opcao == 4) {
        //ALTERAR MONITORIA
        //echo "Tentando inserir no BD:";

        $suporte = new Suporte();
        // Definindo as propriedades do suporte
        $suporte->setSuporte($_REQUEST['sNome'], $_REQUEST['sMatricula'], $_REQUEST['sLaboratorio'], $_REQUEST['sDiaHorario'], $_REQUEST['sTipoSolicitacao'], $_REQUEST['sDescricao']);
        $suporte->status = $_REQUEST['sStatus'];
        $suporte->suporte_id = $_REQUEST['sId'];

        $suporteDAO = new SuporteDAO();
        $suporteDAO->atualizaSuporte($suporte);


        header("Location: ../controller/controllerSuporte.php?opcao=2");
    }


?>