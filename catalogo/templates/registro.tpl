{include file="header.tpl"}
<section id="modalContainerMensaje" class="modalContainerMensaje mostrar">
    <div class="modalMsge">
        <h1>REGISTRO</h1>
        <div class="form">
                <form action="registro" method="post">
                <div class="mb-2">
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                    </div>
                    <div class="mb-2">               
                        <input type="text" class="form-control" name="apellido" placeholder="Apellido">
                    </div>
                    <div class="mb-2">
                        <input type="text" class="form-control" name="mail" placeholder="e-Mail">
                    </div>
                    <div class="mb-2">               
                        <input type="text" class="form-control" name="passwoerd" placeholder="Password">
                    </div>
                    
                    <div class="btn-detalle">
                        <button type="submit" class="btn btn-danger">Registrar</button>
                        <a class="btn btn-danger" href="catalogo">Cancelar</a>
                    </div>  
                </form>
            
        </div>
    </div>
</section>
{include file="footer.tpl"}
