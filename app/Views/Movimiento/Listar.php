<?= $header ?>

<div class="pc-container">
    <div class="pc-content">
          <h3 class="text-center">Movimientos Ingreso/Salida</h3>

        <a href="<?= base_url('movimiento/crear') ?>" class="btn btn-primary mb-3">
            <i class="ti ti-plus"></i> Nuevo Movimiento
        </a>

        <form action="<?= base_url('movimiento') ?>" method="get" class="mb-3">
            <select name="mes">
                <option value="">Todos los meses</option>
                <?php
                $meses = [
                    1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril',
                    5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto',
                    9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
                ];
                $mesSeleccionado = $mesActual ?? date('n');
                foreach ($meses as $num => $nombre):
                ?>
                    <option value="<?= $num ?>" <?= $num == $mesSeleccionado ? 'selected' : '' ?>>
                        <?= $nombre ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <select name="anio">
                <?php
                $anioActual = date('Y');
                $anioSeleccionado = $anioActual2 ?? $anioActual;
                for ($a = $anioActual - 3; $a <= $anioActual; $a++):
                ?>
                    <option value="<?= $a ?>" <?= $a == $anioSeleccionado ? 'selected' : '' ?>>
                        <?= $a ?>
                    </option>
                <?php endfor; ?>
            </select>

            <button type="submit">Filtrar</button>
        </form>

            <table class="table table-sm table-striped table-bordered">
                <colgroup>
                    <col width="15%">
                    <col width="15%">
                    <col width="20%">
                    <col width="15%">
                    <col width="15%">
                    <col width="20%">
                </colgroup>
                <thead>
                    <tr>
                    <th>Fecha</th>
                    <th>Tipo</th>
                    <th>Producto</th>
                    <th>Zona</th>
                    <th>Cantidad</th>
                    <th>Observación</th>
                    </tr>
                </thead>
                <tbody id="movimiento-listar">
                <?php foreach($movimiento as $mv): ?>
                    <tr>
                    <td><?=$mv['fecha']?></td>
                    <td><?=$mv['tipo']?></td>
                    <td><?=$mv['producto']?></td>
                    <td><?=$mv['zona']?></td>
                    <td><?=$mv['cantidad']?></td>
                    <td><?=$mv['observacion']?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
    </div>
</div>

<?= $footer ?>