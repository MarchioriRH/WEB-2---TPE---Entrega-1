{include file="templates/tplGeneral/header.tpl"}
    <input class="title" id=flag type="hidden" value={$flag}>
    <input class="title" id=id type="hidden" value={$id}>
    <input class="title" id=logged type="hidden" value={$session}>
    <input class="title" id=rol type="hidden" value={$sessionRol}>
    
    <div class="container">       
        <h1>{$titulo}</h1>
            
            <div class="subFilterContainer">
                <div class="btnBack">
                    {if $fromCat != null}
                        <a class="btn btn-danger btn-back" href="verCatalogoPorCategorias/{$fromCat}">Volver</a>
                    {else}
                        <a class="btn btn-danger btn-back" href="verCatalogoVehiculos/?pagina={$pagina}">Volver</a>
                    {/if}
                </div>
                {if $session == 1}
                    <div class="btn-AddComment">
                        <a class="btn btn-success btn-comment btn-sm" role="button" href="addComment/{$id}/?pagina={$pagina}">Dejenos su comentario</a>
                    </div>
                {/if}
                <div class="filterRadio">
                    <label class="labelFilter">Filtro por puntuación</label>
                    <div class="filterInnerRadio">
                       
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                            <label class="form-check-label" for="inlineRadio1">1</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">2</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                            <label class="form-check-label" for="inlineRadio3">3</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="option4">
                            <label class="form-check-label" for="inlineRadio4">4</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio5" value="option5">
                            <label class="form-check-label" for="inlineRadio5">5</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio6" value="option6" checked>
                            <label class="form-check-label" for="inlineRadio6">Todos</label>
                        </div>
                    </div>                     
                    <div class="filterButton">
                        <button type="sumbit" class="btn btn-success" onClick="filterByScore({$id})">Filtrar</button>
                    </div>
                </div>
                
            </div>
        {include file="templates/vue/comments.tpl"}
    </div>    
    <script type="text/javascript" src="js/comments/comments.js"></script>
{include file="templates/tplGeneral/footer.tpl"}