{include file="templates/tplGeneral/header.tpl"}
    <span class="title" id=flag hidden="hidden">{$flag}</span>
    <input class="title" id=id type="hidden" value={$id}>
    <div class="container">       
        <h1>{$titulo}</h1>
            <div class="mb-2">
                <a class="btn btn-danger" onClick="history.go(-1)">Volver</a>
            </div> 
        {include file="templates/vue/comments.tpl"}
    </div>    
    <script type="text/javascript" src="js/comments/comments.js"></script>
{include file="templates/tplGeneral/footer.tpl"}