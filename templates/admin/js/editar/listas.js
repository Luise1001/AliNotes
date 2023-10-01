$(document).on('click', '.btn-edit-titulo-lista', function(data)
{
    let id = data.currentTarget.id;
    let titulo = data.currentTarget.attributes.titulo.value;

   $('#titulo_lista_id').val(id);
   $('#edit_lista_titulo').val(titulo);
})

$(document).on('click', '#editar_titulo_lista', function()
{
   editar_titulo_lista();
})

function editar_titulo_lista()
{
   let id = $('#titulo_lista_id').val();
   let titulo = $('#edit_lista_titulo').val();

   let page = 'editar_titulo_lista';

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
         titulo:titulo
      }
 
   })
   .done(function(res)
   {
      let titulo = res.titulo;
      let cuerpo = res.cuerpo;
      let accion = res.accion;

      if(accion === 'success')
      {
        mis_listas();
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

$(document).on('click', '.hide-show-lista', function(data)
{
    let lista = data.currentTarget.attributes.lista.value;
    let visible = data.currentTarget.attributes.visible.value;
   
    hide_show_lista(lista, visible);
})

function hide_show_lista(lista, visible)
{console.log(lista)
   let page = 'hide_show_lista';

   $.ajax
   ({
      url: '../../server/functions/editar.php',
      type: 'POST',
      dataType: 'json',
      async: false,
      data: 
      {
         page: page,
         lista: lista,
         visible: visible
      }
 
   })
   .done(function(res)
   {
      let titulo = res.titulo;
      let cuerpo = res.cuerpo;
      let accion = res.accion;

      if(accion === 'success')
      {
        mis_listas();
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