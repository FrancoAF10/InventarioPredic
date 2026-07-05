<?= $header ?>

<div class="pc-container">
    <div class="pc-content">
          <h3 class="text-center mb-3">Registrar Ingreso/Salida</h3>
            <form action="<?= base_url('movimiento/importar') ?>" method="post" enctype="multipart/form-data">
                <input type="file" name="archivo_excel" accept=".xlsx,.xls">
                <button type="submit">
                    Cargar Excel
                </button>
            </form>

            <form action="<?= base_url('movimiento/guardar');?>" method="post" class="mt-3">
                <div class="card">
                    <div class="card-body">

                        
                        <div class="mb-3">
                            <label for="Producto" class="form-label">Producto</label>
                            <select class="form-select" id="id_producto" name="id_producto" required>
                                <option value="" disabled selected>Seleccione un Producto</option>
                                <?php foreach($productos as $pr): ?>
                                    <option value="<?= $pr['id_producto'] ?>">
                                        <?= $pr['nombre'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="zona" class="form-label">Zona</label>
                            <select class="form-select" id="id_zona" name="id_zona" required>
                                <option value="" disabled selected>Seleccionar Zona</option>
                                <?php foreach($zona as $zn): ?>
                                    <option value="<?= $zn['id_zona'] ?>">
                                        <?= $zn['nombre'] ?> (<?= $zn['descripcion']?>)
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="movimiento" class="form-label">Movimiento</label>
                            <select class="form-select" id="tipo" name="tipo" required>
                                <option value="" disabled selected>Seleccione un Movimiento</option>
                                <option value="INGRESO">Ingreso</option>
                                <option value="SALIDA">Salida</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="cantidad" class="form-label">Cantidad</label>
                            <input type="number" class="form-control" id="cantidad" name="cantidad" required>
                        </div>
                        <div class="mb-3">
                            <label for="observacion" class="form-label">Observación</label>
                            <textarea class="form-control" 
                                    id="observacion" 
                                    name="observacion" 
                                    rows="3"
                                    placeholder="Ingrese una observación (opcional)"></textarea>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="reset" class="btn btn-sm btn-outline-secondary">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
            </form>
    </div>
</div>

<?= $footer ?>