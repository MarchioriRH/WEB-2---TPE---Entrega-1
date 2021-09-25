
<section id="modalContainerMensaje" class="modalContainerMensaje mostrar">
    <div class="modalMsge">
        <h1>{$tituloEdit}</h1>
        <div class="form">
            {foreach from=$vehiculos item=$vehiculo}
                <form action="editVehiculoDB/{$vehiculo->id_vehiculo}" method="post">
                    <div class="mb-2">  
                        <select class="form-select" aria-label="Default select example" name="tipo">
                            <option selected="true" value={$vehiculo->Tipo}>{$vehiculo->Tipo}</option>
                            {foreach from=$categorias item=$categoria}
                                <option value={$categoria->idTipo}>{$categoria->tipo}</option>
                            {/foreach}
                        </select>
                    </div>
                    <div class="mb-2">
                        <input type="text" class="form-control" name="marca" value="{$vehiculo->marca}">
                    </div>
                    <div class="mb-2">               
                        <input type="text" class="form-control" name="modelo" value="{$vehiculo->modelo}">
                    </div>
                    <div class="mb-2">       
                        <input type="number" class="form-control"  name="anio" value="{$vehiculo->anio}">
                    </div>
                    <div class="mb-2">       
                        <input type="text" class="form-control"  name="kms" value="{$vehiculo->kilometros}">
                    </div>
                    <div class="mb-2">       
                        <input type="number" class="form-control"  name="precio" value="{$vehiculo->precio}">
                    </div>
                    <div class="btn-detalle">
                        <button type="submit" class="btn btn-danger">Guardar</button>
                        <a class="btn btn-danger" href="verCatalogoCompleto">Cancelar</a>
                    </div>  
                </form>
            {/foreach}
        </div>
    </div>
</section>
