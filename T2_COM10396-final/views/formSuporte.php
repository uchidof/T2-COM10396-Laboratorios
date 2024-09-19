<?php
    require_once "../includes/cabecalho.php";

    $laboratorios = $_SESSION['laboratorios'];
?>

<a class="btn btn-primary" href="../controller/controllerSuporte.php?opcao=2">
  <strong>Acompanhe a solicitacao de suporte</strong>
</a>

<p>
<h1 class="text-center">Solicitação de Suporte</h1>
<p> 
<!-- Formulário de Solicitação de Suporte -->
<form class="row g-3" action="../controller/controllerSuporte.php" method="post">
  <div class="col-md-6">
    <label for="sNome" class="form-label">Nome do Solicitante</label>
    <input type="text" class="form-control" name="sNome" required>
  </div>
  <div class="col-md-6">
    <label for="sMatricula" class="form-label">Número de Matrícula</label>
    <input type="text" class="form-control" name="sMatricula" required>
  </div>
  <div class="col-md-6">
    <label for="sLaboratorio" class="form-label">Laboratório Desejado</label>
    <select name="sLaboratorio" class="form-select" required>
      <option selected value="">Selecione o Laboratório...</option>
      <?php
        foreach($laboratorios as $lab){
          echo "<option value='{$lab->id}'>{$lab->nome}, {$lab->localizacao}</option>";
          //lab->id eh ENVIADO, lab->nome eh mostrado
        }
      ?>
    </select>
  </div>
  <div class="col-md-6">
    <label for="sDiaHorario" class="form-label">Dia e Horário de Utilização</label>
    <input type="datetime-local" class="form-control" name="sDiaHorario" required>
  </div>
  <div class="col-md-12">
    <label for="sTipoSolicitacao" class="form-label">Tipo de Solicitação</label>
    <select name="sTipoSolicitacao" class="form-select" required>
      <option selected value="">Selecione o Tipo...</option>
      <option value="conexao">Conexão</option>
      <option value="problemas_maquinas">Problemas em Máquinas</option>
      <option value="instalacao_softwares">Instalação de Softwares</option>
      <option value="mobiliario">Mobiliário</option>
      <option value="limpeza">Limpeza</option>
      <option value="condicoes_sala">Condições da Sala</option>
    </select>
  </div>
  <div class="col-12">
    <label for="sDescricao" class="form-label">Descrição da Solicitação</label>
    <textarea class="form-control" name="sDescricao" rows="6" style="resize: none" required></textarea>    
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Enviar Solicitação</button>
    <button type="reset" class="btn btn-danger">Cancelar</button>
  </div>
  <input type="hidden" name="opcao" value="1"> <!-- Opcao usada pela controllerSuporte para realizar a inserção -->
</form>

<?php
    require_once "../includes/rodape.php";
?>
