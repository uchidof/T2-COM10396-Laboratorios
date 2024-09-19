<?php
require_once "../model/Suporte.php";
require_once "../includes/cabecalho.php";

    $suportes = $_SESSION['suportes'];
    //var_dump($suportes);
?>

<h1 class="text-center">Suporte solicitados </h1>

<div class="table-responsive">
    <table class="table table-light table-striped">
        <thead class="table-primary">
            <tr class="align-middle" style="text-align: center">
                <th>Matrícula</th>
                <th>Horário de utilização</th>
                <th>Protocolo</th>
                <th>Status</th>
                <?php
                if ($tipo == "A") {
                    echo "<th>Alterar</th>";
                }
                ?>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php
            // Exibe a tabela com os dados dos suportes
            foreach ($suportes as $suporte) {                        
            ?>
            <tr class="align-middle" style="text-align: center">
                <td><?= $suporte->matricula ?></td>
                <td><?= $suporte->dia_horario ?></td>
                <td><?= $suporte->protocolo ?></td>
                <td><?= $suporte->status ?></td>
                <?php
                if ($tipo == "A") {
                    echo "<td><a class='btn btn-primary btn-sm' href='../controller/controllerSuporte.php?opcao=3&id=".$suporte->suporte_id."'>Alterar</a></td>";
                }
                ?>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>


<?php
require_once "../includes/rodape.php"
?>