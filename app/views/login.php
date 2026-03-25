<?php require_once __DIR__ . '/templates/header.php'; ?>

<div class="container mt-5" style="max-width: 400px;">
    <h2 class="mb-4">Iniciar Sesión</h2>

    <?php if (isset($error) && $error): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <form method="POST" action="/PlataformaEducativa/index.php?action=login">
        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" id="email" name="email" required autofocus>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Ingresar</button>
    </form>
    <p class="mt-3 text-center">¿No tienes cuenta? <a href="/PlataformaEducativa/index.php?action=registro">Regístrate aquí</a></p>
</div>

<?php require_once __DIR__ . '/templates/footer.php'; ?>