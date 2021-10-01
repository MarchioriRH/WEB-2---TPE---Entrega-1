<section id="modalContainerMensaje" class="modalContainerMensaje mostrar">
    <div class="modalMsge">
        <h1>{$tituloEdit}</h1>
        <div class="form">
            {foreach from=$categorias item=$categoria}
                <form action="editCategoriaDB/{$categoria->id_categoria}" method="post">
                    <div class="mb-2">
                        <input type="text" class="form-control" name="tipo" value="{$categoria->tipo}">
                    </div>
                    <div class="btn-detalle">
                        <button type="submit" class="btn btn-danger">Guardar</button>
                        <a class="btn btn-danger" href="verCatalogoCategoria">Cancelar</a>
                    </div>  
                </form>
            {/foreach}
        </div>
    </div>
</section>
