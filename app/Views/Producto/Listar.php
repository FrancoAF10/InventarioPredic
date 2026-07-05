<?= $header ?>

<div class="pc-container">
      <div class="pc-content">
        <h3 class="text-center">Productos Registrados</h3>
        <a href="<?= base_url('Producto/crear') ?>" class="btn btn-primary mb-3">
            <i class="ti ti-plus"></i> Nuevo Producto
        </a>
        <table class="table table-sm table-striped table-bordered">
          <colgroup>
            <col width="50%">
            <col width="25%">
            <col width="25%">
          </colgroup>
          <thead>
              <tr>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Categoria</th>
              </tr>
          </thead>
          <tbody id="producto-listar">
            <?php foreach($productos as $pr): ?>
              <tr>
                <td><?=$pr['nombre']?></td>
                <td><?=$pr['marca']?></td>
                <td><?=$pr['categoria']?></td>
              </tr>
              <?php endforeach ?>
          </tbody>
        </table>
</div>
</div>

<?= $footer ?>