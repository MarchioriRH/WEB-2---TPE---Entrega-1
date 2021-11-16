{* template encargada de renderizar el modal de login *}
{include file='templates/tplGeneral/header.tpl'}
<section id='modalContainerMensaje' class='modalContainerMensaje mostrar'>
    <div class='modalMsge'>
        <h1>LOGIN</h1>
        <div class='form'>
                <form action='loginUsuario' method='post'>
                    <div class='mb-2'>
                        <input type='text' class='form-control' name='mail' placeholder='e-Mail'>
                    </div>
                    <div class='mb-2'> 
                        <input type='password' name='password' class='form-control password' value='clave' placeholder=''>
                        <span class='fa fa-fw fa-eye password-icon show-password'></span>
                    </div>
                    <div class='btn-detalle'>
                        <button type='submit' class='btn btn-danger'>Acceder</button>
                        <a class='btn btn-danger' href='homeCatalogo'>Cancelar</a>
                    </div>  
                </form>
        </div>
    </div>
</section>
<script tyoe="text/javascript" src="./js/clave.js"></script>
{include file='templates/tplGeneral/footer.tpl'}
