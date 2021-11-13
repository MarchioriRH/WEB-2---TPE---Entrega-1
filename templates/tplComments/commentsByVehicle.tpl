{include file="templates/tplGeneral/header.tpl"}
    <span class="title" id=flag hidden="hidden">{$flag}</span>
    <input class="title" id=id type="hidden" value={$id}>
    <input class="title" id=logged type="hidden" value={$session}>
    <div class="container">       
        <h1>{$titulo}</h1>
            <div class="sort">
                <div>
                    <a class="btn btn-danger" onClick="history.go(-1)">Volver</a>
                </div>
                <div class="sortInnerScore">
                    <p>Filtro por puntuación</p>
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
                
                    <div class="sortScore">
                        <button type="sumbit" class="btn btn-success" onClick="filterByScore({$id})">Filtrar</button>
                    </div>
                </div>
            </div>
             
        {include file="templates/vue/comments.tpl"}
    </div>    
    <script type="text/javascript" src="js/comments/comments.js"></script>
{include file="templates/tplGeneral/footer.tpl"}