$(document).on('click', '.btn-editar-tarea', function(data)
{
    let id = data.currentTarget.id;
    let tarea = data.currentTarget.attributes.tarea.value;


    $('#task_id').val(id);
    $('#edit_task').val(tarea);
})

$(document).on('click', '#editar_task', function()
{
   editar_tarea();
})

function editar_tarea()
{
    let id = $('#task_id').val();
    let tarea = $('#edit_task').val();

    let page = 'editar_tarea';

    $.ajax
    ({
       url: '../../server/functions/editar.php',
       type: 'POST',
       dataType: 'json',
       async: false,
       data: 
       {
          page: page,
          id:id,
          tarea: tarea
       }
  
    })
    .done(function(res)
    {
       let titulo = res.titulo;
       let cuerpo = res.cuerpo;
       let accion = res.accion;

       if(accion === 'success')
       {
         mis_tareas();
       }
       else
       {
          swal(titulo, cuerpo, accion);
       }
    })
    .fail(function(err)
    {
        console.log(err);
    })
}

$(document).on('click', '.finish-task', function(data)
{
   let id = data.currentTarget.attributes.tarea.value;
   let completado = data.currentTarget.attributes.completado.value;

   completar_tarea(id, completado);
})

function completar_tarea(id, completado)
{
  
   let page = 'completar_tarea';

   $.ajax
   ({
      url: '../../server/functions/editar.php',
      type: 'POST',
      dataType: 'json',
      async: false,
      data: 
      {
         page: page,
         id:id,
         completado: completado
      }
 
   })
   .done(function(res)
   {
      let titulo = res.titulo;
      let cuerpo = res.cuerpo;
      let accion = res.accion;

      if(accion === 'success')
      {
        mis_tareas();
      }
      else
      {
         swal(titulo, cuerpo, accion);
      }
   })
   .fail(function(err)
   {
       console.log(err);
   })
}