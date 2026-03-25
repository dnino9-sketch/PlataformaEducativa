<?php require_once __DIR__ . '/templates/header.php'; ?>

<div class="container mt-5" style="max-width: 400px;">
    <h2 class="mb-4">Registro de Usuario</h2>

    <?php if (isset($error) && $error): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <form method="POST" action="/PlataformaEducativa/index.php?action=registrar">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre completo</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required value="Juan Test">  // Value de prueba
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" id="email" name="email" required value="juan@Test.com">  // Value de prueba
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" the class="form-control" id="password" name="password" required value="123456">  // Value de prueba
        </div>
        <div class="mb-3">
            <label for="rol" class="form-label">Rol</label>
            <select class="form-select" id="rol" name="rol" required>
                <option value="alumno" selected>Alumno</option>
                <option value="docente">Docente</option>
                <option value="padre">Padre</option>
                <option value="admin">Administrador</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success w-100">Registrarse</button>
    </form>
    <p class="mt-3 text-center">¿Ya tienes cuenta? <a href="/PlataformaEducativa/index.php?action=login">Inicia sesión aquí</a></p>
</div>

<?php require_once __DIR__ . '/templates/footer.php'; ?>