<?php
// Incluir encabezado (header.php) desde la carpeta templates
require_once __DIR__ . '/templates/header.php';
?>

<h2 class="mb-4">Mis Tareas</h2>

<div class="d-flex justify-content-between mb-3">
    <div>
        <!-- Filtros de ejemplo (simulados) -->
        <select class="form-select d-inline-block w-auto me-2" aria-label="Filtrar por materia">
            <option selected>Todas las Materias</option>
            <option>Matemática</option>
            <option>Ciencias</option>
            <option>Español</option>
        </select>
        <select class="form-select d-inline-block w-auto me-2" aria-label="Filtrar por curso">
            <option selected>Todos los Cursos</option>
            <option>Curso A</option>
            <option>Curso B</option>
        </select>
        <select class="form-select d-inline-block w-auto" aria-label="Filtrar por estado">
            <option selected>Todos los Estados</option>
            <option>Pendiente</option>
            <option>Entregada</option>
            <option>En revisión</option>
        </select>
    </div>
    <button class="btn btn-success">+ Crear Tarea</button>
</div>

<table class="table table-hover align-middle">
    <thead class="table-light">
        <tr>
            <th>Materia</th>
            <th>Grado</th>
            <th>Curso</th>
            <th>Descripción</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tareas as $tarea): ?>
        <tr>
            <td><?php echo htmlspecialchars($tarea->materia); ?></td>
            <td><?php echo htmlspecialchars($tarea->grado); ?></td>
            <td><?php echo htmlspecialchars($tarea->curso); ?></td>
            <td><?php echo htmlspecialchars($tarea->descripcion); ?></td>
            <td>
                <?php 
                    // Mostrar etiquetas coloreadas para el estado
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
            </td>
            <td>
                <button class="btn btn-primary btn-sm">Ver Tarea</button>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
// Incluir pie de página (footer.php)
require_once __DIR__ . '/templates/footer.php';
?>