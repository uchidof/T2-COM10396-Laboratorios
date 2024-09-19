<?php
include "../dao/labsDAO.php";

$opcao = null;
    if (isset($_REQUEST['opcao'])) {
        $opcao = (int)$_REQUEST['opcao'];
    } 



if ($opcao == 1 || $opcao == 2) {
        $labsDAO = new LabsDAO();
        $lista = $labsDAO->getLaboratorios(); 
        session_start();
        $_SESSION['laboratorios'] = $lista; //Passa a lista de Labs para SESSAO

        if ($opcao == 1) {
                header("Location: ../views/formSuporte.php");
        }else if ($opcao == 2) {
                header("Location: ../views/monitoria.php");
        }
     
}

?>