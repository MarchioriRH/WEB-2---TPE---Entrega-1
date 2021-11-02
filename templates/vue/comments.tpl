{literal}
    <div id="apiResponse">
        <div class="mb-2">
                <a class="btn btn-danger" href="verCatalogoVehiculos">Volver</a>
        </div> 
        
        <table v-if="comments != []" id="comments-table" class="default">
            <tr>
                <th>Usuario</th>
                <th>Fecha</th>
                <th>Comentario</th>
                <th>Puntuacion</th>
                <th>Acciones</th>
            </tr>
            <tr v-for="comment in comments">
                <td>{{comment.id_usuario}}</td>
                <td>{{comment.fecha}}</td>
                <td>{{comment.comment}}</td>
                <td>{{comment.score}}</td>
                <td hidden="hidden" id="idComment">{{comment.id_comment}}</td>
                
                <td><button type="submit" id="delComment" class="btn btn-danger btn-sm" >Eliminar</button></td>
            </tr>   

        </table>
    </div>
{/literal}