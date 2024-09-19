<?php
    require_once "../model/Artigo.php";
    require_once "../includes/cabecalho.php";

    $artigos = $_SESSION['artigos'];
?>

<h1 class="text-center">Informações úteis</h1>

<div class="table-responsive">
    <table class="table table-light table-striped">
        <thead class="table-primary">
            <tr class="align-middle" style="text-align: center">
                <th style="width: 80%;">ARTIGOS</th>
                <th style="width: 20%;">Acessar</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php
            // Loop para preencher a tabela com as informações
            foreach ($artigos as $artigo) {                        
            ?>
            <tr class="align-middle">
                <td style="text-align: justify">
                    <h5><?= $artigo->titulo ?></h5> <!-- Título -->
                    <br>
                    <?= $artigo->introducao ?> <!-- Introdução abaixo do título -->
                </td>
                <td style="text-align: center">
                    <a href="<?= $artigo->link ?>" class="btn btn-primary btn-sm">Acessar</a> <!-- Botão que direciona para o link -->
                </td>
              </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>



<?php
      if ($tipo == "A") {
      
    ?>
    <p>
<h2 class="text-center">Cadastro de Artigos</h2>
<p> 
<!-- Formulário de Cadastro de Monitorias    -->
<form class="row g-3" action="../controller/controllerInformacoes.php" method="post">
  <div class="col-md-12">
    <label for="iTitulo" class="form-label">Título</label>
    <input type="text" class="form-control" name="iTitulo" required>
  </div>
  <div class="col-md-12">
    <label for="iIntro" class="form-label">Introdução</label>
    <input type="text" class="form-control" name="iIntro" required>
  </div>
  <div class="col-md-12">
    <label for="iLink" class="form-label">Link</label>
    <input type="text" class="form-control" name="iLink" required>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Cadastrar Artigos</button>
    <button type="reset" class="btn btn-danger">Cancelar</button>
  </div>
  <input type="hidden" name="opcao" value="1"> <!-- Opcao usada pela controllerInformacoes para realizar a inserção -->
</form>



<?php
}
require_once "../includes/rodape.php"
?>