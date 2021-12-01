<style>
img {
  max-height: 100%;
}

.slider-container {
  height: 100%;
  width: 100%;
  position: relative;
  overflow: hidden;
  text-align: center;
}

.menu {
  position: absolute;
  left: 0;
  z-index: 900;
  width: 100%;
  bottom: 0;
}

.menu label {
  cursor: pointer;
  display: inline-block;
  width: 16px;
  height: 16px;
  background: #fff;
  border-radius: 50px;
  margin: 0 0.2em 1em;
}
.menu label:hover {
  background: red;
}

.slide {
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 100%;
  z-index: 10;
  padding: 8em 1em 0;
  background-size: cover;
  background-position: 50% 50%;
  transition: left 0s 0.75s;
}

[id^=slide]:checked + .slide {
  left: 0;
  z-index: 100;
  transition: left 0.65s ease-out;
}

.slide-1 {
  background-image: url("https://cdn.cienradios.com/wp-content/uploads/sites/14/2017/05/Leer-potencia-el-cerebroweb.jpg");
}

.slide-2 {
  background-image: url("https://storage.ning.com/topology/rest/1.0/file/get/1444718642?profile=original");
}

.slide-3 {
  background-image: url("https://gestion.pe/resizer/GrZhZuqH9-BaskyOmvUvcG3bT3I=/580x330/smart/filters:format(jpeg):quality(75)/arc-anglerfish-arc2-prod-elcomercio.s3.amazonaws.com/public/MTQM2O2GBRA6VEZOXO4B3JT5LA.jpg");
}
</style>
<style>
  @import url("https://fonts.googleapis.com/css?family=Cardo:400i|Rubik:400,700&display=swap");
:root {
  --d: 700ms;
  --e: cubic-bezier(0.19, 1, 0.22, 1);
  --font-sans: "Rubik", sans-serif;
  --font-serif: "Cardo", serif;
}

.page-content {
  display: grid;
  grid-gap: 1rem;
  padding: 1rem;
  max-width: 1024px;
  margin: 0 auto;
  font-family: var(--font-sans);
}
@media (min-width: 600px) {
  .page-content {
    grid-template-columns: repeat(2, 1fr);
  }
}
@media (min-width: 800px) {
  .page-content {
    grid-template-columns: repeat(3, 1fr);
  }
}

