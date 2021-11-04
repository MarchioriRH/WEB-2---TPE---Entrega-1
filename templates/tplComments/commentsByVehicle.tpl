{include file="templates/tplGeneral/header.tpl"}
    <span class="title" id=flag hidden="hidden">{$flag}</span>
    <span class="title" id=id hidden="hidden">{$id}</span>
    <div class="container">       
        <h1>{$titulo}</h1>
            
        <div class="mb-2">
                <a class="btn btn-danger" href="verCatalogoVehiculos">Volver</a>
        </div> 
        
        <div id='divTabla'></div>
        
        </div>
    
    </div>    
    
    <script type="text/javascript" src="js/comments/comments.js"></script>

{include file="templates/tplGeneral/footer.tpl"}