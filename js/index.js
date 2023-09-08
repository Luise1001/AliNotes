$(document).on('click', '#login', function(e)
{
    login(e);
})

function login(e)
{
    e.preventDefault();
    let user = $('#user').val();
    let pass = $('#pass').val();
    let page = 'login';

    $.ajax
    ({
       url: 'server/functions/consultas.php',
       type: 'POST',
       dataType: 'json',
       async: false,
       data: 
       {
          page: page,
          user: user,
          pass: pass
       }
  
    })
    .done(function(res)
    {

        let titulo = res.titulo;
        let cuerpo = res.cuerpo;
        let accion = res.accion;

        if(accion === 'success')
        {
            window.location.href = "templates/home/inicio";
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