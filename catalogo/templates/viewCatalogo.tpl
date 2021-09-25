{include file="header.tpl"}
    <div class="container">
        <h1>{$titulo}</h1>
        <div class="mb-2">
            <a class="btn btn-danger" href="addNewVehiculo">Añadir nuevo Vehiculo</a>
            <a class="btn btn-danger" href="deleteTask/'.$tarea->id_tarea.'">Añadir nueva categoria</a> 
        </div>   
        <table class="default">
            <tr>
                <th>Categoria</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Detalles</th>
                <th>Editar</th>
                <th>Borrar</th>
            </tr>
            {foreach from=$vehiculos item=$catalogo}
                <tr>
                    <td>{$catalogo->Tipo}</td>
                    <td>{$catalogo->marca}</td>
                    <td>{$catalogo->modelo}</td>
                    <td><a href="detalles/{$catalogo->id_vehiculo}">Mas detalles</a></td>
                    <td><a href="editar/{$catalogo->id_vehiculo}">Editar</a></td>
                    <td><a href="eliminar/{$catalogo->id_vehiculo}">Eliminar</a></td>
                </tr>
            {/foreach}
            
        </table>
    </div>

{include file="footer.tpl"}