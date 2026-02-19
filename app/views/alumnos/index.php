<?php require __DIR__ . '/header.php'; ?>

<?php if (!empty($_SESSION['alert'])): ?>
    <div class="alert alert-<?= $_SESSION['alert']['tipo'] ?> alert-dismissible fade show alert-auto" role="alert">
        <?= $_SESSION['alert']['mensaje'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    <?php unset($_SESSION['alert']); ?>
<?php endif; ?>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center bg-white py-3">
        <h5 class="mb-0 text-primary">
            <i class="bi bi-people-fill me-2"></i>Listado de Alumnos
        </h5>
        <a href="index.php?action=create" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle-fill me-1"></i> Nuevo Alumno
        </a>
    </div>

    <div class="card-body p-0">
        <?php if (empty($alumnos)): ?>
            <div class="text-center py-5 text-muted">
                <i class="bi bi-inbox" style="font-size:2.5rem;"></i>
                <p class="mt-2">No hay alumnos registrados aún.</p>
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th class="ps-3">#</th>
                            <th>Nombre</th>
                            <th>Carrera</th>
                            <th class="text-center">Edad</th>
                            <th>Fecha Registro</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($alumnos as $a): ?>
                        <tr>
                            <td class="ps-3 text-muted"><?= $a['id'] ?></td>
                            <td>
                                <i class="bi bi-person-circle text-primary me-1"></i>
                                <?= htmlspecialchars($a['nombre']) ?>
                            </td>
                            <td>
                                <span class="badge bg-primary-subtle text-primary fw-normal px-2 py-1">
                                    <?= htmlspecialchars($a['carrera']) ?>
                                </span>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-secondary"><?= $a['edad'] ?> años</span>
                            </td>
                            <td class="text-muted small">
                                <i class="bi bi-calendar3 me-1"></i>
                                <?= date('d/m/Y H:i', strtotime($a['fecha_registro'])) ?>
                            </td>
                            <td class="text-center">
                                <a href="index.php?action=edit&id=<?= $a['id'] ?>"
                                   class="btn btn-warning btn-action me-1" title="Editar">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <button type="button"
                                        class="btn btn-danger btn-action"
                                        title="Eliminar"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEliminar"
                                        data-id="<?= $a['id'] ?>"
                                        data-nombre="<?= htmlspecialchars($a['nombre']) ?>">
                                    <i class="bi bi-trash3-fill"></i>
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>

    <?php if (!empty($alumnos)): ?>
    <div class="card-footer text-muted bg-white border-top py-2 px-3">
        <small><i class="bi bi-info-circle me-1"></i><?= count($alumnos) ?> alumno(s) registrado(s)</small>
    </div>
    <?php endif; ?>
</div>

<!-- Modal Confirmar Eliminación -->
<div class="modal fade" id="modalEliminar" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>Confirmar eliminación
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center py-4">
                <p class="mb-1">¿Estás seguro de que deseas eliminar a:</p>
                <strong id="nombreAlumno" class="fs-5 text-danger"></strong>
                <p class="text-muted small mt-2 mb-0">Esta acción no se puede deshacer.</p>
            </div>
            <div class="modal-footer justify-content-center border-0 pb-4">
                <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle me-1"></i> Cancelar
                </button>
                <a id="btnConfirmarEliminar" href="#" class="btn btn-danger px-4">
                    <i class="bi bi-trash3-fill me-1"></i> Sí, eliminar
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    // Pasar datos al modal de eliminación
    document.getElementById('modalEliminar').addEventListener('show.bs.modal', function(e) {
        const btn    = e.relatedTarget;
        const id     = btn.getAttribute('data-id');
        const nombre = btn.getAttribute('data-nombre');

        document.getElementById('nombreAlumno').textContent = nombre;
        document.getElementById('btnConfirmarEliminar').href = 'index.php?action=delete&id=' + id;
    });
</script>

<?php require __DIR__ . '/footer.php'; ?>
