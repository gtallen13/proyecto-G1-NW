<section class="fullCenter">
  <form class="grid" method="post" action="index.php?page=sec_login{{if redirto}}&redirto={{redirto}}{{endif redirto}}">
    <section class="depth-1 row col-12 col-m-8 offset-m-2 col-xl-6 offset-xl-3">
      <h1 class="col-12" style="text-align: center;">Bienvenido [Usuario]</h1>
    </section>
    <section class="depth-1 py-5 row col-12 col-m-8 offset-m-2 col-xl-6 offset-xl-3">
      <div class="row">
        <div class="col-12 col-m-6" style="text-align: center;">
          <label for="txtEmail">Usuarios</label>
        </div>
        <div class="col-12 col-m-6" style="text-align: center;">
          <label for="txtEmail">Libros</label>
        </div>
        
        
      </div>
      <div class="row">
        <div class="col-12 col-m-6" style="text-align: center;"> 
          <input type="image" src="https://img.icons8.com/material/480/name--v1.png" height="100" width="100" style="border: 0;" />
        </div>
        
        <div class="col-12 col-m-6" style="text-align: center;">
          <input type="image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6YMpxLCfHEegd5kw0UNVcDN_3wy9UqeMMR6DbvXf8G6kYvfXFrphfOFEDO3f7qEhRMtM&usqp=CAU" height="100" width="100" style="border: 0;" />
        </div>
      </div>
    </section>
  </form>
</section>

<script>
  document.addEventListener("DOMContentLoaded", function(){
      document.getElementById("btnCancelar").addEventListener("click", function(e){
        e.preventDefault();
        e.stopPropagation();
        window.location.assign("index.php?page=menu_menuadministrador");
      });
  });
</script>
