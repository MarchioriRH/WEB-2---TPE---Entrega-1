{include file="header.tpl"}
<section id="modalContainerMensaje" class="modalContainerMensaje mostrar">
    <div class="modalMsge">
        <h1>REGISTRO</h1>
        <div class="form">
            <form action="registroDB" method="post">
                <div class="mb-2">
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre/s">
                </div>
                <div class="mb-2">               
                    <input type="text" class="form-control" name="apellido" placeholder="Apellido/s">
                </div>
                <div class="mb-2">
                    <input type="text" class="form-control" name="mail" placeholder="e-Mail">
                </div>
                <div class="mb-2"> 
                    <input type="password" name="password" class="form-control password1" value="clave" placeholder="">
                    <span class="fa fa-fw fa-eye password-icon show-password"></span>
                </div>
                <div class="btn-detalle">
                    <button type="submit" class="btn btn-danger">Registrar</button>
                    <a class="btn btn-danger" href="catalogo">Cancelar</a>
                </div>  
            </form>            
        </div>
    </div>
</section>
{include file="footer.tpl"}
