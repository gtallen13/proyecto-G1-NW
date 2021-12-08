</head>
<link rel="stylesheet" href="/{{BASE_DIR}}/public/css/style_lbr.css" />
<body>
    <h1>Your Library</h1>
    <div class="container">
    <div class="empty-library" style="display:{{show}};">
        <h1>Missing some books huh? Let's go get some!</h1>
        <a href="index.php?page=productos_productos"><i class="fas fa-shopping-bag"></i></a>
    </div>

    {{foreach Libros}}
        <div class="card">
            <img src="{{tempImg}}"/>            
            <h4>{{NOMBRELIBRO}}</h4>
            <p>{{DESCLIBRO}}</p>
            <a href="#" class="button">Descargar</a>
        </div>
    {{endfor Libros}}
    </div>  
</body>
</html>