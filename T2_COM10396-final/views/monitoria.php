<?php
    require_once "../controller/controllerMonitoria.php";
    require_once "../includes/modalMonitoria.php";
    require_once "../includes/cabecalho.php";

    $laboratorios = $_SESSION['laboratorios'];
    $monitorias = recuperaMonitorias();
    //var_dump($monitorias);

?>

<p>
<h1 class="text-center">Monitorias</h1>
<p>
<div class="table-responsive">
    <table class="table table-light table-striped">
        <thead class="table-primary">
            <tr class="align-middle" style="text-align: center">
                <th>Monitor</th>
                <th>Laboratório</th> <!-- Alterar o cabeçalho de Sala para Laboratório -->
                <th>Disciplina</th>
                <th>Horário</th>
                <?php
                if ($tipo == "A") {
                    echo "<th>Alterar</th>";
                    echo "<th>Remover</th>";
                }
                ?>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php
            // Exibe a tabela com os dados das monitorias
            foreach ($monitorias as $monitoria) {                        
            ?>
            <tr class="align-middle" style="text-align: center">
                <td><?= $monitoria->nome_monitor ?></td>
                <td><?= getNomeLaboratorio($laboratorios, $monitoria->sala) ?></td> <!-- Aqui busca o nome do laboratório -->
                <td><?= $monitoria->disciplina ?></td>
                <td><?= $monitoria->horario ?></td>
                <?php
                if ($tipo == "A") {
                    echo "<td><a class='btn btn-primary btn-sm' href='../controller/controllerMonitoria.php?opcao=3&id=".$monitoria->monitoria_id."'>Alterar</a></td>";
                    echo "<td><button class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#confirmDelete' data-url='../controller/controllerMonitoria.php?opcao=2&id=".$monitoria->monitoria_id."'>X</button></td>";
                }
                ?>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<script>
var confirmDeleteModal = document.getElementById('confirmDelete');
confirmDeleteModal.addEventListener('show.bs.modal', function(event) {
    // Botão que acionou o modal
    var button = event.relatedTarget;

    // Extrai a URL do atributo data-url
    var url = button.getAttribute('data-url');

    // Altera o href do botão "Sim, excluir"
    var confirmLink = document.getElementById('confirmLink');
    confirmLink.setAttribute('href', url);
});
</script>


<?php
        if ($tipo == "A") {
        ?>
<p>
<h2 class="text-center">Cadastro de Monitorias</h2>
<p>
    <!-- Formulário de Cadastro de Monitorias    -->
<form class="row g-3" action="../controller/controllerMonitoria.php" method="post">
    <div class="col-md-6">
        <label for="mNome" class="form-label">Nome do Monitor</label>
        <input type="text" class="form-control" name="mNome" required>
    </div>
    <div class="col-md-6">
        <label for="mLaboratorio" class="form-label">Laboratório Desejado</label>
        <select name="mLaboratorio" class="form-select" required>
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
        <label for="mHorario" class="form-label">Horário da Monitoria</label>
        <input type="time" class="form-control" name="mHorario" required>
    </div>
    <div class="col-md-6">
        <label for="mDisciplina" class="form-label">Disciplina</label>
        <input type="text" class="form-control" name="mDisciplina" required>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Cadastrar Monitoria</button>
        <button type="reset" class="btn btn-danger">Cancelar</button>
    </div>
    <input type="hidden" name="opcao" value="1"> <!-- Opcao usada pela controllerMonitoria para realizar a inserção -->
</form>
<?php
      }
    ?>


<?php
    require_once "../includes/rodape.php"
?>