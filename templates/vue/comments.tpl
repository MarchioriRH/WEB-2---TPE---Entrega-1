{literal}
    <div id="apiResponse">
       
        <table v-if="comments != []" id="comments-table" class="default">
            <tr>
                <th>Usuario</th>
                <th><a href="javascript:getCommentsOrd('date')">Fecha</a></th>
                <th>Comentario</th>
                <th><a href="javascript:getCommentsOrd('score')">Puntuacion</a></th>
                <th>Acciones</th>
            </tr>
            <tr v-for="comment in comments">
                <td>{{comment.id_usuario}}</td>
                <td>{{comment.fecha}}</td>
                <td>{{comment.comment}}</td>
                <td>{{comment.score}}</td>
                <td hidden="hidden" id="idComment">{{comment.id_comment}}</td>
                <td>
                    <button class="btn btn-danger" :onclick="`deleteComment(${comment.id_comment}, ${comment.id_vehiculo})`">Eliminar</button>
                </td>
            </tr>   

        </table>
        
    </div>
{/literal}