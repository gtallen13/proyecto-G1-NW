<head>
    <link rel="stylesheet" href="/{{BASE_DIR}}/public/css/style_p.css" />
</head>
  <body>
    <div class="hero-image">
      <div class="hero-text">
        <h1 class="hero-title">Behold! The soil of literature</h1>
      </div>
    </div>
    <h2 class="title-books">Featured Categories</h2>
    <p class="p-books">
      Enjoy our wide catalog of books that you can enjoy at your leisure. Let your imagination reach new limits as you dive into the valleys of literature.
    </p>
    <div class="flex-container">
      <div class="flex-item">
        <img src="public/imgs/products/action.jpg" alt="" class="img-category"/>
        <p class="p-img">Accion</p>
      </div>
      <div class="flex-item">
        <img src="public/imgs/products/adventure.jpg" alt="" class="img-category"/>
        <p class="p-img">Aventura</p>
      </div>
      <div class="flex-item">
        <img src="public/imgs/products/comedy.jpg" alt="" class="img-category"/>
        <p class="p-img">Comedia</p>
      </div>
    </div>
    <h2 class="title-books">Best Sellers</h2>
    <hr class="solid" />
    <section id="collection" class="section collection">
      <div class="collection__container" data-aos="fade-up" data-aos-duration="1200">
      {{foreach TopBooks}}
        <div class="collection__box">
          <div class="img__container">
            <img class="collection_01" src="{{tempImg}}" alt="">
          </div>
          <div class="book-info">
            <h1>{{NOMBRE}}</h1>
            <span>{{AUTOR}}</span>
            <p>${{PRECIO}}</p>
            <p>{{DESCRIPCION}}</p>
            <a class="btnLearn" href="index.php?page=productos_producto&book={{ID}}">Learn More</a>
          </div>
        </div>
      {{endfor TopBooks}}
      </div>
    </section>
    <section class="products">
      <h2>Our books</h2>
      <div>
        {{foreach AllBooks}}
          <div class="book-card">
            <img class="collection_01" src="{{tempImg}}" alt="">
            <div class="card-text">
              <h4>{{nomlibro}}<h4>
              <span>{{preciolibro}}</span>
              <p>Autor: {{autor}}</p>
              <p>Categoria: {{categoria}}</p>
              <a href="index.php?page=productos_producto&idlibro={{idlibro}}">See more</a>
            </div>
          </div>
        {{endfor AllBooks}}
      </div>
    </section>
  </body>
</html>