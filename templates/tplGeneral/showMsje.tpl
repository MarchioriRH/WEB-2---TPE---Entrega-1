{* template que renderiza un cuadro de dialogo tipo modal para mensajes de error y generales *}
<section id="modalContainerMensaje" class="modalContainerMensaje mostrar">
    <div class="modalMsge">
        <div class="mb-2">
        <legend class="lgnd-danger">YourCar dice:</legend>
            <h2>{$texto1}</h2>
        </div>
        <div class="mb-2">
            {if $rama == "vehiculos"}
                <a class="btn btn-danger" href="addNewVehiculo">Aceptar</a>
            {elseif $rama == "categorias"}
                <a class="btn btn-danger" href="verCatalogoCategoria/?pagina={$pagina}">Aceptar</a>                
            {elseif $rama == "404" || $rama == "loginOk" || $rama == "registroOk"}
                <a class="btn btn-danger" href="homeCatalogo">Aceptar</a> 
            {elseif $rama == "registro"}
                <a class="btn btn-danger" href="registroNuevoUsuario">Aceptar</a> 
            {elseif $rama == "login"}
                <a class="btn btn-danger" href="login">Aceptar</a>
            {elseif $rama == "eliminarCategoria"}
                <a class="btn btn-danger" href="eliminarCategoriaDB/{$id}/?pagina={$pagina}">Aceptar</a>
                <a class="btn btn-danger" href="verCatalogoCategoria/?pagina={$pagina}">Cancelar</a> 
            {elseif $rama == "eliminarVehiculo"}
                <a class="btn btn-danger" href="eliminarVehiculoDB/{$id}/?pagina={$pagina}">Aceptar</a>
                <a class="btn btn-danger" href="verCatalogoVehiculos/?pagina={$pagina}">Cancelar</a> 
            {elseif $rama == "eliminarVehiculoCat"}
                <a class="btn btn-danger" href="eliminarVehiculoDesdeCategoriaDB/{$id}/?pagina={$pagina}">Aceptar</a>
                <a class="btn btn-danger" href="verCatalogoPorCategorias/{$id_cat}">Cancelar</a> 
            {elseif $rama == "delUser"}
                <a class="btn btn-danger" href="eliminarUsuarioDB/{$id}">Aceptar</a>
                <a class="btn btn-danger" href="adminUsers">Cancelar</a>         
            {/if}
        </div>
    </div>
</section>
