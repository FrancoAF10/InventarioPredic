<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - Yonda & Grupo Huaraca</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- CSS personalizado -->
    <link href="<?= base_url('assets/css/login.css') ?>" rel="stylesheet">
    
    <style>
        /* Contenedor de burbujas */
        #bubbles-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }
        .bubble {
            position: absolute;
            border-radius: 50%;
            opacity: 0.3;
        }
    </style>
</head>
<body>

<!-- Contenedor de burbujas dinámicas -->
<div id="bubbles-container"></div>

<!-- Formulario de login -->
<div class="container">
    <div class="row justify-content-center p-5">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="login-container p-4 p-md-5 my-5 shadow-lg rounded-3 bg-white">
                <div class="text-center mb-4">
                    <img src="<?= base_url('assets/images/users/imagen-almacen.png') ?>" alt="Logo" class="mb-3 w-75">
                    <h3 class="mb-3">Iniciar Sesión</h3>
                </div>

                <!-- Formulario funcional -->
                <form action="<?= base_url('login/validar') ?>" method="post" autocomplete="off">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label for="usuario" class="form-label">Usuario</label>
                        <input type="text" name="usuario" id="usuario" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="clave" class="form-label">Contraseña</label>
                        <input type="password" name="clave" id="clave" class="form-control" required>
                    </div>

                    <div class="mb-3 d-flex justify-content-between">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalSolicitar" class="text-decoration-none" style="color: var(--primary-orange);">
                            ¿Olvidó su contraseña?
                        </a>
                    </div>

                    <button type="submit" class="btn btn-orange w-100 py-2">INGRESAR</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal 1: Solicitar código -->
<div class="modal fade" id="modalSolicitar" tabindex="-1">
  <div class="modal-dialog">
    <form id="formSolicitar" action="<?= base_url('login/reset') ?>" method="post">
      <?= csrf_field() ?>
      <div class="modal-content">
        <div class="modal-header bg-secondary text-white">
          <h5 class="modal-title">Recuperar contraseña</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <label class="form-label">Usuario</label>
          <input type="text" name="usuario" class="form-control" required>
          <small class="text-muted">Se enviará un código a tu correo y celular registrados.</small>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Enviar código</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Modal 2: Verificar código y cambiar clave -->
<div class="modal fade" id="modalVerificar" tabindex="-1">
  <div class="modal-dialog">
    <form action="<?= base_url('login/cambiarClave') ?>" method="post">
      <?= csrf_field() ?>
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h5 class="modal-title">Verificar código</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Código recibido</label>
            <input type="text" name="codigo" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Nueva contraseña</label>
            <input type="password" name="nueva_clave" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Actualizar contraseña</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- SweetAlert2 mensajes flash -->
<?php if (session()->getFlashdata('error')): ?>
<script>
Swal.fire({
    toast: true,
    position: 'top-end',
    icon: 'error',
    title: '<?= session()->getFlashdata('error') ?>',
    showConfirmButton: false,
    timer: 2000
});
</script>
<?php endif; ?>

<?php if (session()->getFlashdata('success')): ?>
<script>
Swal.fire({
    toast: true,
    position: 'top-end',
    icon: 'success',
    title: '<?= session()->getFlashdata('success') ?>',
    showConfirmButton: false,
    timer: 2000
});
</script>
<?php endif; ?>

<!-- Script AJAX para recuperar contraseña -->
<script>
document.querySelector('#formSolicitar').addEventListener('submit', async function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    try {
        const res = await fetch(this.action, {
            method: 'POST',
            body: formData
        });
        const data = await res.json();
        if (data.status === 'success') {
            Swal.fire({ toast:true, position:'top-end', icon:'success', title:data.message, showConfirmButton:false, timer:2000 });
            bootstrap.Modal.getInstance(document.getElementById('modalSolicitar')).hide();
            setTimeout(() => { new bootstrap.Modal(document.getElementById('modalVerificar')).show(); }, 500);
        } else {
            Swal.fire({ toast:true, position:'top-end', icon:'error', title:data.message, showConfirmButton:false, timer:2000 });
        }
    } catch(err) {
        Swal.fire('Error', 'Hubo un problema en el servidor', 'error');
    }
});
</script>

<!-- Burbujas animadas -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const container = document.getElementById('bubbles-container');
    const colors = ['#ff7a00','#00f0ff','#ffff00','#ff00ff','#00ff00'];
    for (let i = 0; i < 30; i++) {
        const bubble = document.createElement('div');
        bubble.className = 'bubble';
        const size = Math.random()*170+30;
        bubble.style.width = `${size}px`;
        bubble.style.height = `${size}px`;
        bubble.style.left = `${Math.random()*100}vw`;
        bubble.style.top = `${Math.random()*100}vh`;
        bubble.style.backgroundColor = colors[Math.floor(Math.random()*colors.length)];
        const duration = Math.random()*30+20;
        const delay = Math.random()*10;
        const floatDistance = Math.random()*100+50;
        bubble.style.animation = `float ${duration}s ease-in-out ${delay}s infinite, moveX ${duration*1.5}s ease-in-out ${delay}s infinite, moveY ${duration*0.5}s ease-in-out ${delay}s infinite`;
        const style = document.createElement('style');
        style.innerHTML = `@keyframes moveX {0%,100%{transform:translateX(0);}50%{transform:translateX(${floatDistance}px);}} @keyframes moveY {0%,100%{transform:translateY(0);}50%{transform:translateY(${floatDistance}px);}}`;
        document.head.appendChild(style);
        container.appendChild(bubble);
    }
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
