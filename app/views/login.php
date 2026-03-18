<?php require_once __DIR__ . '/templates/header.php'; ?>

<div class="container mt-5" style="max-width: 400px;">
    <h2 class="mb-4">Iniciar Sesión</h2>

    <?php if (isset($error) && $error): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <form method="POST" action="/PlataformaEducativa/index.php?action=login">
        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico:</label>
            <input type="email" id="email" name="email" class="form-control" required autofocus>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña:</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Ingresar</button>
    </form>
</div>

<?php require_once __DIR__ . '/templates/footer.php'; ?>