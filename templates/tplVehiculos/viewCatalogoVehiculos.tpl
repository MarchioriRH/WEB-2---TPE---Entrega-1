{* template encargado de rendeziar la tabla de items, de acuerdo al tipo de usuario logueado
    muestra distintos elementos, se incluyen los templates header y footer *}
{include file="templates/tplGeneral/header.tpl"}
    <div class="container">
        <h1>{$titulo}</h1>
        {* si el usuario es nivel 1 (admin) y NO se viene desde la vista por categoria 
        se muestra el boton agregar item *}
        {if ($session && ($rol == 1) && $id_cat == null)}
            <div class="mb-2">
                <a class="btn btn-danger btn-sm" href="addNewVehiculo">Añadir nuevo Vehiculo</a>
            </div> 
        {/if} 
        {* si se viene desde la vista por categoria, el boton volver muestra el listado por categoria *}
        {if $id_cat != null}
            <div class="mb-2">
                <a class="btn btn-danger btn-sm" href="verCatalogoCategoria">Volver</a>
            </div> 
        {/if}
        <table class="default">
            <tr>
                <th>Categoria</th>
                <th>Marca</th>
                <th>Modelo</th>
                {if ($session)}
                    <th colspan="2">Comentarios</th>
                {else}
                    <th>Comentarios</th>
                {/if}
                <th>Detalles</th>
                {* si esta la sesion iniciada y el rol de usuario es 1 (admin) se muestran los enlaces a 
                las opciones de Editar o Borrar*} 
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
                    {if (!$session)}
                        <td><a class="btn btn-info btn-sm" role="button" href="showComments/{$catalogo->id_vehiculo}">Ver</a></td>
                    {/if}
                    {* si NO esta la sesion iniciada y NO se viene de la vista por categoria, se muestra el enlace
                    por defecto para ver los detalles *}
                    {if (($rol == 0) && ($id_cat == null))}
                        {if $session}
                            <td><a class="btn btn-primary btn-sm" role="button" href="showComments/{$catalogo->id_vehiculo}">Ver</a></td>
                            <td><a class="btn btn-success btn-sm" role="button" href="addComment/{$catalogo->id_vehiculo}">Comentar</a></td>
                        {/if}
                        <td><a class="btn btn-secondary btn-sm" role="button" href="detallesVehiculo/{$catalogo->id_vehiculo}">Mas detalles</a></td>
                    {elseif (($rol == 0) && ($id_cat != null))}
                        {* si NO esta la sesion inciada, pero SI se viene de la vista por categoria, el link cambia al de vista
                        de detalles en categoria *}
                        {if $session}
                            <td><a class="btn btn-primary btn-sm" role="button" href="showComments/{$catalogo->id_vehiculo}">Ver</a></td>
                            <td><a class="btn btn-success btn-sm" role="button" href="addComment/{$catalogo->id_vehiculo}">Comentar</a></td>
                        {/if}
                        <td><a class="btn btn-secondary btn-sm" role="button" href="detallesVehiculoEnCategoria/{$catalogo->id_vehiculo}">Mas detalles</a></td>
                    {/if}                   
                    {* si el usuario es nivel 1 (admin) se muestran los links para editar o elimar un item *}
                    {if ($session && ($rol == 1))}
                        {* si se viene de la vista por categoria, se muestran los links para editar desde esa vista, sino se muestran los de 
                        la vista general *}
                        {if ($id_cat != null)}
                            <td><a class="btn btn-primary btn-sm" role="button" href="showComments/{$catalogo->id_vehiculo}">Ver</a></td>
                            <td><a class="btn btn-success btn-sm" role="button" href="addComment/{$catalogo->id_vehiculo}">Comentar</a></td>
                            <td><a class="btn btn-secondary btn-sm" role="button" href="detallesVehiculoEnCategoria/{$catalogo->id_vehiculo}">Mas detalles</a></td>
                            <td><a class="btn btn-success btn-sm" role="button" href="editarVehiculoEnCategoria/{$catalogo->id_vehiculo}">Editar</a></td>
                            <td><a class="btn btn-danger btn-sm" role="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true" title="<b>¡ATENCION!</b><br>El vehiculo marca {$catalogo->marca}, modelo {$catalogo->modelo} sera eliminado de la base de datos." href="eliminarVehiculoDesdeCategoria/{$catalogo->id_vehiculo}">Eliminar</a></td>
                        {else}
                            <td><a class="btn btn-primary btn-sm" role="button" href="showComments/{$catalogo->id_vehiculo}">Ver</a></td>
                            <td><a class="btn btn-success btn-sm" role="button" href="addComment/{$catalogo->id_vehiculo}">Comentar</a></td>
                            <td><a class="btn btn-secondary btn-sm" role="button" href="detallesVehiculo/{$catalogo->id_vehiculo}">Mas detalles</a></td>
                            <td><a class="btn btn-success btn-sm" role="button" href="editarVehiculo/{$catalogo->id_vehiculo}">Editar</a></td>
                            <td><a class="btn btn-danger btn-sm" role="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true" title="<b>¡ATENCION!</b><br>El vehiculo marca {$catalogo->marca}, modelo {$catalogo->modelo}  sera eliminado de la base de datos." href="eliminarVehiculo/{$catalogo->id_vehiculo}">Eliminar</a></td>
                        {/if}
                       
                    {/if}
                </tr>
            {/foreach}
        </table>
    </div>
{include file="templates/tplGeneral/footer.tpl"}