{include file="header.tpl"}
    <div class="container">
        <h1>{$titulo}</h1>
        <table class="default">
            <tr>
                <th>Categoria</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Detalles</th>
               
            </tr>
            {foreach from=$vehiculos item=$vehiculo}
                <tr>
                    <td>{$vehiculo->Tipo}</td>
                    <td>{$vehiculo->marca}</td>
                    <td>{$vehiculo->modelo}</td>
                    <td><a href="detalles/{$vehiculo->id_vehiculo}">Mas detalles</a></td>
                    
                </tr>
            {/foreach}
            
        </table>
    </div>

{include file="footer.tpl"}