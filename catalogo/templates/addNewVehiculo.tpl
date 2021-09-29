<section id="modalContainerMensaje" class="modalContainerMensaje mostrar">
    <div class="modalMsge">
        <h1>{$texto1}</h1>
        <div class="form">
            <form action="insertNewVehiculoDB" method="post">
                <div class="mb-2">  
                <select class="form-select" aria-label="Default select example" name="tipo">
                    <option name="seleccionar">Seleccionar</option>
                    {foreach from=$categorias item=$categoria}
                        <option value={$categoria->idTipo}>{$categoria->tipo}</option>
                    {/foreach}
                </select>
                </div>
                <div class="mb-2">
                    <input type=text class="form-control" placeholder="Marca" name="marca">
                </div>
                <div class="mb-2">               
                    <input type=text class="form-control" placeholder="Modelo" name="modelo">
                </div>
                <div class="mb-2">       
                    <input type=number class="form-control" placeholder="Año" name="anio">
                </div>
                <div class="mb-2">       
                    <input type=text class="form-control" placeholder="Kilometros" name="kms">
                </div>
                <div class="mb-2">       
                    <input type=number class="form-control" placeholder="Precio" name="precio">
                 </div>
                 <div class="btn-detalle">
                    <button type="submit" class="btn btn-danger">Guardar</button>
                    <a class="btn btn-danger" href="verCatalogoCompleto">Cancelar</a>
                </div>  
            </form>
        </div>
    </div>
</section>

<!--<div class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="insertNewVehiculoDB" method="post">
                    <div class="mb-2">  
                        <select class="form-select" aria-label="Default select example" name="tipo">
                            <option name="seleccionar">Seleccionar</option>
                            {foreach from=$categorias item=$categoria}
                                <option value={$categoria->idTipo}>{$categoria->tipo}</option>
                            {/foreach}
                        </select>
                    </div>
                    <div class="mb-2">
                        <input type=text class="form-control" placeholder="Marca" name="marca">
                    </div>
                    <div class="mb-2">               
                        <input type=text class="form-control" placeholder="Modelo" name="modelo">
                    </div>
                    <div class="mb-2">       
                        <input type=number class="form-control" placeholder="Año" name="anio">
                    </div>
                    <div class="mb-2">       
                        <input type=text class="form-control" placeholder="Kilometros" name="kms">
                    </div>
                    <div class="mb-2">       
                        <input type=number class="form-control" placeholder="Precio" name="precio">
                    </div>
                    <div class="btn-detalle">
                        <button type="submit" class="btn btn-danger">Guardar</button>
                        <a class="btn btn-danger" href="verCatalogoCompleto">Cancelar</a>
                    </div>  
                </form>
            </div>
        
        </div>
    </div>
</div>-->
