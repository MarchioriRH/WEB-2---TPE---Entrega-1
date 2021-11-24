{* template para renderizar el modal para agregar un nuevo item a la BBDD *}
<section id="modalContainerMensaje" class="modalContainerMensaje mostrar">
    <div class="modalMsge">
        <h1>{$texto1}</h1>
        <div class="form">
            <form action="insertNewVehiculoDB" method="POST">
                <div class="mb-2">  
                <select class="form-select" aria-label="Default select example" name="tipo">
                    <option disabled selected  required>Selecciona una opción</option>
                    {foreach from=$categorias item=$categoria}
                        <option value={$categoria->idTipo}>{$categoria->tipo}</option>
                    {/foreach}
                </select>
                </div>
                <div class="mb-2">
                    <input type=text class="form-control" placeholder="Marca" name="marca" required>
                </div>
                <div class="mb-2">               
                    <input type=text class="form-control" placeholder="Modelo" name="modelo" required>
                </div>
                <div class="mb-2">       
                    <input type=number class="form-control" placeholder="Año" name="anio" required>
                </div>
                <div class="mb-2">       
                    <input type=number class="form-control" placeholder="Kilometros/Horas" name="kms" required>
                </div>
                <div class="mb-2">       
                    <input type=number class="form-control" placeholder="Precio" name="precio" required>
                 </div>
                 <div class="mb-2">       
                    <p>*Para agregar una imagen, ve al menu "Editar Item"</p>
                 </div>
                 <div class="btn-detalle">
                    <button type="submit" class="btn btn-danger">Guardar</button>
                    <a class="btn btn-danger" href="verCatalogoVehiculos/?pagina={$pagina}">Cancelar</a>
                </div>  
            </form>
        </div>
    </div>
</section>
