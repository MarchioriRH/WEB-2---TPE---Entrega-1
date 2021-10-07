{* template encargado de rendeziar la tabla de items, de acuerdo al tipo de usuario logueado
    muestra distintos elementos, se incluyen los templates header y footer *}
{include file="header.tpl"}
    <div class="container">
        <h1>{$titulo}</h1>
        <table class="default">
            <tr>
                <th>Categoria</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Detalles</th>
                {if ($session && ($rol == 1))}
                    <th>Editar</th>
                    <th>Borrar</th>
                {/if}
            </tr>
            {foreach from=$vehiculos item=$catalogo}
                <tr>
                    <td>{$catalogo->Tipo}</td>
                    <td>{$catalogo->marca}</td>
                    <td>{$catalogo->modelo}</td>
                    <td><a href="detallesVehiculo/{$catalogo->id_vehiculo}">Mas detalles</a></td>
                    {* si el usuario es nivel 1 (admin) se muestralos links para editar o elimar un item *}
                    {if ($session && ($rol == 1))}
                        <td><a href="editarVehiculo/{$catalogo->id_vehiculo}">Editar</a></td>
                        <td><a data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true" title="<b>¡ATENCION!</b><br>El item {$catalogo->id_vehiculo} sera eliminado de la base de datos." href="eliminarVehiculo/{$catalogo->id_vehiculo}">Eliminar</a></td>
                    {/if}
                </tr>
            {/foreach}
        </table>
    </div>
{include file="footer.tpl"}