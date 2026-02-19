<?php require __DIR__ . '/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <div class="card">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 text-warning">
                    <i class="bi bi-pencil-square me-2"></i>Editar Alumno
                </h5>
            </div>
            <div class="card-body p-4">
                <form action="index.php?action=update" method="POST" novalidate id="formEdit">

                    <input type="hidden" name="id" value="<?= $alumno['id'] ?>">

                    <div class="mb-3">
                        <label for="nombre" class="form-label fw-semibold">
                            <i class="bi bi-person me-1 text-warning"></i>Nombre completo
                        </label>
                        <input type="text" class="form-control" id="nombre" name="nombre"
                               value="<?= htmlspecialchars($alumno['nombre']) ?>"
                               required maxlength="100">
                        <div class="invalid-feedback">Por favor ingresa el nombre.</div>
                    </div>

                    <div class="mb-3">
                        <label for="carrera" class="form-label fw-semibold">
                            <i class="bi bi-book me-1 text-warning"></i>Carrera
                        </label>
                        <select class="form-select" id="carrera" name="carrera" required>
                            <option value="" disabled>-- Selecciona una carrera --</option>
                            <?php
                                $carreras = [
                                    'Ingeniería en Sistemas', 'Administración', 'Contabilidad',
                                    'Derecho', 'Medicina', 'Psicología', 'Arquitectura', 'Comunicaciones'
                                ];
                                foreach ($carreras as $c):
                                    $sel = ($alumno['carrera'] === $c) ? 'selected' : '';
                            ?>
                                <option <?= $sel ?>><?= $c ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">Por favor selecciona una carrera.</div>
                    </div>

                    <div class="mb-4">
                        <label for="edad" class="form-label fw-semibold">
                            <i class="bi bi-calendar-heart me-1 text-warning"></i>Edad
                        </label>
                        <input type="number" class="form-control" id="edad" name="edad"
                               value="<?= $alumno['edad'] ?>" min="15" max="80" required>
                        <div class="invalid-feedback">Por favor ingresa una edad válida (15–80).</div>
                    </div>

                    <div class="d-flex gap-2">
                        <a href="index.php" class="btn btn-outline-secondary w-50">
                            <i class="bi bi-arrow-left me-1"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-warning w-50 text-white fw-semibold">
                            <i class="bi bi-check2-circle me-1"></i> Actualizar
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('formEdit').addEventListener('submit', function(e) {
        if (!this.checkValidity()) {
            e.preventDefault();
            e.stopPropagation();
        }
        this.classList.add('was-validated');
    });
</script>

<?php require __DIR__ . '/footer.php'; ?>
