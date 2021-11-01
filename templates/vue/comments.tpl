{literal}
    <div id="apiResponse">
        <table v-if="comments != []" id="comments-table" class="default">
            <tr>
                <th>Usuario</th>
                <th>Fecha</th>
                <th>Comentario</th>
                <th>Puntuacion</th>
            </tr>
            <tr v-for="comment in comments">
                <td>{{comment.id_usuario}}</td>
                <td>{{comment.fecha}}</td>
                <td>{{comment.comment}}</td>
                <td>{{comment.score}}</td>
            </tr>   
        </table>
    </div>
{/literal}