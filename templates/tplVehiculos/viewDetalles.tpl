{* template encargado de renderizar el modal con los detalle de un item seleccionado *}
<section id="modalContainerMensaje" class="modalContainerMensaje mostrar">
    <div class="modalMsge">
        <h1>{$tituloDetalle}: {$detalles->marca}, {$detalles->modelo}</h1>
        <table class="default">
            <tr>
                <th>Año</th>
                <th>Kilometros/Hs</th>
                <th>Precio</th>                        
            </tr>
            <tr>
                <td>{$detalles->anio}</td>
                <td>{$detalles->kilometros}</td>
                <td>{$detalles->precio}</td>
            </tr>
        </table>
        <div class="btn-detalle">
            {* si se viene desde la vista por categorias, el boton volver muestra nuevamente el catalo por categorias, 
               caso contrario, se muestra el catalogo general por vehiculos *}
            {if ($id_cat != null)}
                <a class="btn btn-danger" href="verCatalogoPorCategorias/{$id_cat}">Volver</a>
            {else}
                <a class="btn btn-danger" href="verCatalogoVehiculos/?pagina={$pagina}">Volver</a>
            {/if}
        </div>  
    </div>
</section>

