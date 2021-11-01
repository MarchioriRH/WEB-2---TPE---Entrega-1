{* template encargada de renderizar el formulario de registro de un nuevo usuario *}
{include file="templates/tplGeneral/header.tpl"}
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
                    <label for="password" class="form-label">Ingrese una clave</label>
                    <input type="password" name="password" id="password" class="form-control password" value="clave" placeholder="">
                    <span class="fa fa-fw fa-eye password-icon show-password"></span>
                </div>
                <div class="mb-2"> 
                    <label for="keyword" class="form-label">Para registrarse como administrador, ingrese la palabra clave</label>
                    <input type="password" name="keyword" id="keyword" class="form-control password" value="clave" placeholder="">
                </div>
                <div class="btn-detalle">
                    <button type="submit" class="btn btn-danger">Registrar</button>
                    <a class="btn btn-danger" href="homeCatalogo">Cancelar</a>
                </div>  
            </form>            
        </div>
    </div>
</section>
<script type="text/javascript" src="./js/clave.js"></script>
{include file="templates/tplGeneral/footer.tpl"}
