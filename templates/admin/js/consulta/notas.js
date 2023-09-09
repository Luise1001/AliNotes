$(document).ready(mis_notas());

function mis_notas()
{
    let page = 'mis_notas';

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
      $('.header-icons').html(res.botones);
      $('.my-notes').html(res.notas);
    })
    .fail(function(err)
    {
        console.log(err);
    })
}


$(document).on('click', '#setting_nota', function()
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