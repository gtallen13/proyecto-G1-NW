<h1>{{mode_dsc}}</h1>
<section>
  <form action="index.php?page=mnt_usuario&mode={{mode}}&usercod={{usercod}}"
    method="POST" >
    <section>
    <label for="usercod">Codigo</label>
    <input type="hidden" id="usercod" name="usercod" value="{{usercod}}"/>
    <input type="hidden" id="mode" name="mode" value="{{mode}}" />
    <input type="text" readonly name="usercoddummy" value="{{usercod}}"/>
    </section>
    <section>
      <label for="useremail">Email</label>
      <input type="text" {{readonly}} name="useremail" value="{{useremail}}" maxlength="45" placeholder="Correo Electronico"/>
    </section>
      <label for="username">Nombre de Usuario</label>
      <input type="text" {{readonly}} name="username" value="{{username}}" maxlength="45" placeholder="Nombre de Usuario"/>
    <section>
    </section>
      <label for="userpswd">Contraseña</label>
      <input type="text" {{readonly}} name="userpswd" value="{{userpswd}}" maxlength="45" placeholder="Contraseña"/>
    <section>
    </section>
    <section>
      <label for="userest">Estado</label>
      {{if readonly}}
       <input type="hidden" id="userestdummy" name="userest" value="" />
      {{endif readonly}}
      <select id="userest" name="userest" {{if readonly}}disabled{{endif readonly}}>
        <option value="ACT" {{userest_ACT}}>Activo</option>
        <option value="INA" {{userest_INA}}>Inactivo</option>
        <option value="BLQ" {{userest_BLQ}}>Bloqueado</option>
        <option value="SUS" {{userest_SUS}}>Suspendido</option>
      </select>
    </section>
    <section>
      <label for="usertipo">Tipo</label>
      {{if readonly}}
       <input type="hidden" id="usertipodummy" name="usertipo" value="" />
      {{endif readonly}}
      <select id="usertipo" name="usertipo" {{if readonly}}disabled{{endif readonly}}>
        <option value="PBL" {{usertipo_PBL}}>Publico</option>
        <option value="ADM" {{usertipo_ADM}}>Administrador</option>
        <option value="AUD" {{usertipo_AUD}}>Auditor</option>
      </select>
    </section>
    <section>
      <label for="userpswdest">Estado de Contraseña</label>
      {{if readonly}}
       <input type="hidden" id="userpswdestdummy" name="userpswdest" value="" />
      {{endif readonly}}
      <select id="userpswdest" name="userpswdest" {{if readonly}}disabled{{endif readonly}}>
        <option value="ACT" {{userpswdest_ACT}}>Activo</option>
        <option value="INA" {{userpswdest_INA}}>Inactivo</option>
        <option value="BLQ" {{userpswdest_BLQ}}>Bloqueado</option>
        <option value="SUS" {{userpswdest_SUS}}>Suspendido</option>
      </select>
    </section>
    {{if hasErrors}}
        <section>
          <ul>
            {{foreach aErrors}}
                <li>{{this}}</li>
            {{endfor aErrors}}
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
        window.location.assign("index.php?page=mnt_usuarios");
      });
  });
</script>
