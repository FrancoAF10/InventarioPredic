<?= $header ?>

<div class="pc-container">
  <div class="pc-content">
    <div class="card">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0"><i class="ti ti-building-warehouse me-2"></i>Stock</h5>
        <input type="text" id="buscarProducto" class="form-control form-control-sm" style="width:220px" placeholder="Buscar producto...">
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover align-middle mb-0" id="tablaStock">
            <thead>
              <tr>
                <th style="width:45%">Producto</th>
                <th style="width:25%">Zona</th>
                <th style="width:30%" class="text-end">Cantidad</th>
              </tr>
            </thead>
            <tbody id="producto-listar">
              <?php foreach ($stock as $sc): ?>
                <?php
                  $cant = (int) $sc['cantidad'];
                  if ($cant <= 0) {
                      $badge = 'bg-danger-subtle text-danger-emphasis';
                  } elseif ($cant <= 100) {
                      $badge = 'bg-warning-subtle text-warning-emphasis';
                  } else {
                      $badge = 'bg-success-subtle text-success-emphasis';
                  }
                ?>
                <tr>
                  <td><?= esc($sc['producto']) ?></td>
                  <td><?= esc($sc['zona']) ?></td>
                  <td class="text-end">
                    <span class="badge rounded-pill <?= $badge ?> px-3 py-1">
                      <?= $cant ?>
                    </span>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
document.getElementById('buscarProducto').addEventListener('input', function () {
  const filtro = this.value.toLowerCase();
  document.querySelectorAll('#producto-listar tr').forEach(fila => {
    const texto = fila.textContent.toLowerCase();
    fila.style.display = texto.includes(filtro) ? '' : 'none';
  });
});
</script>

<?= $footer ?>