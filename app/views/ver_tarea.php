<?php
require_once __DIR__ . '/templates/header.php';
?>

<div class="mt-4" style="max-width: 600px;">
    <h2 class="mb-4">Detalle de Tarea</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="mb-3">
                <label class="fw-bold">Materia:</label>
                <p><?php echo htmlspecialchars($tarea->materia); ?></p>
            </div>
            <div class="mb-3">
                <label class="fw-bold">Grado:</label>
                <p><?php echo htmlspecialchars($tarea->grado); ?></p>
            </div>
            <div class="mb-3">
                <label class="fw-bold">Curso:</label>
                <p><?php echo htmlspecialchars($tarea->curso); ?></p>
            </div>
            <div class="mb-3">
                <label class="fw-bold">Descripción:</label>
                <p><?php echo htmlspecialchars($tarea->descripcion); ?></p>
            </div>
            <div class="mb-3">
                <label class="fw-bold">Estado:</label>
                <p>
                    <?php
                    switch ($tarea->estado) {
                        case 'Pendiente':
                            echo '<span class="badge bg-warning text-dark">Pendiente</span>';
                            break;
                        case 'Entregada':
                            echo '<span class="badge bg-success">Entregada</span>';
                            break;
                        case 'En revisión':
                            echo '<span class="badge bg-info text-dark">En revisión</span>';
                            break;
                        default:
                            echo '<span class="badge bg-secondary">Desconocido</span>';
                    }
                    ?>
                </p>
            </div>
        </div>
        <div class="card-footer d-flex gap-2">
            <a href="/PlataformaEducativa/" class="btn btn-secondary">Volver a Tareas</a>
            <a href="/PlataformaEducativa/index.php?action=editar_tarea&id=<?php echo $tarea->id; ?>" class="btn btn-warning">Editar Tarea</a>
        </div>
    </div>
</div>

<?php
require_once __DIR__ . '/templates/footer.php';
?>