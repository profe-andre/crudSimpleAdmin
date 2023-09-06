<div class="col-md-4 mb-3">
      <h3 class="text-center">Datos del Alumno</h3>
      <form method="POST" action="Admin/action.php" enctype="multipart/form-data">
        <input type="text" name="metodo" value="1" hidden>
      <div class="mb-3">
          <label class="form-label">Nombre y Apellido</label>
          <input type="text" class="form-control" name="namefull" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Cedula (nit)</label>
          <input type="number" name="cedula" class="form-control" required>
        </div>

        <div class="mb-3">
        <label for="Sexo">Sexo del Alumno</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="sexo" value="M" checked>
            <label class="form-check-label" for="sexoM">
              Masculino
            </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="sexo" value="F">
          <label class="form-check-label" for="sexoF">
            Fememino
          </label>
        </div>
        </div>
        <div class="mb-3">
          <label for="Sexo">Secci&oacute;n</label>
          <select class="form-select" name="section" id="section" required>
            <option value="">Asigne una sessi&oacute;n</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="formFile" class="form-label">Foto del Alumno</label>
          <input class="form-control" type="file" name="foto" accept="image/png,image/jpeg" required>
        </div>

        <div class="d-grid gap-2 col-12 mx-auto">
          <button type="submit" class="btn  btn btn-primary mt-3 mb-2">
            Registrar nuevo Alumno
            <i class="bi bi-arrow-right-circle"></i>
          </button>
        </div>
        
      </form>
    </div>