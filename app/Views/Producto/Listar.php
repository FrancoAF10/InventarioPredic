<?= $header ?>

<div class="pc-container">
  <div class="pc-content">
    <div class="card">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0"><i class="ti ti-package me-2"></i>Productos registrados</h5>
        <div class="d-flex gap-2">
          <input type="text" id="buscarProducto" class="form-control form-control-sm" style="width:200px" placeholder="Buscar producto...">
          <a href="<?= base_url('Producto/crear') ?>" class="btn btn-primary btn-sm">
            <i class="ti ti-plus"></i> Nuevo Producto
          </a>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover align-middle mb-0" id="tablaProductos">
            <thead>
              <tr>
                <th style="width:50%">Nombre</th>
                <th style="width:25%">Marca</th>
                <th style="width:25%">Categoría</th>
              </tr>
            </thead>
            <tbody id="producto-listar">
              <?php foreach ($productos as $pr): ?>
                <tr>
                  <td><?= esc($pr['nombre']) ?></td>
                  <td><?= esc($pr['marca']) ?></td>
                  <td>
                    <span class="badge rounded-pill bg-primary-subtle text-primary-emphasis px-3 py-1">
                      <?= esc($pr['categoria']) ?>
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