.card {
  position: relative;
  display: flex;
  align-items: flex-end;
  overflow: hidden;
  padding: 1rem;
  width: 100%;
  text-align: center;
  color: whitesmoke;
  background-color: whitesmoke;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1), 0 2px 2px rgba(0, 0, 0, 0.1), 0 4px 4px rgba(0, 0, 0, 0.1), 0 8px 8px rgba(0, 0, 0, 0.1), 0 16px 16px rgba(0, 0, 0, 0.1);
}
@media (min-width: 600px) {
  .card {
    height: 350px;
  }
}
.card:before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 110%;
  background-size: cover;
  background-position: 0 0;
  transition: transform calc(var(--d) * 1.5) var(--e);
  pointer-events: none;
}
.card:after {
  content: "";
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 200%;
  pointer-events: none;
  background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.009) 11.7%, rgba(0, 0, 0, 0.034) 22.1%, rgba(0, 0, 0, 0.072) 31.2%, rgba(0, 0, 0, 0.123) 39.4%, rgba(0, 0, 0, 0.182) 46.6%, rgba(0, 0, 0, 0.249) 53.1%, rgba(0, 0, 0, 0.32) 58.9%, rgba(0, 0, 0, 0.394) 64.3%, rgba(0, 0, 0, 0.468) 69.3%, rgba(0, 0, 0, 0.54) 74.1%, rgba(0, 0, 0, 0.607) 78.8%, rgba(0, 0, 0, 0.668) 83.6%, rgba(0, 0, 0, 0.721) 88.7%, rgba(0, 0, 0, 0.762) 94.1%, rgba(0, 0, 0, 0.79) 100%);
  transform: translateY(-50%);
  transition: transform calc(var(--d) * 2) var(--e);
}
.card:nth-child(1):before {
  background-image: url(https://cdn.zendalibros.com/wp-content/uploads/odisea-homero.jpg);
}
.card:nth-child(2):before {
  background-image: url(https://cdn.zendalibros.com/wp-content/uploads/alicia-en-el-pais-de-las-maravillas.jpg);
}
.card:nth-child(3):before {
  background-image: url(https://cdn.zendalibros.com/wp-content/uploads/lolita-nabokov.jpg);
}

.content {
  position: relative;
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 100%;
  padding: 1rem;
  transition: transform var(--d) var(--e);
  z-index: 1;
}
.content > * + * {
  margin-top: 1rem;
}

.title {
  font-size: 1.3rem;
  font-weight: bold;
  line-height: 1.2;
}

.copy {
  font-family: var(--font-serif);
  font-size: 1.125rem;
  font-style: italic;
  line-height: 1.35;
}

.btn {
  cursor: pointer;
  margin-top: 1.5rem;
  padding: 0.75rem 1.5rem;
  font-size: 0.65rem;
  font-weight: bold;
  letter-spacing: 0.025rem;
  text-transform: uppercase;
  color: white;
  background-color: black;
  border: none;
}
.btn:hover {
  background-color: #0d0d0d;
}
.btn:focus {
  outline: 1px dashed yellow;
  outline-offset: 3px;
}

@media (hover: hover) and (min-width: 600px) {
  .card:after {
    transform: translateY(0);
  }

  .content {
    transform: translateY(calc(100% - 4.5rem));
  }
  .content > *:not(.title) {
    opacity: 0;
    transform: translateY(1rem);
    transition: transform var(--d) var(--e), opacity var(--d) var(--e);
  }

  .card:hover,
.card:focus-within {
    align-items: center;
  }
  .card:hover:before,
.card:focus-within:before {
    transform: translateY(-4%);
  }
  .card:hover:after,
.card:focus-within:after {
    transform: translateY(-50%);
  }
  .card:hover .content,
.card:focus-within .content {
    transform: translateY(0);
  }
  .card:hover .content > *:not(.title),
.card:focus-within .content > *:not(.title) {
    opacity: 1;
    transform: translateY(0);
    transition-delay: calc(var(--d) / 8);
  }

  .card:focus-within:before, .card:focus-within:after,
.card:focus-within .content,
.card:focus-within .content > *:not(.title) {
    transition-duration: 0s;
  }
}
</style>

<script>
  
</script>

<section class="fullCenter">
  <form class="grid" method="post" action="">
    <section class="depth-1 row col-12 col-m-8 offset-m-2 col-xl-6 offset-xl-3" style="height: 500px;margin-top: 60px;">
      <div class="slider-container">
        <div class="menu">
          <label for="slide-dot-1"></label>
          <label for="slide-dot-2"></label>
          <label for="slide-dot-3"></label>
        </div>
        
        <input id="slide-dot-1" type="radio" name="slides" checked>
          <div class="slide slide-1"></div>
        
        <input id="slide-dot-2" type="radio" name="slides">
          <div class="slide slide-2"></div>
        
        <input id="slide-dot-3" type="radio" name="slides">
          <div class="slide slide-3"></div>
      </div>
    </section>
    <section class="depth-1 row col-12 col-m-8 offset-m-2 col-xl-6 offset-xl-3" style="height: 500px;padding-bottom: 60px;">
      <h1 class="col-12" style="text-align: center;">Productos</h1>
      <main class="page-content">
        <div class="card">
          <div class="content">
            <h2 class="title">Odisea, de Homero</h2>
            <p class="copy">Mientras los maderos están sujetos por las clavijas, seguiré aquí y sufriré los males que haya de padecer, y luego que las olas deshagan la balsa me pondré a nadar, pues no se me ocurre nada más provechoso.</p>
            <button class="btn">Comprar</button>
          </div>
        </div>
        <div class="card">
          <div class="content">
            <h2 class="title">Alicia en el país de las maravillas</h2>
            <p class="copy">Alicia estaba ya tan acostumbrada a que todo cuanto le sucediera fuera algo extraordinario que le pareció de lo más soso y estúpido que la vida siguiera por el camino normal</p>
            <button class="btn">Comprar</button>
          </div>
        </div>
        <div class="card">
          <div class="content">
            <h2 class="title">Lolita</h2>
            <p class="copy">Estoy suficientemente orgulloso de conocer algo para ser humilde por ignorarlo todo</p>
            <button class="btn">Comprar</button>
          </div>
        </div>
      </main>
    </section>
  </form>
</section>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



<style type="text/css">
  body {
    font-family: "Open Sans", sans-serif;
  }
  h2 {
    color: #000;
    font-size: 26px;
    font-weight: 300;
    text-align: center;
    text-transform: uppercase;
    position: relative;
    margin: 30px 0 80px;
  }
  h2 b {
    color: #ffc000;
  }
  h2::after {
    content: "";
    width: 100px;
    position: absolute;
    margin: 0 auto;
    height: 4px;
    background: rgba(0, 0, 0, 0.2);
    left: 0;
    right: 0;
    bottom: -20px;
  }
  .carousel {
    margin: 50px auto;
    padding: 0 70px;
  }
  .carousel .item {
    min-height: 330px;
      text-align: center;
    overflow: hidden;
  }
  .carousel .item .img-box {
    height: 160px;
    width: 100%;
    position: relative;
  }
  .carousel .item img {	
    max-width: 100%;
    max-height: 100%;
    display: inline-block;
    position: absolute;
    bottom: 0;
    margin: 0 auto;
    left: 0;
    right: 0;
  }
  .carousel .item h4 {
    font-size: 18px;
    margin: 10px 0;
  }
  .carousel .item .btn {
    color: #333;
      border-radius: 0;
      font-size: 11px;
      text-transform: uppercase;
      font-weight: bold;
      background: none;
      border: 1px solid #ccc;
      padding: 5px 10px;
      margin-top: 5px;
      line-height: 16px;
  }
  .carousel .item .btn:hover, .carousel .item .btn:focus {
    color: #fff;
    background: #000;
    border-color: #000;
    box-shadow: none;
  }
  .carousel .item .btn i {
    font-size: 14px;
      font-weight: bold;
      margin-left: 5px;
  }
  .carousel .thumb-wrapper {
    text-align: center;
  }
  .carousel .thumb-content {
    padding: 15px;
  }
  .carousel .carousel-control {
    height: 100px;
      width: 40px;
      background: none;
      margin: auto 0;
      background: rgba(0, 0, 0, 0.2);
  }
  .carousel .carousel-control i {
      font-size: 30px;
      position: absolute;
      top: 50%;
      display: inline-block;
      margin: -16px 0 0 0;
      z-index: 5;
      left: 0;
      right: 0;
      color: rgba(0, 0, 0, 0.8);
      text-shadow: none;
      font-weight: bold;
  }
  .carousel .item-price {
    font-size: 13px;
    padding: 2px 0;
  }
  .carousel .item-price strike {
    color: #999;
    margin-right: 5px;
  }
  .carousel .item-price span {
    color: #86bd57;
    font-size: 110%;
  }
  .carousel .carousel-control.left i {
    margin-left: -3px;
  }
  .carousel .carousel-control.left i {
    margin-right: -3px;
  }
  .carousel .carousel-indicators {
    bottom: -50px;
  }
  .carousel-indicators li, .carousel-indicators li.active {
    width: 10px;
    height: 10px;
    margin: 4px;
    border-radius: 50%;
    border-color: transparent;
  }
  .carousel-indicators li {	
    background: rgba(0, 0, 0, 0.2);
  }
  .carousel-indicators li.active {	
    background: rgba(0, 0, 0, 0.6);
  }
  .star-rating li {
    padding: 0;
  }
  .star-rating i {
    font-size: 14px;
    color: #ffc000;
  }
  </style>
