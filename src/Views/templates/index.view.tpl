<div class="top-wrapper">
  <h1>Book Worm</h1>
  <div class="images-container">
    <img src="public/imgs/image1.jpg" class="top-images"/>
    <img src="public/imgs/image2.jpg" class="top-images"/>
    <img src="public/imgs/image3.jpg" class="top-images"/>
  </div>
  <div class="shop-wrapper">
    <a href="index.php?page=productos_productos" class="btnShop">Shop Now</a>
  </div>
</div>
<div class="products-wrapper">
  <h2>Featured Products</h2>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
          <img src="public/imgs/cover-slide.jpg" class="d-block w-100" alt="{{NOMBRE}}">
          <div class="carousel-caption d-none d-md-block">
            <h5 class="slide-text">Book Worm</h5>
            <p class="slide-text">The #1 e-book website</p>
          </div>
      </div>
    {{foreach Books}}
      <div class="carousel-item">
        <img src="{{tempImg}}" class="d-block w-100" alt="{{NOMBRE}}">
      </div>
    {{endfor Books}}
    
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>
<div class="about-wrapper">
  <h2>About our shop</h2>
  <p>Fugiat eu ad tempor minim dolore veniam est incididunt tempor eu aute. Cupidatat in labore duis elit dolor amet nostrud non qui non mollit incididunt. Tempor dolor esse veniam velit sunt nulla reprehenderit reprehenderit commodo velit exercitation enim. </p>
</div>
