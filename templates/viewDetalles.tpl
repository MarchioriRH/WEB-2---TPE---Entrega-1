{include file="header.tpl"}
    
        
    <div class="container">
        <h1>{$titulo}</h1>
        <table class="default">
            <tr>
                <th>Año</th>
                <th>Kilometros</th>
                <th>Precio</th>                        
            </tr>
            {foreach from=$vehiculos item=$vehiculo}
                <tr>
                    <td>{$vehiculo->anio}</td>
                    <td>{$vehiculo->kilometros}</td>
                    <td>{$vehiculo->precio}</td>
                </tr>
            {/foreach}
        </table>
        
    </div>
    <div class="btn-detalle">
        <a class="btn btn-danger" href="verCatalogoCompleto">Volver</a>
    </div>
               
    
{include file="footer.tpl"}