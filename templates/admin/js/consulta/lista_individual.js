$(document).ready(lista_individual());

function lista_individual()
{
    let id = $('#lista_id').val();
    let page = 'lista_individual';

    $.ajax
    ({
       url: '../../server/functions/consultas.php',
       type: 'POST',
       dataType: 'json',
       async: false,
       data: 
       {
          page: page,
          id: id
       }
  
    })
    .done(function(res)
    {
      $('.header-icons').html(res.botones);
      $('.list-title').html(res.titulo);
      $('.my-list').html(res.contenido);
    })
    .fail(function(err)
    {
        console.log(err);
    })
}

$(document).ready(secciones());

function secciones()
{
  let lista = $('#lista_id').val();
  let page = 'secciones';

  $.ajax
  ({
     url: '../../server/functions/consultas.php',
     type: 'POST',
     dataType: 'json',
     async: false,
     data: 
     {
        page: page,
        lista: lista
     }

  })
  .done(function(res)
  {
    $('#seccion').html(res.secciones);
  })
  .fail(function(err)
  {
      console.log(err);
  })
}

$(document).ready(unidades());

function unidades()
{
  let page = 'unidades';

  $.ajax
  ({
     url: '../../server/functions/consultas.php',
     type: 'POST',
     dataType: 'json',
     async: false,
     data: 
     {
        page: page
     }

  })
  .done(function(res)
  {
    $('#tipo_unidad').html(res.unidades);
  })
  .fail(function(err)
  {
      console.log(err);
  })
}

var array_items = [];

function SelectAll(id_section)
{  
   var items = document.getElementsByClassName('item-'+id_section);
   var section = document.getElementById('section_'+id_section);

     if(section.checked == true)
     {
      for(var i=0; i<items.length; i++)
      {  
          if(items[i].type=='checkbox')
          {    
               array_items = array_items.filter((item)=> item !== items[i].getAttribute('item'));
               array_items.push(items[i].getAttribute('item'));
               items[i].checked=true;            
          }  
               
      }
     }
     else
     {
      for(var i=0; i<items.length; i++)
      {  
          if(items[i].type=='checkbox')
          {
               array_items = array_items.filter((item)=> item !== items[i].getAttribute('item'));
               items[i].checked=false; 
          }  
               
      }
     }

     generar_listado(array_items);

}  

function SelectOne(e)
{
   const checkbox = document.getElementById('item_'+e);
   const item_selected = checkbox.getAttribute('item');
   
   if(checkbox.checked == true)
   {
      array_items.push(item_selected);
   }
   else
   {
       array_items = array_items.filter((item)=> item !== item_selected)
   }
 
   generar_listado(array_items);
}

var items;

function generar_listado(array_items)
{
   let id_lista = $('#lista_id').val();
   let page = 'generar_listado';

   $.ajax
   ({
      url: '../../server/functions/consultas.php',
      type: 'POST',
      dataType: 'json',
      async: false,
      data: 
      {
         page: page,
         id_lista: id_lista,
         array_items: array_items
      }
 
   })
   .done(function(res)
   { 
     $('.titulo-app').html(res.titulo);
     $('.header-icons').html(res.botones);
     items = res.items;
   })
   .fail(function(err)
   {
       console.log(err);
   })
}

$(document).on('keydown', '#descripcion', function()
{
    let buscar = $('#descripcion').val();
    predecir_items(buscar);
})

function predecir_items(buscar)
{
   
   let page = 'predecir_items';
   $.ajax
   ({
      url: '../../server/functions/consultas.php',
      type: 'POST',
      dataType: 'json',
      async: false,
      data: 
      {
         page: page,
         buscar: buscar
      }
 
   })
   .done(function(res)
   { 
      let list = document.getElementById('predicted_items');
      
      if(list.classList.contains('d-none'))
      {
          list.classList.remove('d-none');
      }

      if(res.items != false)
      {
         $('.predicted-items').html(res.items);
      }
      else
      {
          list.classList.add('d-none');
      }
     
   })
   .fail(function(err)
   {
       console.log(err);
   })
}

$(document).on('click', '.item-predicted', function(data)
{
   let unidad = data.currentTarget.attributes.unidad.value;
   let descripcion = data.currentTarget.attributes.descripcion.value;
   let peso = data.currentTarget.attributes.peso.value;

   item_predicted(unidad, descripcion, peso);
})

function item_predicted(unidad, descripcion, peso)
{
  $('#tipo_unidad').val(unidad);
  $('#descripcion').val(descripcion);
  $('#peso').val(peso);
  const cantidad = document.getElementById('cantidad');
  cantidad.focus();

  $('.predicted-items').addClass('d-none');
}