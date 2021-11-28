<head>
  <link rel="stylesheet" href="/{{BASE_DIR}}/public/css/form.css"/>
</head>
<h1 class="form-title">User Management</h1>
<section class="WWFilter">

</section>
<section class="WWList">
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre Completo</th>
        <th>Estado</th>
        <th>
          <button id="btnAdd">Nuevo</button>
        </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td><a href="">Franco Escamilla</a></td>
        <td>ACT</td>
        <td>
            <a href=""
            class="btn depth-1 w48" title="Editar">
            <i class="fas fa-edit"></i></a>
            <a href=""
            class="btn depth-1 w48" title="Eliminar">
            <i class="fas fa-trash-alt"></i></a>
        </td>
      </tr>
    </tbody>
  </table>
</section>
<script>
   document.addEventListener("DOMContentLoaded", function () {
      document.getElementById("btnAdd").addEventListener("click", function (e) {
        e.preventDefault();
        e.stopPropagation();
        {* window.location.assign("index.php?page=mnt_categoria&mode=INS&catid=0"); *}
      });
    });
</script>
