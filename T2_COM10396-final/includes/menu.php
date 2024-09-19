<?php 
session_start();
if (isset($_SESSION['adm'])) {
    $tipo = "A";
}else{
    $tipo = "C";
}

?>

<!-- Menu Superior Horizontal -->
<ul class="nav col-md-12 justify-content-center">
                <li><a href="../views/apresentacao.php" class="nav-link px-2 link-secondary"><b>APRESENTAÇÃO</b></a></li>
                <li><a href="../views/salas.php" class="nav-link px-2 link-secondary"><b>SALAS</b></a></li>
                <li><a href="../controller/controllerLabs.php?opcao=1" class="nav-link px-2 link-secondary"><b>SUPORTE</b></a></li>
                <li><a href="../views/formContato.php" class="nav-link px-2 link-secondary"><b>FALE CONOSCO</b></a></li>
                <?php 
                    if ($tipo == "A") {
                        echo "<li><a href='../controller/controllerLogin.php?opcao=2' class='nav-link px-2 link-secondary'><b>Logoff (Sair)</b></a></li>";
                    }else{
                        echo "<li><a href='../views/formLogin.php' class='nav-link px-2 link-secondary'><b>LOGIN (Entrar)</b></a></li>";
                    }
                ?>
                
            </ul>

            </header>

        <!-- Conteúdo Principal -->
        <div class="row my-5">
            <!-- Menu Lateral -->
            <aside class="col-md-3">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active" aria-current="true"><b>MENU</b></a>
                    <a href="../views/infraestrutura.php" class="list-group-item list-group-item-action">INFRAESTRUTURA</a>
                    <a href="../controller/controllerLabs.php?opcao=2" class="list-group-item list-group-item-action">MONITORIA</a>
                    <a href="../controller/controllerInformacoes.php?opcao=3" class="list-group-item list-group-item-action">INFORMAÇÕES ÚTEIS</a>
                </div>
            </aside>

            <!-- Seção Principal -->
            <section class="col-md-9">