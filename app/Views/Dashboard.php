<?= $header ?>

<div class="pc-container">
    <div class="pc-content">

        <div class="row mb-3">

            <!-- Producto -->
            <div class="col-md-4">
                <label class="form-label">Producto</label>
                <select class="form-select" id="producto">
                    <option value="">Todos</option>

                    <?php foreach($productos as $producto): ?>
                        <option value="<?= $producto['id_producto'] ?>">
                            <?= $producto['nombre'] ?>
                        </option>
                    <?php endforeach; ?>

                </select>
            </div>

            <!-- Mes -->
            <div class="col-md-3">
                <label class="form-label">Mes</label>
                <select class="form-select" id="mes">
                    <option value="">Todos</option>
                    <option value="1">Enero</option>
                    <option value="2">Febrero</option>
                    <option value="3">Marzo</option>
                    <option value="4">Abril</option>
                    <option value="5">Mayo</option>
                    <option value="6">Junio</option>
                    <option value="7">Julio</option>
                    <option value="8">Agosto</option>
                    <option value="9">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                </select>
            </div>

            <!-- Año -->
            <div class="col-md-3">
                <label class="form-label">Año</label>
                <select class="form-select" id="anio">
                    <option value="">Todos</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                </select>
            </div>

            <div class="col-md-2 d-flex align-items-end">
                <button class="btn btn-primary w-100" id="obtener-datos">
                    Obtener Datos
                </button>
            </div>

        </div>

        <span id="aviso" class="d-none">
            Por favor espere...
        </span>

        <div class="row">

            <div class="col-md-8">
                <canvas id="lienzo"></canvas>
            </div>

            <div class="col-md-4">

                <table class="table table-bordered" id="tabla-movimientos">

                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Total vendido</th>
                        </tr>
                    </thead>

                    <tbody></tbody>

                </table>

            </div>

        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener("DOMContentLoaded", ()=>{

    const btn = document.getElementById("obtener-datos");
    const aviso = document.getElementById("aviso");
    const tabla = document.querySelector("#tabla-movimientos tbody");

    const grafico = new Chart(document.getElementById("lienzo"),{
        type:"bar",
        data:{
            labels:[],
            datasets:[{
                label:"Ventas",
                data:[]
            }]
        },
        options:{
            responsive:true,
            scales:{
                y:{
                    beginAtZero:true
                }
            }
        }
    });

    btn.addEventListener("click", async ()=>{

        aviso.classList.remove("d-none");

        const producto = document.getElementById("producto").value;
        const mes = document.getElementById("mes").value;
        const anio = document.getElementById("anio").value;

        const url =
        `<?= site_url('api/getdatamovimientos') ?>?producto=${producto}&mes=${mes}&anio=${anio}`;

        try{

            const response = await fetch(url);

            const data = await response.json();

            if(data.success){

                tabla.innerHTML = "";

                grafico.data.labels = data.resumen.map(x=>x.producto);

                grafico.data.datasets[0].data =
                    data.resumen.map(x=>x.total_vendido);

                grafico.update();

                data.resumen.forEach(item=>{

                    tabla.innerHTML += `
                        <tr>
                            <td>${item.producto}</td>
                            <td>${item.total_vendido}</td>
                        </tr>
                    `;

                });

            }

        }catch(error){
            console.error(error);
        }

        aviso.classList.add("d-none");

    });

});
</script>

<?= $footer ?>