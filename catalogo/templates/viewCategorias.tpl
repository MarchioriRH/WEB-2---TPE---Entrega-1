{* template encargado de renderizar la tabla de Categorias *}
{include file="header.tpl"}
    <div class="container">
        <h1>{$titulo}</h1>
        {* si esta la sesion iniciada y el rol de usuadio logueado es 1 (admin), se muestra el boton para agregar
           una nueva categoria *}
        {if $session && ($rol == 1) }
            <div class="mb-2">
                <a class="btn btn-danger" href="addNewCategoria">Añadir nueva categoria</a> 
            </div> 
        {/if}    
        <table class="default">
            <tr>
                <th>Categoria</th>
                <th>Vehiculos</th>
                {* si esta la sesion iniciada y el rol de usuario es 1, se muestran las columnas de editar y borrar *}
                {if ($session && ($rol == 1))}
                    <th>Editar</th>
                    <th>Borrar</th>
                {/if}  
            </tr>
            {foreach from=$categorias item=$catalogocat}
                <tr>
                    <td>{$catalogocat->tipo}</td>
                    <td><a href="verCatalogoPorCategorias/{$catalogocat->id_categoria}">Ver vehiculos</a></td> 
                    {* si esta la sesion iniciada y el rol de usuario es 1, se muestran los botones de editar y borrar *}
                    {if ($session && ($rol == 1))}
                        <td><a href="editarCategoria/{$catalogocat->id_categoria}">Editar</a></td>                
                        <td><a data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true" title="<b>¡ATENCION!</b><br>La categoria {$catalogocat->tipo} y todos los items asociados seran eliminados de la base de datos." href="eliminarCategoria/{$catalogocat->id_categoria}">Eliminar</a></td>
                    {/if}  
                </tr>
            {/foreach}
        </table>
    </div>
{include file="footer.tpl"}