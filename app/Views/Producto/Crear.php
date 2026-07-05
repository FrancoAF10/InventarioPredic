<?= $header?>

<div class="pc-container">
    <div class="pc-content">
        <h3 class="text-center">Agregar Producto</h1>
        <form action="<?= base_url('producto/guardar');?>" method="post" >
            <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="marca" class="form-label">Marca</label>
                            <input type="text" class="form-control" id="marca" name="marca" required>
                        </div>
                        <div class="mb-3">
                            <label for="categoria" class="form-label">Categoria</label>
                            <input type="text" class="form-control" id="categoria" name="categoria" required>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="reset" class="btn btn-sm btn-outline-secondary">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
            </form>
    </div>
</div>

<?= $footer?>