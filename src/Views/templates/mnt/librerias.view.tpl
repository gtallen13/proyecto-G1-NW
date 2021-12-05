<head>
  <link rel="stylesheet" href="/{{BASE_DIR}}/public/css/Libreria.css" />
</head>
<h1>Tu Libreria</h1>
<section class="WWFilter">

</section>
<section class="WWList" class="default">
  <table>
    <thead>
        <th>
            <p>
              <input type="search" name="busquedalibros" placeholder="La Librerias">
              <input type="submit" value="Buscar">
            </p>
        </th>
    </thead>
    <table>
      <br>
      <tr>
        <th>
          <br> 
          <img src="public/imgs/hero/libros1.png" flex-direction: column;>
          <h3>Nombre Libros</h3>
          Autor de Libro
          <br>
          <button type="submit" name="btnDescargar1" value="G">Descargar</button>
        </th>
        <th>
          <br>
          <img src="public/imgs/hero/libros1.png" flex-direction: column;>
          <h3>Nombre Libros 2</h3>
          Autor del Libro
          <br>
          <button type="submit" name="btnDescargar2" value="G">Descargar</button>
        </th>
      </tr>
    </table>
    <tbody>
      {{foreach items}}
      <tr>
        <td>{{catid}}</td>
        <td><a href="index.php?page=mnt_libreria&mode=DSP&catid={{catid}}">{{catnom}}</a></td>
        <td>{{catest}}</td>
        <td>
          {{if ~edit_enabled}}
          <form action="index.php" method="get">
             <input type="hidden" name="page" value="mnt_libreria"/>
              <input type="hidden" name="mode" value="UPD" />
              <input type="hidden" name="catid" value={{catid}} />
              <button type="submit">Editar</button>
          </form>
          {{endif ~edit_enabled}}
          {{if ~delete_enabled}}
          <form action="index.php" method="get">
             <input type="hidden" name="page" value="mnt_libreria"/>
              <input type="hidden" name="mode" value="DEL" />
              <input type="hidden" name="catid" value={{catid}} />
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
        window.location.assign("index.php?page=mnt_librerias&mode=INS&catid=0");
      });
    });
</script>
