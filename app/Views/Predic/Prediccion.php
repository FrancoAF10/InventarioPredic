<?= $header?>

<div class="pc-container">
    <div class="pc-content">

        <form action="<?= base_url('prediccion/predecir') ?>" method="post">

            <select name="id_producto" class="form-control">
                <?php foreach($productos as $producto): ?>
                    <option value="<?= $producto['id_producto'] ?>">
                        <?= $producto['nombre'] ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <button class="btn btn-primary mt-2">
                Predecir
            </button>
        </form>

        <?php if (isset($prediccion)): ?>
            <div class="alert alert-success mt-3">
                <strong>Predicción del próximo mes:</strong>
                <?= $prediccion ?>
            </div>
        <?php endif; ?>

    </div>
</div>

<?= $footer?>