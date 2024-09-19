<?php
    require_once "../dao/loginDAO.php";

    $opcao = (int)$_REQUEST['opcao'];

    $loginDAO = new LoginDAO;
    //echo "Iniciando LOGIN...";

    if($opcao == 1){
        //recupero as informações do login passados pelo formulario
        $matricula = $_REQUEST["pMatricula"];
        $senha = $_REQUEST["pSenha"];
    
        //passo o email e senha para ser autenticado pelo clienteDao
        $adm = $loginDAO->Autenticar($matricula, $senha);
            //Se corresponde ao BD, as informacoes do ADM estarao na variavel
    
        //verifica as credenciais correponde a algum cliente
        if($adm != null){
            session_start();
            $_SESSION["adm"] = $adm;
            
            header("Location: ../views/apresentacao.php");
        }else{
            header("Location: ../views/formLogin.php?erro=1");
        }
    } else{
        if($opcao == 2){
            session_start();
            unset($_SESSION["adm"]);
            header("Location: ../views/formLogin.php");
        }
    }


?>
