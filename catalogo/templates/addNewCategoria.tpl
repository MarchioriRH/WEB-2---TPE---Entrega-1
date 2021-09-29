<section id="modalContainerMensaje" class="modalContainerMensaje mostrar">
    <div class="modalMsge">
        <h1>{$texto1}</h1>
        <div class="form">
            <form action="insertNewCategoriaDB" method="post">
                <div class="mb-2">
                    <input type=text class="form-control" placeholder="Categoria" name="tipo">
                </div>
                <div class="btn-detalle">
                    <button type="submit" class="btn btn-danger">Guardar</button>
                    <a class="btn btn-danger" href="verCatalogoCategoria">Cancelar</a>
                </div>  
            </form>
        </div>
    </div>
</section>
