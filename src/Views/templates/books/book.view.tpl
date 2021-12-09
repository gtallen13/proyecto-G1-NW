
<head>
  <link rel="stylesheet" href="/{{BASE_DIR}}/public/css/wwForm.css"/>
</head>
<h1>{{mode_dsc}}</h1>
<section class="ww-form-wrapper">
  <form action="index.php?page=books_book&mode={{mode}}&idlibro={{idlibro}}"
    method="POST" class="ww-form">
    <section class="row">
    <label for="idlibro">ID</label>
    <input type="hidden" id="idlibro" name="idlibro" value="{{idlibro}}"/>
    <input type="hidden" id="mode" name="mode" value="{{mode}}" />
    <input type="hidden" id="xsrftoken" name="xsrftoken" value="{{xsrftoken}}" />
    <input type="text" readonly name="idlibrodummy" value="{{idlibro}}"/>
    </section>
    <section class="row">
      <label for="nomlibro">Nombre</label>
      <input type="text" {{readonly}} name="nomlibro" value="{{nomlibro}}" maxlength="45" placeholder="Nombre del Libro"/>
    </section>
    <section class="row">
      <label for="dsclibro">Descripcion</label>
      <input type="textarea" {{readonly}} name="dsclibro" value="{{dsclibro}}" placeholder="Descripcion del Libro"/>
    </section>
    <section class="row">
      <label for="preciolibro">Precio</label>
      <input type="number" {{readonly}} name="preciolibro" value="{{preciolibro}}" maxlength="45" placeholder="Descripcion del Libro"/>
    </section>
    <section style="display:{{show}};" class="row">
      <label for="imglibro">Imagen</label>
      <input type="file" accept=".png" {{readonly}} name="imglibro" value="{{imglibro}}"/>
    </section>
    <section style="display:{{show}};" class="row">
      <label for="pdflibro">Documento (PDF)</label>
      <input type="file" accept=".pdf" {{readonly}} name="pdflibro" value="{{pdflibro}}"/>
    </section>
    <section class="row">    
      <label for="fchpublicacion">Fecha de Publicacion</label>
      <input type="date" {{readonly}} name="fchpublicacion" value="{{fchpublicacion}}" maxlength="45"/>
    </section>
    <section class="row">
      <label for="autor">Autor</label>
      <input type="text" {{readonly}} name="autor" value="{{autor}}" maxlength="45" placeholder="Nombre del Autor"/>
    </section>
    <section class="row">
      <label for="categoria">Categoria</label>
      {{if readonly}}
       <input type="hidden" id="categoriadummy" name="categoria" value="" />
      {{endif readonly}}
      <select id="categoria" name="categoria" {{if readonly}}disabled{{endif readonly}}>
          <option value="N/A">N/A</option>
          <option value="ACCION" {{categoria_ACCION}}>Accion</option>
          <option value="AVENTURA" {{categoria_AVENTURA}}>Aventura</option>
          <option value="COMEDIA" {{categoria_COMEDIA}}>Comedia</option>
          <option value="NOVELA" {{categoria_NOVELA}}>Novela</option>
          <option value="FANTASIA" {{categoria_FANTASIA}}>Fantasia</option>
          <option value="HORROR" {{categoria_HORROR}}>Horror</option>
          <option value="ROMANCE" {{categoria_ROMANCE}}>Romance</option>
          <option value="SUSPENSO" {{categoria_SUSPENSO}}>Suspenso</option>
          <option value="HISTORIA" {{categoria_HISTORIA}}>Historia</option>
          <option value="CONTEMPORANEO" {{categoria_CONTEMPORANEO}}>Contemporaneo</option>
      </select>
    </section>
    {{if hasErrors}}
        <section>
          <ul>
            {{foreach Errors}}
                <li>{{this}}</li>
            {{endfor Errors}}
          </ul>
        </section>
    {{endif hasErrors}}
    <section>
      {{if showaction}}
      <button type="submit" name="btnGuardar" value="G">Guardar</button>
      {{endif showaction}}
      <button type="button" id="btnCancelar">Cancelar</button>
    </section>
  </form>
</section>
<script>
  document.addEventListener("DOMContentLoaded", function(){
      document.getElementById("btnCancelar").addEventListener("click", function(e){
        e.preventDefault();
        e.stopPropagation();
        window.location.assign("index.php?page=books_books");
      });
  });
</script>
