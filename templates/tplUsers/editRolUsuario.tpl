<section id="modalContainerMensaje" class="modalContainerMensaje mostrar">
    {* Template para renderizar el modal de cambio de rol de usuario *}
    <div class="modalMsge">
        <h1>{$tituloEdit} {$user->nombre} {$user->apellido}</h1>
        <div class="form">           
            <form action="editRolUsuarioDB/{$idUsuario}" method="post">
                <div class="mb-2">  
                    <select class="form-select" aria-label="Default select example" name="rol">
                        <option selected="true" value={$user->rol} required>
                            {if $user->rol == 1}
                                Admin
                            {else}
                                User
                            {/if} 
                        </option>
                        {foreach from=$roles item=$rol}
                            {if $rol->rolUsuario != $user->rol}
                                <option value={$rol->rolUsuario}>
                                    {if $rol->rolUsuario == 1}
                                        Admin
                                    {else}
                                        User
                                    {/if}  
                                </option>
                            {/if}
                        {/foreach}
                    </select>
                </div>
                <div class="btn-detalle">
                    <button type="submit" class="btn btn-danger">Guardar</button>
                    <a class="btn btn-danger" href="adminUsers">Cancelar</a>
                </div>  
            </form>            
        </div>
    </div>
</section>
