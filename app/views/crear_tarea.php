<?php
require_once __DIR__ . '/templates/header.php';
?>

<h2>Crear Nueva Tarea</h2>

<form action="/PlataformaEducativa/index.php?action=guardar_tarea" method="POST" class="mt-4" style="max-width:600px;">

    <div class="mb-3">
        <label for="materia" class="form-label">Materia</label>
        <input type="text" id="materia" name="materia" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="grado" class="form-label">Grado</label>
        <input type="text" id="grado" name="grado" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="curso" class="form-label">Curso</label>
        <input type="text" id="curso" name="curso" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea id="descripcion" name="descripcion" class="form-control" rows="4" required></textarea>
    </div>

    <div class="mb-3">
        <label for="estado" class="form-label">Estado</label>
        <select id="estado" name="estado" class="form-select" required>
            <option value="Pendiente" selected>Pendiente</option>
            <option value="Entregada">Entregada</option>
            <option value="En revisión">En revisión</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Guardar Tarea</button>
    <a href="/PlataformaEducativa/" class="btn btn-secondary ms-2">Cancelar</a>
</form>

<?php
require_once __DIR__ . '/templates/footer.php';
?>