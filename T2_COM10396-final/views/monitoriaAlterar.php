<?php
    require_once "../model/Monitoria.php";
    require_once "../controller/controllerMonitoria.php";
    require_once "../includes/modalMonitoria.php";
    require_once "../includes/cabecalho.php";

    $laboratorios = $_SESSION['laboratorios'];
    $monitoria = $_SESSION['monitoria']; // Certifique-se de que a sessão foi iniciada corretamente
?>

<?php if ($tipo == "A"): ?>
    <h2 class="text-center">Alteração de Monitoria</h2>
    <form class="row g-3" action="../controller/controllerMonitoria.php" method="post">
    <div class="col-md-6">
            <label for="mNome" class="form-label">ID</label>
            <input type="text" class="form-control" name="mId" value="<?= htmlspecialchars($monitoria->monitoria_id) ?>" readonly>
        </div>
        <div class="col-md-6">
            <label for="mNome" class="form-label">Nome do Monitor</label>
            <input type="text" class="form-control" name="mNome" value="<?= htmlspecialchars($monitoria->nome_monitor) ?>">
        </div>
        <div class="col-md-6">
            <label for="mLaboratorio" class="form-label">Laboratório Desejado</label>
            <select name="mLaboratorio" class="form-select" required>
                <option value="">Selecione o Laboratório...</option>
                <?php
                    foreach ($laboratorios as $lab) {
                        $selected = ($lab->id == $monitoria->sala) ? 'selected' : ''; // Comparando sala com o ID do laboratório
                        echo "<option value='{$lab->id}' $selected>{$lab->nome}, {$lab->localizacao}</option>";
                    }
                ?>
            </select>
        </div>
        <div class="col-md-6">
            <label for="mHorario" class="form-label">Horário da Monitoria</label>
            <input type="time" class="form-control" name="mHorario" value="<?= htmlspecialchars($monitoria->horario) ?>">
        </div>
        <div class="col-md-6">
            <label for="mDisciplina" class="form-label">Disciplina</label>
            <input type="text" class="form-control" name="mDisciplina" value="<?= htmlspecialchars($monitoria->disciplina) ?>">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Alterar Monitoria</button>
            <button type="reset" class="btn btn-danger">Cancelar</button>
        </div>
        <input type="hidden" name="opcao" value="4"> <!-- Opcao usada pela controllerMonitoria para realizar a alteração -->
    </form>
<?php endif; ?>

<?php
    require_once "../includes/rodape.php";
?>
