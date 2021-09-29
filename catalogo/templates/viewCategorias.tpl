{include file="header.tpl"}
    <div class="container">
        <h1>{$titulo}</h1>
        <div class="mb-2">
            <a class="btn btn-danger" href="addNewCategoria">Añadir nueva categoria</a> 
        </div>   
        <table class="default">
            <tr>
                <th>Categoria</th>
                <th>Editar</th>
                <th>Eliminar</th>  
            </tr>
            {foreach from=$categorias item=$catalogocat}
                <tr>
                    <td>{$catalogocat->tipo}</td>
                    <td><a href="editarCategoria/{$catalogocat->id_categoria}">Editar</a></td>
                    <td><a href="eliminarCategoria/{$catalogocat->id_categoria}">Eliminar</a></td>
                </tr>
            {/foreach}
            
        </table>
    </div>

{include file="footer.tpl"}