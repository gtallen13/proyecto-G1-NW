<h1>Gestión de Partituras</h1>
<section class="WWFilter">

</section>
<section class="WWList">
  <table>
    <thead>
      <tr>
        <th>Código</th>
        <th>Partitura</th>
        <th>Autor</th>
        <th>Genero</th>
        <th>Año</th>
        <th>Ventas</th>
        <th>Precio</th>
        <th>URL del Documento</th>
        <th>Estado</th>
        <th>
          {{if new_enabled}}
          <button id="btnAdd">Nuevo</button>
          {{endif new_enabled}}
        </th>
      </tr>
    </thead>
    <tbody>
      {{foreach items}}
      <tr>
        <td>{{scoreid}}</td>
        <td><a href="index.php?page=mnt_score&mode=DSP&scoreid={{scoreid}}">{{scoredsc}}</a></td>
        <td>{{scoreauthor}}</td>
        <td>{{scoregenre}}</td>
        <td>{{scoreyear}}</td>
        <td>{{scoresales}}</td>
        <td>{{scoreprice}}</td>
        <td>{{scoredocurl}}</td>
        <td>{{scoreest}}</td>
        <td>
          {{if ~edit_enabled}}
          <form action="index.php" method="get">
             <input type="hidden" name="page" value="mnt_score"/>
              <input type="hidden" name="mode" value="UPD" />
              <input type="hidden" name="scoreid" value={{scoreid}} />
              <button type="submit">Editar</button>
          </form>
          {{endif ~edit_enabled}}
          {{if ~delete_enabled}}
          <form action="index.php" method="get">
             <input type="hidden" name="page" value="mnt_score"/>
              <input type="hidden" name="mode" value="DEL" />
              <input type="hidden" name="scoreid" value={{scoreid}} />
              <button type="submit">Eliminar</button>
          </form>
          {{endif ~delete_enabled}}
        </td>
      </tr>
      {{endfor items}}
    </tbody>
  </table>
</section>
<script>
   document.addEventListener("DOMContentLoaded", function () {
      document.getElementById("btnAdd").addEventListener("click", function (e) {
        e.preventDefault();
        e.stopPropagation();
        window.location.assign("index.php?page=mnt_score&mode=INS&scoreid=0");
      });
    });
</script>
