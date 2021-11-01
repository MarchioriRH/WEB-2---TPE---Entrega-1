{include file="templates/tplGeneral/header.tpl"}
    <span class="title" id=flag hidden="hidden">{$flag}</span>
    <span class="title" id=id hidden="hidden">{$id}</span>
    <div class="container">       
        <h1>{$titulo}</h1>
        {include file='templates/vue/comments.tpl'}
    </div>    
    <script type="text/javascript" src="js/comments.js"></script>
{include file="templates/tplGeneral/footer.tpl"}