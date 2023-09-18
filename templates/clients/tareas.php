<?php include_once 'redirect.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once 'head_html.php';?>
</head>
<body>
    <?php include_once 'menu.php';?>

<div class="contenido">
<div class="container container-tasks collapse">
 <div class="add-task">
    <div class="add-task-header">
    <i class="fa-solid fa-square-plus"></i> Nueva Tarea
    </div>
  <div class="add-task-body">
    <label class="label-option-1" for="task">Contenido <span class="obligatory-span">*</span></label>
    <input class="input-option-1" id="task" name="task" type="text" placeholder="Ej. Rutina de ejercicios." >
   
  </div>
</div>
 <div class="add-task-footer">
 <button id="save_task" name="save_task" class="btn btn-option-1">Guardar</button>
 </div>
 </div>   

 <div class="my-tasks"></div>
 <div class="my-finished-tasks"></div>

</div>
<?php include_once 'modals.php';?>

    <script src="js/consulta/tareas.js"></script>
    <?php include_once 'scripts.php';?>
</body>
</html>