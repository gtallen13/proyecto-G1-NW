
<head>
  <link rel="stylesheet" href="/{{BASE_DIR}}/public/css/form.css"/>
</head>
<h1 class="form-title">Book Management</h1>
<section class="WWFilter">

</section>
<section class="WWList">
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Portada</th>
        <th>
        {{if CanInsert}}
          <a id="btnAdd" href="index.php?page=books_book&mode=INS&idlibro=0">Nuevo</a>
        {{endif CanInsert}}
        </th>
      </tr>
    </thead>
    <tbody>
    {{foreach items}}
      <tr>
        <td>{{idlibro}}</td>
        <td>
          {{if ~CanView}}
            <a href="index.php?page=books_book&mode=DSP&idlibro={{idlibro}}">{{nomlibro}}</a>
          {{endif ~CanView}}

          {{ifnot ~CanView}}
            {{nomlibro}}
          {{endifnot ~CanView}}
        </td>
        <td>{{preciolibro}}</td>
        <td>
          <img src="{{tempImg}}" height="100" width="200"/>
        </td>
        <td>
            {{if ~CanEdit}}
              <a href="index.php?page=books_book&mode=UPD&idlibro={{idlibro}}"
              class="btn depth-1 w48" title="Editar">
              <i class="fas fa-edit"></i></a>
            {{endif ~CanEdit}}
            &nbsp;
            {{if ~CanDelete}}
              <a href="index.php?page=books_book&mode=DEL&idlibro={{idlibro}}"
              class="btn depth-1 w48" title="Eliminar">
              <i class="fas fa-trash-alt"></i></a>
            {{endif ~CanDelete}}
        </td>
      </tr>
      {{endfor items}}
    </tbody>
  </table>
</section>

