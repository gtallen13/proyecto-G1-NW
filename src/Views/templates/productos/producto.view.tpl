<head>
    <link rel="stylesheet" href="../../../../public/css/producto.css">
    <title>Producto</title>
</head>
<body>
    <div class="contenedor">
        <section class="seccion1">
            <div class="principalImg">
                <img src="{{tmpimage}}" alt="" height="300" width="400">
            </div>
            <div class="secondaryImg1">
                <img src="{{tmpimage}}" alt="" height="100" width="200">
            </div>
            <div class="secondaryImg2">
                <img src="{{tmpimage}}" alt="" height="100" width="200">
            </div>
            <div class="secondaryImg3">
                <img src="{{tmpimage}}" alt="" height="100" width="200">
            </div>
        </section>
        <section class="seccion2">
            <div>
                <h1>{{nombre}}</h1><hr>
            </div>
            <div>
                <h2>{{precio}}</h2><hr>
            </div>
            <div>
                <p>
                    {{dsc}}
                </p> 
            </div><hr>
            <form method="POST" action="index.php?page=productos_libroproducto">
            {{with login}}
                <input type="hidden" value="{{userName}}" id="userName" name="userName"/>
            {{endwith login}}
                <input type="hidden" value="{{idlibro}}" id="idlibro" name="idlibro"> 
                <input type="hidden" value="{{dsc}}" id="dsc" name="dsc"> 
                <input type="hidden" value="{{precio}}" id="precio" name="precio"> 
                <input type="hidden" value="{{nombre}}" id="nomlibro" name="nomlibro"> 
                <input type="hidden" value="{{idlibro}}" id="idlibro" name="idlibro"> 

                <button type="submit">Add to Cart</button>
                <span style="display:{{show}}">{{agregado}}</span>
            </form>
        </section>
    </div>
</body>
</html>
