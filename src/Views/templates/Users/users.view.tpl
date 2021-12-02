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
        {{if CanInsert}}
          <a href="index.php?page=users_user&mode=INS&usercod=0" id=">btnAdd">Nuevo</a>
        {{endif CanInsert}}
        </th>
      </tr>
    </thead>
    <tbody>
    {{foreach Users}}
      <tr>
        <td>{{usercod}}</td>
        <td>
        {{if ~CanView}}
          <a href="index.php?page=users_user&mode=INS&usercod={{usercod}}">{{useremail}}</a>
        {{endif ~CanView}}
        </td>
        <td>{{userest}}</td>
        <td>
          {{if ~CanEdit}}
            <a href="index.php?page=users_user&mode=UPD&usercod={{usercod}}"
            class="btn depth-1 w48" title="Editar">
            <i class="fas fa-edit"></i></a>
          {{endif ~CanEdit}}
          {{if ~CanDelete}}
            <a href="index.php?page=users_user&mode=DEL&usercod={{usercod}}"
            class="btn depth-1 w48" title="Eliminar">
            <i class="fas fa-trash-alt"></i></a>
            {{endif ~CanDelete}}
        </td>
      </tr>
    </tbody>
  {{endfor Users}}
  </table>
</section>
<script>
   document.addEventListener("DOMContentLoaded", function () {
      document.getElementById("btnAdd").addEventListener("click", function (e) {
        e.preventDefault();
        e.stopPropagation();
        {* window.location.assign("index.php?page=users_user&mode=INS&catid=0"); *}
      });
    });
</script>
