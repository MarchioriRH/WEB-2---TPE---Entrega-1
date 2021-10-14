{* template encargado de rendeziar la tabla de items, de acuerdo al tipo de usuario logueado
    muestra distintos elementos, se incluyen los templates header y footer *}
{include file="header.tpl"}
    <div class="container">
        <h1>{$titulo}</h1>
        {* si el usuario es nivel 1 (admin) y NO se viene desde la vista por categoria 
        se muestra el boton agregar item *}
        {if ($session && ($rol == 1) && $id_cat == null)}
            <div class="mb-2">
                <a class="btn btn-danger" href="addNewVehiculo">Añadir nuevo Vehiculo</a>
            </div> 
        {/if} 
        {* si se viene desde la vista por categoria, el boton volver muestra el listado por categoria *}
        {if $id_cat != null}
            <div class="mb-2">
                <a class="btn btn-danger" href="verCatalogoCategoria">Volver</a>
            </div> 
        {/if}
        <table class="default">
            <tr>
                <th>Categoria</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Detalles</th>
                {* si esta la sesion iniciada y el rol de usuario es 1 (admin) se muestran los enlaces a 
                las opciones de Editar o Borrar *}
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
                    {* si NO esta la sesion iniciada y NO se viene de la vista por categoria, se muestra el enlace
                    por defecto para ver los detalles *}
                    {if !$session && ($id_cat == null)}
                        <td><a href="detallesVehiculo/{$catalogo->id_vehiculo}">Mas detalles</a></td>
                    {elseif (!$session && ($id_cat != null))}
                        {* si NO esta la sesion inciada, pero SI se viene de la vista por categoria, el link cambia al de vista
                        de detalles en categoria *}
                        <td><a href="detallesVehiculoEnCategoria/{$catalogo->id_vehiculo}">Mas detalles</a></td>
                    {/if}                   
                    {* si el usuario es nivel 1 (admin) se muestran los links para editar o elimar un item *}
                    {if ($session && ($rol == 1))}
                        {* si se viene de la vista por categoria, se muestran los links para editar desde esa vista, sino se muestran los de 
                        la vista general *}
                        {if ($id_cat != null)}
                            <td><a href="detallesVehiculoEnCategoria/{$catalogo->id_vehiculo}">Mas detalles</a></td>
                            <td><a href="editarVehiculoEnCategoria/{$catalogo->id_vehiculo}">Editar</a></td>
                            <td><a data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true" title="<b>¡ATENCION!</b><br>El vehiculo marca {$catalogo->marca}, modelo {$catalogo->modelo} sera eliminado de la base de datos." href="eliminarVehiculoDesdeCategoria/{$catalogo->id_vehiculo}">Eliminar</a></td>
                        {else}
                            <td><a href="detallesVehiculo/{$catalogo->id_vehiculo}">Mas detalles</a></td>
                            <td><a href="editarVehiculo/{$catalogo->id_vehiculo}">Editar</a></td>
                            <td><a data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true" title="<b>¡ATENCION!</b><br>El vehiculo marca {$catalogo->marca}, modelo {$catalogo->modelo}  sera eliminado de la base de datos." href="eliminarVehiculo/{$catalogo->id_vehiculo}">Eliminar</a></td>
                        {/if}
                       
                    {/if}
                </tr>
            {/foreach}
        </table>
    </div>
{include file="footer.tpl"}