<?= $header ?>

<div class="pc-container">
  <div class="pc-content">
    <div class="card">
      <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-2">
        <h5 class="mb-0"><i class="ti ti-arrows-exchange me-2"></i>Movimientos ingreso / salida</h5>
        <a href="<?= base_url('movimiento/crear') ?>" class="btn btn-primary btn-sm">
          <i class="ti ti-plus"></i> Nuevo Movimiento
        </a>
      </div>

      <div class="card-body">
        <form action="<?= base_url('movimiento') ?>" method="get" class="d-flex flex-wrap gap-2 mb-3">
          <select name="mes" class="form-select form-select-sm" style="width:160px">
            <option value="">Todos los meses</option>
            <?php
            $meses = [
                1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril',
                5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto',
                9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
            ];
            $mesSeleccionado = $mesActual ?? date('n');
            foreach ($meses as $num => $nombre): ?>
                <option value="<?= $num ?>" <?= $num == $mesSeleccionado ? 'selected' : '' ?>>
                    <?= $nombre ?>
                </option>
            <?php endforeach; ?>
          </select>

          <select name="anio" class="form-select form-select-sm" style="width:110px">
            <option value="">Todos los Años</option>
            <?php
            $anioActual = date('Y');
            $anioSeleccionado = $anioActual2 ?? $anioActual;
            for ($a = $anioActual - 3; $a <= $anioActual; $a++): ?>
                <option value="<?= $a ?>" <?= $a == $anioSeleccionado ? 'selected' : '' ?>>
                    <?= $a ?>
                </option>
            <?php endfor; ?>
          </select>

          <button type="submit" class="btn btn-outline-secondary btn-sm">
            <i class="ti ti-filter"></i> Filtrar
          </button>
        </form>

        <div class="table-responsive">
          <table class="table table-hover align-middle mb-0" id="tablaMovimientos">
            <colgroup>
              <col width="13%"><col width="12%"><col width="22%">
              <col width="13%"><col width="12%"><col width="28%">
            </colgroup>
            <thead>
              <tr>
                <th>Fecha</th>
                <th>Tipo</th>
                <th>Producto</th>
                <th>Zona</th>
                <th class="text-end">Cantidad</th>
                <th>Observación</th>
              </tr>
            </thead>
            <tbody id="movimiento-listar">
              <?php foreach ($movimiento as $mv): ?>
                <?php
                  $esIngreso = strtolower($mv['tipo']) === 'ingreso';
                  $badge = $esIngreso
                      ? 'bg-success-subtle text-success-emphasis'
                      : 'bg-danger-subtle text-danger-emphasis';
                  $icono = $esIngreso ? 'ti-arrow-down' : 'ti-arrow-up';
                ?>
                <tr>
                  <td><?= esc($mv['fecha']) ?></td>
                  <td>
                    <span class="badge rounded-pill <?= $badge ?> px-3 py-1">
                      <i class="ti <?= $icono ?>"></i> <?= esc($mv['tipo']) ?>
                    </span>
                  </td>
                  <td><?= esc($mv['producto']) ?></td>
                  <td><?= esc($mv['zona']) ?></td>
                  <td class="text-end"><?= esc($mv['cantidad']) ?></td>
                  <td class="text-muted"><?= esc($mv['observacion']) ?></td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $footer ?>