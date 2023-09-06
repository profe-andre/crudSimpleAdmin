<a href="detalles.php?id=<?php echo $dataAlumno['id']; ?>" class="btn btn-warning mb-2"   title="Ver datos del alumno <?php echo $dataAlumno['namefull']; ?>">
                  <i class="bi bi-tv"></i> Ver</a>
                    <a href="Admin/formEditar.php?id=<?php echo $dataAlumno['id']; ?>" class="btn btn-info mb-2"   title="Actualizar datos del alumno <?php echo $dataAlumno['namefull']; ?>">
                    <i class="bi bi-arrow-clockwise"></i> Actualizar</a>
                    <a href="Admin/action.php?id=<?php echo $dataAlumno['id']; ?>&metodo=3&namePhoto=<?php echo $dataAlumno['foto']; ?>" class="btn btn-danger mb-2" title="Borrar el alumno <?php echo $dataAlumno['namefull']; ?>">
                    <i class="bi bi-trash"></i> Borrar</a>