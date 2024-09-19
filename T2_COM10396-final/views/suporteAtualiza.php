<?php
require_once "../model/Suporte.php";
require_once "../includes/cabecalho.php";

$suporte = $_SESSION['suporte'];  // Certifique-se de que a sessão foi iniciada corretamente
$laboratorios = $_SESSION['laboratorios'];  // Laboratórios também devem estar disponíveis na sessão
?>

<p>
<h1 class="text-center">Atualização de Suporte</h1>
<p>
    <!-- Formulário de Atualização de Suporte -->
<form class="row g-3" action="../controller/controllerSuporte.php" method="post">
    <div class="col-md-12">
        <label for="sStatus" class="form-label"><h4>Status</h4></label>
        <select name="sStatus" class="form-select" required>
            <option value="Aberto" <?= $suporte->status == 'Aberto' ? 'selected' : '' ?>>Aberto</option>
            <option value="Em andamento" <?= $suporte->status == 'Em andamento' ? 'selected' : '' ?>>Em andamento</option>
            <option value="Em atendimento" <?= $suporte->status == 'Em atendimento' ? 'selected' : '' ?>>Em atendimento</option>
            <option value="Atendido" <?= $suporte->status == 'Atendido' ? 'selected' : '' ?>>Atendido</option>
            <option value="Cancelado" <?= $suporte->status == 'Cancelado' ? 'selected' : '' ?>>Cancelado</option>
        </select>
    </div>
    <div class="col-md-6">
        <label for="sNome" class="form-label">Nome do Solicitante</label>
        <input type="text" class="form-control" name="sNome" value="<?= htmlspecialchars($suporte->nome_solicitante) ?>" readonly>
    </div>
    <div class="col-md-6">
        <label for="sId" class="form-label">ID</label>
        <input type="text" class="form-control" name="sId" value="<?= htmlspecialchars($suporte->suporte_id) ?>" readonly>
    </div>
    <div class="col-md-6">
        <label for="sMatricula" class="form-label">Número de Matrícula</label>
        <input type="text" class="form-control" name="sMatricula" value="<?= htmlspecialchars($suporte->matricula) ?>" readonly>
    </div>
    <div class="col-md-6">
        <label for="sLaboratorio" class="form-label">Laboratório Desejado</label>
        <select name="sLaboratorio" class="form-select" required>
            <option value="">Selecione o Laboratório...</option>
            <?php
            foreach($laboratorios as $lab) {
                $selected = ($lab->id == $suporte->laboratorio) ? 'selected' : '';
                echo "<option value='{$lab->id}' $selected>{$lab->nome}, {$lab->localizacao}</option>";
            }
            ?>
        </select>
    </div>
    <div class="col-md-6">
        <label for="sDiaHorario" class="form-label">Dia e Horário de Utilização</label>
        <input type="datetime-local" class="form-control" name="sDiaHorario"
            value="<?= htmlspecialchars(date('Y-m-d\TH:i', strtotime($suporte->dia_horario))) ?>" readonly>
    </div>
    <div class="col-md-12">
        <label for="sTipoSolicitacao" class="form-label">Tipo de Solicitação</label>
        <select name="sTipoSolicitacao" class="form-select" required>
            <option value="">Selecione o Tipo...</option>
            <option value="conexao" <?= $suporte->tipo_solicitacao == 'conexao' ? 'selected' : '' ?>>Conexão</option>
            <option value="problemas_maquinas" <?= $suporte->tipo_solicitacao == 'problemas_maquinas' ? 'selected' : '' ?>>Problemas em Máquinas</option>
            <option value="instalacao_softwares" <?= $suporte->tipo_solicitacao == 'instalacao_softwares' ? 'selected' : '' ?>>Instalação de Softwares</option>
            <option value="mobiliario" <?= $suporte->tipo_solicitacao == 'mobiliario' ? 'selected' : '' ?>>Mobiliário</option>
            <option value="limpeza" <?= $suporte->tipo_solicitacao == 'limpeza' ? 'selected' : '' ?>>Limpeza</option>
            <option value="condicoes_sala" <?= $suporte->tipo_solicitacao == 'condicoes_sala' ? 'selected' : '' ?>>Condições da Sala</option>
        </select>
    </div>
    <div class="col-12">
        <label for="sDescricao" class="form-label">Descrição da Solicitação</label>
        <textarea class="form-control" name="sDescricao" rows="6" style="resize: none" readonly><?= htmlspecialchars($suporte->descricao) ?></textarea>
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">Atualizar Solicitação</button>
        <a href="suporteAcompanha.php" class="btn btn-danger">Cancelar</a>
    </div>
    <input type="hidden" name="opcao" value="4"> <!-- Opcao usada pela controllerSuporte para realizar a atualização -->
</form>

<?php
require_once "../includes/rodape.php";
?>
