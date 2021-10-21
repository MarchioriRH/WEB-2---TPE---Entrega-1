{* template que renderiza un cuadro de dialogo tipo modal para mensajes de error y generales *}
<section id="modalContainerMensaje" class="modalContainerMensaje mostrar">
    <div class="modalMsge">
        <h1>{$texto1}</h1>
        <div class="mb-2">
            {if $rama == "vehiculos"}
                <a class="btn btn-danger" href="verCatalogoVehiculos">Aceptar</a>
            {elseif $rama == "categorias"}
                <a class="btn btn-danger" href="verCatalogoCategoria">Aceptar</a>
            {elseif $rama == "404" || $rama == "loginOk" || $rama == "registroOk"}
                <a class="btn btn-danger" href="homeCatalogo">Aceptar</a> 
            {elseif $rama == "registro"}
                <a class="btn btn-danger" href="registroNuevoUsuario">Aceptar</a> 
            {elseif $rama == "login"}
                <a class="btn btn-danger" href="login">Aceptar</a>     
            {/if}
        </div>
    </div>
</section>
