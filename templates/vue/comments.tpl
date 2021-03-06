<!--Codigo Vue encargado de la renderizadion de los comentarios via Api Rest -->
{literal}
    <div id="apiResponse">
        <table v-if="comments != []" id="comments-table" class="default">
            <!--Se crean los elementos que componen la tabla de mensajes, incluyendo los botones de control-->
            <tr>
                <th>Usuario</th>
                <th><i :class="`${sort}`"></i><a :href="`javascript:getCommentsOrd('fecha', ${id}, '${order}')`">Fecha</a></th>
                <th>Comentario</th>
                <th><i :class="`${sortNumeric}`"></i><a :href="`javascript:getCommentsOrd('score', ${id}, '${order}')`">Puntuacion</a></th>
                <th colspan="2" v-if="rol == '1'">Acciones</th>
            </tr>
            <!--Este for itera el arreglo donde estan almacenados los comentarios y demas datos para imprimirlo por pantalla-->
            <tr v-for="comment in comments">
                <td>{{comment.nombre}}</td>
                <td>{{comment.fecha}}</td>
                <td>{{comment.comment}}</td>
                <td>{{comment.score}}</td>
                <td hidden="hidden" id="idComment">{{comment.id_comment}}</td>
                <td v-if="rol == '1'">
                    <button class="btn btn-danger" :onclick="`deleteComment(${comment.id_comment}, ${comment.id_vehiculo})`">Eliminar</button>
                </td>
            </tr>   
        </table>
    </div>
{/literal}