{include file="header.tpl"}
    <div class="container">
        <h1>{$titulo}</h1>
        <table class="default">
            <tr>
                <th>Categoria</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Año</th>
                <th>Kms</th>
                <th>Precio</th>
            </tr>
            {foreach from=$vehiculos item=$vehiculo}
                <tr>
                    <td>{$vehiculo->Tipo}</td>
                    <td>{$vehiculo->marca}</td>
                    <td>{$vehiculo->modelo}</td>
                    <td>{$vehiculo->anio}</td>
                    <td>{$vehiculo->kilometros}</td>
                    <td>{$vehiculo->precio}</td>
                </tr>
            {/foreach}
            
        </table>
    </div>

{include file="footer.tpl"}