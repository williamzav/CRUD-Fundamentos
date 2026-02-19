<?php require __DIR__ . '/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <div class="card">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 text-primary">
                    <i class="bi bi-person-plus-fill me-2"></i>Nuevo Alumno
                </h5>
            </div>
            <div class="card-body p-4">
                <form action="index.php?action=store" method="POST" novalidate id="formCreate">

                    <div class="mb-3">
                        <label for="nombre" class="form-label fw-semibold">
                            <i class="bi bi-person me-1 text-primary"></i>Nombre completo
                        </label>
                        <input type="text" class="form-control" id="nombre" name="nombre"
                               placeholder="Ej: Juan Pérez" required maxlength="100">
                        <div class="invalid-feedback">Por favor ingresa el nombre.</div>
                    </div>

                    <div class="mb-3">
                        <label for="carrera" class="form-label fw-semibold">
                            <i class="bi bi-book me-1 text-primary"></i>Carrera
                        </label>
                        <select class="form-select" id="carrera" name="carrera" required>
                            <option value="" selected disabled>-- Selecciona una carrera --</option>
                            <option>Ingeniería en Sistemas Computacionales</option>
                            <option>Ingeneria en Gestion Empresarial</option>
                            <option>Ingeneria Industrial</option>
                            <option>Licenciatura en Turismo</option>
                            
                        </select>
                        <div class="invalid-feedback">Por favor selecciona una carrera.</div>
                    </div>

                    <div class="mb-4">
                        <label for="edad" class="form-label fw-semibold">
                            <i class="bi bi-calendar-heart me-1 text-primary"></i>Edad
                        </label>
                        <input type="number" class="form-control" id="edad" name="edad"
                               placeholder="Ej: 21" min="15" max="80" required>
                        <div class="invalid-feedback">Por favor ingresa una edad válida (15–80).</div>
                    </div>

                    <div class="d-flex gap-2">
                        <a href="index.php" class="btn btn-outline-secondary w-50">
                            <i class="bi bi-arrow-left me-1"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary w-50">
                            <i class="bi bi-check2-circle me-1"></i> Guardar
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Validación Bootstrap del formulario
    document.getElementById('formCreate').addEventListener('submit', function(e) {
        if (!this.checkValidity()) {
            e.preventDefault();
            e.stopPropagation();
        }
        this.classList.add('was-validated');
    });
</script>

<?php require __DIR__ . '/footer.php'; ?>
