{* Modal para carga de nuevo comentario *}
<section id="modalContainerMensaje" class="modalContainerMensaje mostrar">
    <div class="modalMsge">
        <span class="title" id=flag hidden="hidden">{$flag}</span>
        <span class="title" id=id hidden="hidden">{$id}</span>
        <h1>Dejenos su comentario</h1>
        <div class="form">
            <form>
                <div class="mb-2">
                    <input type="hidden" id="id_vehiculo" value="{$id}">
                </div>
                <div class="mb-2">
                    <input type="hidden" id="id_usuario" value="{$idUsuario}">
                </div>
                <div class="mb-3">
                    <textarea class="form-control" id="comment" rows="3"></textarea>
                </div>
                <div class="mb-2">
                    <label for="customRange2" class="form-label">¿Que tanto le gusta este vehiculo?</label>
                    <input type="range" id="score" class="form-range" min="1" max="5" id="customRange2">
                </div>
                 <div class="btn-detalle">
                    <button type="submit" id="addComment" class="btn btn-danger">Guardar</button>
                    <a class="btn btn-danger" href="verCatalogoVehiculos">Cancelar</a>
                </div>  
            </form>
        </div>
    </div>
</section>