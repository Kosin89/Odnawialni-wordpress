<!DOCTYPE html>
<html lang="pl">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="keywords"
      content="Odnawialne źródła energii, Inwestycje, Farmy fotowoltaiczne, Farmy wiatrowe, Energia wodna">
   <meta name="description" content="Odnawialne źródła energii - Pewny zysk 10% rocznie.">
   <link rel="icon" type="icon" href="./wp-content/themes/odnawialni/assets/images/logo10.webp">

   <?php wp_head(); ?>
</head>

<body>


   <div class="logo">
      <a href="index.php" aria-label="Powrót do strony głównej.">
       <!-- dodawanie logo - w panelu w WP -->
        <?php if (function_exists("the_custom_logo")) {
        	the_custom_logo();
        } ?>
      </a>
   </div>

   <button class="burger-btn" aria-label="zamknij nawigację">
      <div class="burger-btn__box">
         <div class="burger-btn__bars"></div>
      </div>
   </button>
   

   <nav class="nav">
      <!-- dodawanie menu ale nie moge tego rozkminić jak to zrobić poprawnie na ta chwile zostawiłem menu statyczne -->
      <!-- <?php wp_nav_menu([
      	"menu" => "primary",
      	"container" => "",
      	"theme_location" => "primary",
      	"items_wrap" => '<ul class="nav__item">%3$s</ul>',
      ]); ?> -->
      <div class="nav__items">
         <ul>
            <li><a href="#about" class="nav__item">O firmie</a></li>
            <li><a href="#offers" class="nav__item">Oferta</a>
               <ul class="nav__drop">
                  <li><a class="nav__item nav__drop-item" data-popup-number="1" href="#offers">Słoneczna</a></li>
                  <li><a class="nav__item nav__drop-item" data-popup-number="2" href="#offers">Wodna</a></li>
                  <li><a class="nav__item nav__drop-item" data-popup-number="3" href="#offers">Wiatrowa</a> </li>
               </ul>
            </li>
            <li><a href="#news" class="nav__item">Aktualności</a></li>
            <li><a href="#gallery" class="nav__item">Galeria</a></li>
            <li><a href="#faq" class="nav__item">FAQ</a></li>
            <li><a href="#contact" class="nav__item">Kontakt</a></li>
         </ul>
      </div>
   </nav>

   <div class="scroll-bar"></div>
   <div class="scroll-to-top btn"><i class="fa-solid fa-arrow-up"></i></div>

   <?php
   // Pobiera zawartosc ze strony z id 204 - mozna zoabczyc id strony w pasku url
   $page_id = 204;
   $page = get_post($page_id);

   // Pobiera zawartość H1, paragrafu i URL obrazka
   $content = $page->post_content;

   // Wyciągnij H1, paragraf i URL obrazka z zawartości
   if (
   	preg_match("/<h1.*?>(.*?)<\/h1>/s", $content, $matches_h1) &&
   	preg_match("/<p.*?>(.*?)<\/p>/s", $content, $matches_p) &&
   	preg_match('/<img.*?src=["\'](.*?)["\'].*?>/s', $content, $matches_img)
   ) {
   	$heading = $matches_h1[1];
   	$paragraph = $matches_p[1];
   	$image_url = $matches_img[1];
   } else {
   	echo '<div class="error-message">Proszę upewnić się, że treści strony umieszczone są poprawnie, główny napis powinien być w tagu H1 a napis niżej w tagu p</div>';
   }
   ?>

<header class="header section" id="home">
   <?php if (isset($image_url)): ?>
      <img class="header__bg-img" src="<?php echo $image_url; ?>" alt="">
   <?php endif; ?>
   <div class="shadow"></div>
    <div class="header-animation">
        <?php if (isset($heading)): ?>
            <h1 class="header__heading"><?php echo $heading; ?></h1>
        <?php endif; ?>
        <?php if (isset($paragraph)): ?>
            <p class="header__text"><?php echo $paragraph; ?></p>
        <?php endif; ?>
        <a href="#offers" class="header__btn btn-special-animation">Poznaj ofertę</a>
    </div>
    <div class="white-block white-block-left"></div>
</header>






