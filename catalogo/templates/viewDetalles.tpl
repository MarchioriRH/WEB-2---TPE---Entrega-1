{* template encargado de renderizar el modal con los detalle de un item seleccionado *}
<section id="modalContainerMensaje" class="modalContainerMensaje mostrar">
    <div class="modalMsge">
        {foreach from=$detalles item=$detalle}
            <h1>{$tituloDetalle}: {$detalle->marca}, {$detalle->modelo}</h1>
            <table class="default">
                <tr>
                    <th>Año</th>
                    <th>Kilometros</th>
                    <th>Precio</th>                        
                </tr>
                <tr>
                    <td>{$detalle->anio}</td>
                    <td>{$detalle->kilometros}</td>
                    <td>{$detalle->precio}</td>
                </tr>
            </table>
        {/foreach}
        <div class="btn-detalle">
            {* si se viene desde la vista por categorias, el boton volver muestra nuevamente el catalo por categorias, 
               caso contrario, se muestra el catalogo general por vehiculos *}
            {if ($id_cat != null)}
                <a class="btn btn-danger" href="verCatalogoPorCategorias/{$id_cat}">Volver</a>
            {else}
                <a class="btn btn-danger" href="verCatalogoVehiculos">Volver</a>
            {/if}
        </div>  
    </div>
</section>

