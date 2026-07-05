<?= $header ?>

<div class="pc-container">
      <div class="pc-content">
  <!--<a href="<?=base_url('/averias/registrar')?>">Registrar</a>!-->
  <!--<a href="<?=base_url('/averias/solucionado')?>">solucionado</a>!-->
  <h3 class="text-center">STOCK</h3>
  <table class="table table-sm table-striped table-bordered">
    <colgroup>
      <col width="50%">
      <col width="25%">
      <col width="25%">
    </colgroup>
    <thead>
        <tr>
          <th>Producto</th>
          <th>Zona</th>
          <th>Cantidad</th>
        </tr>
    </thead>
    <tbody id="producto-listar">
      <?php foreach($stock as $sc): ?>
        <tr>
          <td><?=$sc['producto']?></td>
          <td><?=$sc['zona']?></td>
          <td><?=$sc['cantidad']?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
  </table>
</div>
</div>

<?= $footer ?>