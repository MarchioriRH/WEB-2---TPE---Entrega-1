{include file="templates/tplGeneral/header.tpl"}
    <div class="container">
        <h1>{$titulo}</h1>
        <table class="default">
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Mail</th>
                <th>Rol</th>
                <th>Cambiar rol</th>
                <th>Eliminar</th>
            </tr>
            {foreach from=$usuarios item=$usuario}
                <tr>
                    <td>{$usuario->nombre}</td>
                    <td>{$usuario->apellido}</td>
                    <td>{$usuario->mail}</td>
                    {if ($usuario->rol) == 1}
                        <td>Admin</td>
                    {else}
                        <td>User</td>
                    {/if}
                    <td><a class="btn btn-success btn-sm" role="button" href="editarRolUsuario/{$usuario->id_usuario}">Cambiar rol</a></td>                    
                    <td><a class="btn btn-danger btn-sm" role="button" href="eliminarUsuario/{$usuario->id_usuario}">Eliminar</a></td>
                </tr>
            {/foreach}
        </table>
    </div>
{include file="templates/tplGeneral/footer.tpl"}