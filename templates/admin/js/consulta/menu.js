$(document).ready(header_menu());

function header_menu()
{
    let page = 'header_menu';

    $.ajax
    ({
       url: '../../server/functions/consultas.php',
       type: 'POST',
       dataType: 'html',
       async: false,
       data: 
       {
          page: page
       }
  
    })
    .done(function(res)
    {
      $('.options-menu').html(res);
    })
    .fail(function(err)
    {
        console.log(err);
    })
}

$(document).ready(footer_menu());

function footer_menu()
{
    let page = 'footer_menu';

    $.ajax
    ({
       url: '../../server/functions/consultas.php',
       type: 'POST',
       dataType: 'html',
       async: false,
       data: 
       {
          page: page
       }
  
    })
    .done(function(res)
    {
      $('.footer-menu').html(res);
    })
    .fail(function(err)
    {
        console.log(err);
    })
}

$(document).on('click', '#options', function()
{
  this.classList.toggle("active");
  let dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") 
  {
    dropdownContent.style.display = "none";
  } 
  else
   {
    dropdownContent.style.display = "block";
  }
})

$(document).ready(IconsColor());

function IconsColor()
{
   let MyLocation = window.location;
   let url = MyLocation.pathname;
   let icon_note = document.getElementById('icon_note');
   let icon_task = document.getElementById('icon_task');
   let icon_book = document.getElementById('icon_book');
   let icon_list = document.getElementById('icon_list');
   let icon_profile = document.getElementById('icon_profile');
   
   if(url.includes('notas'))
   {
      icon_note.style.color = "white";
   }
   if(url.includes('tareas'))
   {
      icon_task.style.color = "white";
   }
   if(url.includes('agenda'))
   {
      icon_book.style.color = "white";
   }
   if(url.includes('list'))
   {
      icon_list.style.color = "white";
   }
   if(url.includes('perfil'))
   {
      icon_profile.style.color = "white";
   }
}