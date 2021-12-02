<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{SITE_TITLE}}</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/{{BASE_DIR}}/public/css/appstyle.css" />

  <script src="https://kit.fontawesome.com/{{FONT_AWESOME_KIT}}.js" crossorigin="anonymous"></script>
  {{foreach SiteLinks}}
    <link rel="stylesheet" href="/{{~BASE_DIR}}/{{this}}" />
  {{endfor SiteLinks}}
  {{foreach BeginScripts}}
    <script src="/{{~BASE_DIR}}/{{this}}"></script>
  {{endfor BeginScripts}}
</head>
<body>
  <header>
    <input type="checkbox" class="menu_toggle" id="menu_toggle" />
    <label for="menu_toggle" class="menu_toggle_icon" >
      <div class="hmb dgn pt-1"></div>
      <div class="hmb hrz"></div>
      <div class="hmb dgn pt-2"></div>
    </label>
    <h1>{{SITE_TITLE}}</h1>
    <nav id="menu">
      <ul>
        <li><a href="#"> <i class="fas fa-home"></i>&nbsp;Home</a></li>
        <li><a href="index.php?page=index"><i class="fas fa-shopping-bag"></i>&nbsp;Shop</a></li>
        <li><a href="index.php?page=sec_login"><i class="fas fa-sign-in-alt"></i>&nbsp;Sign In</a></li>
        <li><a href="index.php?page=sec_register"><i class="fas fa-user-plus"></i>&nbsp;Register</a></li>
      </ul>
      <br>
      <button class="btn btn-danger navbar-btn"> <i class="fas fa-cart-arrow-down"></i> Your Cart </button>
      <br>
    </nav>
  </header>
  <main>
  {{{page_content}}}
  </main>  
  <footer>
    <div  display: flex; align="center"><img src="public/imgs/hero/libros.png" flex-direction: column;></div>
    <div>Proyecto de Libros Honduras La Ceiba/Atlantida &copy;</div>
  </footer>
  {{foreach EndScripts}}
    <script src="/{{~BASE_DIR}}/{{this}}"></script>
  {{endfor EndScripts}}
</body>
</html>
