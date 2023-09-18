$(document).on('click', '#registrarme', function()
{
    $('#login_card').addClass('d-none');
    $('#singup_card').removeClass('d-none');
})

$(document).on('click', '#acceder', function()
{
    $('#singup_card').addClass('d-none');
    $('#login_card').removeClass('d-none');
})

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

$(document).on('click', '#singup', function()
{
    enviar_codigo();
    
})

function enviar_codigo()
{
    let correo = $('#r_user').val();
    let page = 'enviar_codigo';

    $.ajax
    ({
       url: 'server/functions/agregar.php',
       type: 'POST',
       dataType: 'html',
       data: 
       {
          page: page,
          correo: correo
       }
  
    })
    .done(function(res)
    { 
    
    })
    .fail(function(err)
    {
        console.log(err)
    })
}

$(document).on('click', '#got_code', function()
{
   nuevo_usuario();
})

function nuevo_usuario()
{
    let user = $('#r_user').val();
    let pass = $('#r_pass').val();
    let pass_2 = $('#r_pass_2').val();
    let codigo = $('#codigo').val();
    let page = 'nuevo_usuario';

    $.ajax
    ({
       url: 'server/functions/agregar.php',
       type: 'POST',
       dataType: 'json',
       data: 
       {
          page: page,
          user: user,
          pass: pass,
          pass_2: pass_2,
          codigo: codigo
       }
  
    })
    .done(function(res)
    { 
        let titulo = res.titulo;
        let cuerpo = res.cuerpo;
        let accion = res.accion;

        if(accion === 'success')
        {
            window.location.reload(true);
        }
        else
        {
            swal(titulo, cuerpo, accion);
        }
    })
    .fail(function(err)
    {
        console.log(err)
    })
}