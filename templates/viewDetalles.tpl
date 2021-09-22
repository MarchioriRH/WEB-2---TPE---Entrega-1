
   
    <section id="modalContainerMensaje" class="modalContainerMensaje mostrar">
            <div class="modalMsge">
                <h1>{$tituloDetalle}</h1>
                <table class="default">
                    <tr>
                        <th>Año</th>
                        <th>Kilometros</th>
                        <th>Precio</th>                        
                    </tr>
                    {foreach from=$detalles item=$detalle}
                        <tr>
                            <td>{$detalle->anio}</td>
                            <td>{$detalle->kilometros}</td>
                            <td>{$detalle->precio}</td>
                        </tr>
                    {/foreach}
                </table>
                <div class="btn-detalle">
                    <a class="btn btn-danger" href="verCatalogoCompleto">Volver</a>
                </div>  
            </div>
        </section>

