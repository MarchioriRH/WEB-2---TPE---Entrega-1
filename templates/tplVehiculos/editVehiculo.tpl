{* template encargado de la vista del modal para editar un item de la BBDD *}
<section id="modalContainerMensaje" class="modalContainerMensaje mostrar">
    <div class="modalMsge">
        <h1>{$tituloEdit}</h1>
        <div class="form">
            {foreach from=$vehiculos item=$vehiculo}
                <form action="editVehiculoDB/{$vehiculo->id_vehiculo}" method="post">
                    <div class="mb-2">  
                        <select class="form-select" aria-label="Default select example" name="tipo">
                            <option selected="true" value={$vehiculo->id_categoria} required>{$vehiculo->Tipo}</option>
                            {foreach from=$categorias item=$categoria}
                                {if $categoria->tipo != $vehiculo->Tipo}
                                    <option value={$categoria->idTipo}>{$categoria->tipo}</option>
                                {/if}
                            {/foreach}
                        </select>
                    </div>
                    <div class="mb-2">
                        <input type="text" class="form-control" name="marca" value="{$vehiculo->marca}" required>
                    </div>
                    <div class="mb-2">               
                        <input type="text" class="form-control" name="modelo" value="{$vehiculo->modelo}" required>
                    </div>
                    <div class="mb-2">       
                        <input type="number" class="form-control"  name="anio" value="{$vehiculo->anio}" required>
                    </div>
                    <div class="mb-2">       
                        <input type="number" class="form-control"  name="kms" value="{$vehiculo->kilometros}" required>
                    </div>
                    <div class="mb-2">       
                        <input type="number" class="form-control"  name="precio" value="{$vehiculo->precio}" required>
                    </div>
                    {* si se viene de la vista de categoria, este input hidden se envia en el POST para indicar en el
                    controller que se debe renderizar la tabla de items con la seleccion por categoria aplicada *}
                    {if ($id_categoria != null)}
                        <input type="hidden" class="form-control"  name="id_categoria" value="{$id_categoria}">
                    {/if}
                    <div class="btn-detalle">
                        <button type="submit" class="btn btn-danger">Guardar</button>
                        {* si se viene de la vista de categoria se muestra el catalogo con la seleccion por categoria aplicada,
                        si no es asi, se muestra el catalogo general de vehiculos *}
                        {if ($id_categoria != null)}
                            <a class="btn btn-danger" href="verCatalogoPorCategorias/{$id_categoria}">Cancelar</a>
                        {else}
                            <a class="btn btn-danger" href="verCatalogoVehiculos">Cancelar</a>
                        {/if}
                    </div>  
                </form>
            {/foreach}
        </div>
    </div>
</section>
