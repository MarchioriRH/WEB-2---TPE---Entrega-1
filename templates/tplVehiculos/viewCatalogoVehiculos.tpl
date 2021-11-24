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
                <a class="btn btn-danger btn-sm" href="verCatalogoCategoria/?pagina={$pagina}">Volver</a>
            </div> 
        {/if}
        <table class="default">
            <tr>
                <th>Categoria</th>
                <th>Marca</th>
                <th>Modelo</th>
                {if ($session)}
                    <th >Comentarios</th><!--colspan="2"-->
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
                    {if (!$session) && ($id_cat == null)}
                        <td><a class="btn btn-primary btn-sm" role="button" href="showComments/{$catalogo->id_vehiculo}/?pagina={$pagina}">Ver</a></td>
                    {elseif (!$session) && ($id_cat != null)}
                        <td><a class="btn btn-primary btn-sm" role="button" href="showComments/{$catalogo->id_vehiculo}/?fromCat={$id_cat}&pagina={$pagina}">Ver</a></td>
                    {/if}
                    {* si NO esta la sesion iniciada y NO se viene de la vista por categoria, se muestra el enlace
                    por defecto para ver los detalles *}
                    {if (($rol == 0) && ($id_cat == null))}
                        {if $session}
                            <td><a class="btn btn-primary btn-sm" role="button" href="showComments/{$catalogo->id_vehiculo}">Ver</a></td>
                        {/if}
                        <td><a class="btn btn-secondary btn-sm" role="button" href="detallesVehiculo/{$catalogo->id_vehiculo}/?pagina={$pagina}">Mas detalles</a></td>
                    {elseif (($rol == 0) && ($id_cat != null))}
                        {* si NO esta la sesion inciada, pero SI se viene de la vista por categoria, el link cambia al de vista
                        de detalles en categoria *}
                        {if $session}
                            <td><a class="btn btn-primary btn-sm" role="button" href="showComments/{$catalogo->id_vehiculo}/?fromCat={$id_cat}">Ver</a></td>
                        {/if}
                        <td><a class="btn btn-secondary btn-sm" role="button" href="detallesVehiculoEnCategoria/{$catalogo->id_vehiculo}/?pagina={$pagina}">Mas detalles</a></td>
                    {/if}                   
                    {* si el usuario es nivel 1 (admin) se muestran los links para editar o elimar un item *}
                    {if ($session && ($rol == 1))}
                        {* si se viene de la vista por categoria, se muestran los links para editar desde esa vista, sino se muestran los de 
                        la vista general *}
                        {if ($id_cat != null)}
                            <td><a class="btn btn-primary btn-sm" role="button" href="showComments/{$catalogo->id_vehiculo}/?fromCat={$id_cat}&pagina={$pagina}">Ver</a></td>
                            <td><a class="btn btn-secondary btn-sm" role="button" href="detallesVehiculoEnCategoria/{$catalogo->id_vehiculo}/?pagina={$pagina}">Mas detalles</a></td>
                            <td><a class="btn btn-success btn-sm" role="button" href="editarVehiculoEnCategoria/{$catalogo->id_vehiculo}/?pagina={$pagina}">Editar</a></td>
                            <td><a class="btn btn-danger btn-sm" role="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true" title="<b>¡ATENCION!</b><br>El vehiculo marca {$catalogo->marca}, modelo {$catalogo->modelo} sera eliminado de la base de datos." href="eliminarVehiculoDesdeCategoria/{$catalogo->id_vehiculo}/?pagina={$pagina}">Eliminar</a></td>
                        {else}
                            <td><a class="btn btn-primary btn-sm" role="button" href="showComments/{$catalogo->id_vehiculo}/?pagina={$pagina}">Ver</a></td>
                            <td><a class="btn btn-secondary btn-sm" role="button" href="detallesVehiculo/{$catalogo->id_vehiculo}/?pagina={$pagina}">Mas detalles</a></td>
                            <td><a class="btn btn-success btn-sm" role="button" href="editarVehiculo/{$catalogo->id_vehiculo}/?pagina={$pagina}">Editar</a></td>
                            <td><a class="btn btn-danger btn-sm" role="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true" title="<b>¡ATENCION!</b><br>El vehiculo marca {$catalogo->marca}, modelo {$catalogo->modelo}  sera eliminado de la base de datos." href="eliminarVehiculo/{$catalogo->id_vehiculo}/?pagina={$pagina}">Eliminar</a></td>
                        {/if}
                       
                    {/if}
                </tr>
            {/foreach}
        </table>
        {* Paginado *}
        {if $pagina > 0}
            <div class="pagination justify-content-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        {* Si pag = 1, se muestra el boton retroceso desactivado. *}
                        {if $pagina == 1}
                            <li class="page-item disabled">
                        {else}
                            <li class="page-item">
                        {/if}
                            <a class="page-link" {if $id_cat == null} href="verCatalogoVehiculos/?pagina={$pagina - 1}" {else}
                                href="verCatalogoPorCategorias/{$id_cat}/?pagina={$pagina - 1}" {/if} aria-label="Previous" >
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        {* Se muestra la cantidad de paginas *}
                        {for $i = 1 to $cantPags}
                            {if $pagina == $i}
                                <li class="page-item active">
                                    <a class="page-link" {if $id_cat == null} href="verCatalogoVehiculos/?pagina={$i}" {else}
                                    href="verCatalogoPorCategorias/{$id_cat}/?pagina={$i}" {/if}>{$i}<span class="sr-only">(current)</span></a>
                                </li>
                            {else}
                                <li class="page-item">
                                    <a class="page-link" {if $id_cat == null} href="verCatalogoVehiculos/?pagina={$i}" {else}
                                    href="verCatalogoPorCategorias/{$id_cat}/?pagina={$i}" {/if}>{$i}</a>
                                </li>
                            {/if}
                        {/for}
                        {* Si pag = cantPags, se muestra el boton avance desactivado. *}
                        {if $pagina == $cantPags}
                            <li class="page-item disabled">
                        {else}
                            <li class="page-item">
                        {/if}
                            <a class="page-link" {if $id_cat == null} href="verCatalogoVehiculos/?pagina={$pagina + 1}" {else}
                                href="verCatalogoPorCategorias/{$id_cat}/?pagina={$pagina + 1}" {/if} aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        {/if}
    </div>
{include file="templates/tplGeneral/footer.tpl"}