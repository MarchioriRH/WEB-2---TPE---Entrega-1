{include file="templates/tplGeneral/header.tpl"}
    <span class="title" id=flag hidden="hidden">{$flag}</span>
    <span class="title" id=id hidden="hidden">{$id}</span>
    <div class="container">       
        <h1>{$titulo}</h1>
            <div class="mb-2">
                <a class="btn btn-danger" onClick="history.go(-1)">Volver</a>
            </div>
             <div class="mb-2">
                <select class="form-control" id="select_categoria">
                    <option value="0">Ordenar por</option>
                    <option value="0">Fecha</option>
                    <option value="0">Puntaje</option>
                </select>  
            </div>
             <div class="mb-2">    
                <a class="btn btn-primary" href="verCatalogoVehiculos">Ordenar Ascendente</a>
       
                <a class="btn btn-success" href="verCatalogoVehiculos">Volver</a>
            </div> 
        
        {include file="templates/vue/comments.tpl"}
    </div>    
    <script type="text/javascript" src="js/comments/comments.js"></script>
{include file="templates/tplGeneral/footer.tpl"}