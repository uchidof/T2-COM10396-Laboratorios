<?php
    require_once "../controller/controllerContato.php";
    require_once "../includes/utils.php";
    require_once "../includes/cabecalho.php";

    $contatos = recuperaContatos();
?>
<p>
<h1 class="text-center">Fale Conosco</h1>
<p> 
    <?php
      if ($tipo == "A") {
    ?>
        <p>
      <h2 class="text-center">Mensagens recebidas</h2>
<p>
<div class="table-responsive">
    <table class="table table-ligth table-striped">
        <thead class="table-primary">
            <tr class="align-middle" style="text-align: center">
                <th>Remetente</th>
                <th>E-mail</th>
                <th>Assunto</th>
                <th>Mensagem</th>
                <th>Data de Envio</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">

            <?php
                  foreach ($contatos as $contato) 
                  {                        
                  ?>
            <tr class="align-middle" style="text-align: center">
                <td><?= $contato->nome_remetente?></td>
                <td><?= $contato->email?></td>
                <td><?= $contato->assunto?></td>
                <td><?= $contato->mensagem?></td>
                <td><?= formatarData($contato->data_envio)?></td>                
            </tr>
            <?php
                  }
            ?>

    </table>
                </div>
                </p>
    <?php
      }else{
    ?>

<h2 class="text-center">Formulário de Contato</h2>
<form class="row g-3" action="../controller/controllerContato.php" method="post">
  <div class="col-md-6">
    <label for="cNome" class="form-label">Nome</label>
    <input type="text" class="form-control" name="cNome" required>
  </div>
  <div class="col-md-6">
    <label for="cEmail" class="form-label">Email</label>
    <input type="email" class="form-control" name="cEmail" required>
  </div>
  <div class="col-md-12">
    <label for="cAssunto" class="form-label">Assunto</label>
    <input type="text" class="form-control" name="cAssunto" required>
  </div>
  <div class="col-12">
    <label for="cMensagem" class="form-label">Mensagem</label>
    <textarea class="form-control" name="cMensagem" rows="6" style="resize: none" required></textarea>    
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Enviar</button>
    <button type="reset" class="btn btn-danger">Cancelar</button>
  </div>
  <input type="hidden" name="opcao" value="1"> <!-- Opcao usada pela controllerContato para realizar a inserção -->
</form>

<?php
}
    require_once "../includes/rodape.php"
?>
