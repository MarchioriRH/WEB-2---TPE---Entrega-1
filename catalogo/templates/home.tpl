{include file="header.tpl"}
    <div class="container">
    <h1>{$titulo}</h1>
        <div class="btn-group">
            <a class="btn btn-danger" href="catalogo/verCatalogoCompleto">Ver todos los items</a>
            <a class="btn btn-danger" href="deleteTask/'.$tarea->id_tarea.'">Ver todas las categorias</a>
            <a class="btn btn-danger" href="catalogo/addNewVehiculo">Añadir nuevo Vehiculo</a>
            <a class="btn btn-danger" href="deleteTask/'.$tarea->id_tarea.'">Añadir nueva categoria</a>       
        </div>
    </div>

{include file="footer.tpl"}