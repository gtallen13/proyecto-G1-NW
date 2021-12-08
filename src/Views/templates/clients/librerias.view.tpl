</head>
<link rel="stylesheet" href="/{{BASE_DIR}}/public/css/style_lbr.css" />
<body>
    <h1>Tu libreria</h1>
    <div class="container">
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