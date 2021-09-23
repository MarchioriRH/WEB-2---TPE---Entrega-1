{include file="header.tpl"}
    <div class="container">
        <h1>{$titulo}</h1>
        <table class="default">
            <tr>
                <th>Categoria</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Detalles</th>
                <th>Borrar</th>
                
               
            </tr>
            {foreach from=$vehiculos item=$catalogo}
                <tr>
                    <td>{$catalogo->Tipo}</td>
                    <td>{$catalogo->marca}</td>
                    <td>{$catalogo->modelo}</td>
                    <td><a href="catalogo/detalles/{$catalogo->id_vehiculo}">Mas detalles</a></td>
                    <td><a href="catalogo/eliminar/{$catalogo->id_vehiculo}">Eliminar</a></td>
                </tr>
            {/foreach}
            
        </table>
    </div>

{include file="footer.tpl"}