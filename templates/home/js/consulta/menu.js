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