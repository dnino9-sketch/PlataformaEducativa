<?php
require_once __DIR__ . '/templates/header.php';
?>

<h2>Editar Tarea</h2>

<form action="/PlataformaEducativa/index.php?action=actualizar_tarea" method="POST" class="mt-4" style="max-width:600px;">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($tarea->id); ?>">
    
    <div class="mb-3">
        <label for="materia" class="form-label">Materia</label>
        <input type="text" class="form-control" id="materia" name="materia" required value="<?php echo htmlspecialchars($tarea->materia); ?>">
    </div>
    <div class="mb-3">
        <label for="grado" class="form-label">Grado</label>
        <input type="text" class="form-control" id="grado" name="grado" required value="<?php echo htmlspecialchars($tarea->grado); ?>">
    </div>
    <div class="mb-3">
        <label for="curso" class="form-label">Curso</label>
        <input type="text" class="form-control" id="curso" name="curso" required value="<?php echo htmlspecialchars($tarea->curso); ?>">
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required><?php echo htmlspecialchars($tarea->descripcion); ?></textarea>
    </div>
    <div class="mb-3">
        <label for="estado" class="form-label">Estado</label>
        <select class="form-select" id="estado" name="estado" required>
            <option value="Pendiente" <?php if($tarea->estado == 'Pendiente') echo 'selected'; ?>>Pendiente</option>
            <option value="Entregada" <?php if($tarea->estado == 'Entregada') echo 'selected'; ?>>Entregada</option>
            <option value="En revisión" <?php if($tarea->estado == 'En revisión') echo 'selected'; ?>>En revisión</option>
        </select>
    </div>
    <button type="submit" class="btn btn-warning">Actualizar Tarea</button>
    <a href="/PlataformaEducativa/" class="btn btn-secondary ms-2">Cancelar</a>
</form>

<?php
require_once __DIR__ . '/templates/footer.php';
?>