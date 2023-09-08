<?php include_once 'redirect.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once 'head_html.php';?>
</head>
<body>
    <?php include_once 'menu.php';?>

 <div class="container container-notes">
 <div class="add-notes">
    <div class="add-notes-header">
    <i class="fa-solid fa-square-plus"></i> Nueva Nota
    </div>
  <div class="add-notes-body">
    <textarea id="nueva_nota" name="nueva_nota" cols="40" rows="10"></textarea>
   
  </div>
</div>
 <div class="add-notes-footer">
 <button id="guardar_nota" name="guardar_nota" class="btn notes-btn">Guardar</button>
 </div>
 </div>   
 <div class="my-notes"></div>

    <script src="js/consulta/notas.js"></script>
    <?php include_once 'scripts.php';?>
</body>
</html>