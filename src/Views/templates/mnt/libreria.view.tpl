<h1>{{mode_dsc}}</h1>
<section>
  <form action="index.php?page=mnt_libreria&mode={{mode}}&catid={{catid}}"
    method="POST" >
    <section>
    <input type="hidden" id="catid" name="catid" value="{{catid}}"/>
    <input type="hidden" id="mode" name="mode" value="{{mode}}" />
    <input type="hidden" id="xsrftoken" name="xsrftoken" value="{{xsrftoken}}" />
    <input type="text" readonly name="catiddummy" value="{{catid}}"/>
    </section>
    <section>
      <input type="text" {{readonly}} name="catnom" value="{{catnom}}" maxlength="45" placeholder="Nombre de Categoría"/>
    </section>
    <section>
      {{if readonly}}
       <input type="hidden" id="catestdummy" name="catest" value="" />
      {{endif readonly}}
      <select id="catest" name="catest" {{if readonly}}disabled{{endif readonly}}>
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
        window.location.assign("index.php?page=mnt_libreria");
      });
  });
</script>
