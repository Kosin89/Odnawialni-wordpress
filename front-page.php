
<?php get_header(); ?>

   <main class="main">

   <!-- wyswietlanie stron ktore stworzymy do strony ale na ta chwile nie jest to potrzebne -->
      <?php if (have_posts()) {
      	while (have_posts()) {
      		the_post();
      		the_content();
      	}
      } ?>

      <section id="about" class="about section-padding section white-section">
         <img class="about__icon about__icon--one" src="./wp-content/themes/odnawialni/assets/images/svg/triangle.svg" alt="">
         <img class="about__icon about__icon--two" src="./wp-content/themes/odnawialni/assets/images/svg/square.svg" alt="">
         <img class="about__icon about__icon--three" src="./wp-content/themes/odnawialni/assets/images/svg/triangle.svg" alt="">
         <div class="wrapper">
            <h2 class="section-heading">O Firmie</h2>


            <div class="about__boxes">

                           <?php
                           // ustala argumenty dla zapytania, w tym przypadku (order = asc jest to wyswietlanie postow od najstarszych - powinno byc od najnowszych ale tak mi pasowalo obrazkowo - mozna zmienic ;D )
                           $args = [
                           	"category_name" => "about",
                           	"posts_per_page" => 3,
                           	"order" => "ASC",
                           ];

                           // Pętla przez posty
                           $query = new WP_Query($args);
                           if ($query->have_posts()):
                           	while ($query->have_posts()):

                           		$query->the_post();

                           		// Pobierz URL obrazka wyróżniającego oraz tekst alternatywny
                           		$thumbnail_id = get_post_thumbnail_id();
                           		$thumbnail_url = wp_get_attachment_url($thumbnail_id);
                           		$alt_text = get_post_meta($thumbnail_id, "_wp_attachment_image_alt", true);
                           		?>
                           
                              <div class="about__box box">
                                    <div class="about__box-img">
                                       <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($alt_text); ?>" class="about__img">
                                    </div>
                                    <div class="about__box-text">
                                       <h3 class="about__title"><?php the_title(); ?></h3>
                                       <p class="about__text"><?php echo strip_tags(get_the_content()); ?></p>
                                    </div>
                              </div>

                           <?php
                           	endwhile;
                           endif;
                           wp_reset_postdata();
                           ?>
                           
                     </div>
              
         </div>
      </section>


      <section class="hero-img section">
         <div class="white-block white-block-left"></div>
         <div class="white-block white-block-right"></div>
         <div class="text-animation">
            <h3 class="hero-img__title">Zaufało nam ponad 100000 osób!</h3>
            <hr>
            <p class="hero-img__text">Dziennie razem produkujemy 1000MWh energii!</p>
            <hr>
         </div>
      </section>


      <section class="offers section-padding section white-section" id="offers">
         <img class="offers__icon offers__icon--one" src="./wp-content/themes/odnawialni/assets/images/svg/square.svg" alt="">
         <img class="offers__icon offers__icon--two" src="./wp-content/themes/odnawialni/assets/images/svg/triangle.svg" alt="">
         <img class="offers__icon offers__icon--three" src="./wp-content/themes/odnawialni/assets/images/svg/triangle.svg" alt="">
         <div class="wrapper">
            <h2 class="section-heading">Oferta</h2>
            <div class="offers__cards">
               <div class="offers__card card" onclick="void(0)">
                  <div class="offers__card-img offers__card-img--first">
                     <h3 class="offers__card-img-title">Słoneczna</h3>
                     <p class="offers__card-img-info"> <i class="fas fa-angle-double-right"></i> Więcej
                        informacji</p>
                  </div>
                  <div class="offers__card-info">
                     <h3 class="offers__card-info-title">Słoneczna</h3>
                     <ul class="offers__card-info-list">
                        <li class="offers__card-info-list-item">Farmy fotowoltaiczne</li>
                        <li class="offers__card-info-list-item">Kolektory słoneczne</li>
                        <li class="offers__card-info-list-item">Elektrownie słoneczne CPS</li>
                        <li class="offers__card-info-list-item">Słoneczne systemy chłodzenia</li>
                        <li class="offers__card-info-list-item">Fotowoltaiczne dachówki i elewacje</li>
                     </ul>
                     <button class="offers__card-info-btn btn-special-animation btn-offer-popup btn-offer-popup-1"
                        data-popup-number="1">Wybierz</button>
                  </div>
               </div>
               <div class="offers__card card" onclick="void(0)">
                  <div class="offers__card-img offers__card-img--second">
                     <h3 class="offers__card-img-title">Wodna</h3>
                     <p class="offers__card-img-info"> <i class="fas fa-angle-double-right"></i> Więcej
                        informacji</p>
                  </div>
                  <div class="offers__card-info">
                     <h3 class="offers__card-info-title">Wodna</h3>
                     <ul class="offers__card-info-list">
                        <li class="offers__card-info-list-item">Elektorwnie wodne</li>
                        <li class="offers__card-info-list-item">Elektrownie pływowe</li>
                        <li class="offers__card-info-list-item">Elektorwnie falowe</li>
                        <li class="offers__card-info-list-item">Małe elektorwnie wodne</li>
                        <li class="offers__card-info-list-item">Hydrokinetyczne systemy energetyczne</li>
                     </ul>
                     <button class="offers__card-info-btn btn-special-animation btn-offer-popup btn-offer-popup-2"
                        data-popup-number="2">Wybierz</button>
                  </div>
               </div>
               <div class="offers__card card" onclick="void(0)">
                  <div class="offers__card-img offers__card-img--third">
                     <h3 class="offers__card-img-title">Wiatrowa</h3>
                     <p class="offers__card-img-info"> <i class="fas fa-angle-double-right"></i> Więcej
                        informacji</p>
                  </div>
                  <div class="offers__card-info">
                     <h3 class="offers__card-info-title">Wiatrowa</h3>
                     <ul class="offers__card-info-list">
                        <li class="offers__card-info-list-item">Lądowe elektrownie wiatrowe</li>
                        <li class="offers__card-info-list-item">Morskie elektrownie wiatrowe</li>
                        <li class="offers__card-info-list-item">Górskie elektrownie wiatrowe</li>
                        <li class="offers__card-info-list-item">Mikro turbiny wiatrowe</li>
                        <li class="offers__card-info-list-item">Turbiny wiatrowe pionowej osi</li>
                     </ul>
                     <button class="offers__card-info-btn btn-special-animation btn-offer-popup btn-offer-popup-3"
                        data-popup-number="3">Wybierz</button>
                  </div>
               </div>
            </div>
         </div>

         <div id="offerPopup1" class="offer-popup">
            <div class="offer-popup-content">
               <div class="oferta">
                  <div class="close-offer" onclick="closeOfferPopup(1)"><i class="fa-solid fa-xmark"></i></div>

                  <h4>Zrób Krok w Stronę Słonecznej Przyszłości: Inwestuj w Farmy Fotowoltaiczne!</h4>

                  <p>Energia słoneczna to skarbnica czystej, odnawialnej energii. W erze, gdy zrównoważony rozwój i
                     ochrona środowiska są na wagę złota, farmy fotowoltaiczne stają się istotnym elementem przyszłości
                     energetyki.</p>

                  <p>🔹 <strong>Dlaczego warto zainwestować w farmy fotowoltaiczne?</strong> 🔹</p>

                  <ul>
                     <li><strong>🌞 Czysta i Niewyczerpywalna Energia</strong> – Energia słoneczna jest dostępna dla
                        każdego, nie zanieczyszcza środowiska i nie powoduje
                        emisji gazów cieplarnianych.
                     </li>
                     <li><strong>💰 Oszczędność i Dochód</strong> – Zredukuj rachunki za energię i zarabiaj, sprzedając
                        nadwyżkę energii z powrotem do sieci.</li>
                     <li><strong>🔧 Niskie Koszty Eksploatacji</strong> – Systemy fotowoltaiczne wymagają minimalnej
                        konserwacji i mają długą żywotność.</li>
                  </ul>
               </div>
            </div>
         </div>


         <div id="offerPopup2" class="offer-popup">
            <div class="offer-popup-content">
               <div class="close-offer" onclick="closeOfferPopup(2)"><i class="fa-solid fa-xmark"></i></div>
               <div class="oferta">
                  <h4>Ujarzmij Siłę Wody: Zainwestuj w Odnawialne Źródła Energii z Wody!</h4>

                  <p>Woda jest jednym z najpotężniejszych elementów naszej planety. Wykorzystanie jej siły do produkcji
                     energii jest jednym z najbardziej efektywnych i ekologicznych rozwiązań energetycznych.</p>

                  <p>🔹 <strong>Dlaczego warto zainwestować w odnawialne źródła energii z wody?</strong> 🔹</p>

                  <ul>
                     <li><strong>🌊 Nieograniczony Potencjał</strong> – Rzeki, morza i oceany są niekończącym się
                        źródłem energii, dostępnym 365 dni w roku.</li>
                     <li><strong>🌿 Ekologiczny Wybór</strong> – Produkcja energii z wody nie powoduje emisji
                        zanieczyszczeń ani gazów cieplarnianych, przyczyniając się do ochrony środowiska.</li>
                     <li><strong>💰 Stabilność Kosztów</strong> – Energia wodna oferuje przewidywalność kosztów, dzięki
                        czemu można uniknąć niestabilności cen paliw kopalnych.</li>
                  </ul>
               </div>
            </div>
         </div>


         <div id="offerPopup3" class="offer-popup">
            <div class="offer-popup-content">
               <div class="close-offer" onclick="closeOfferPopup(3)"><i class="fa-solid fa-xmark"></i></div>

               <div class="oferta">
                  <h4>Odkryj Przyszłość Energii: Farmy Wiatrowe!</h4>

                  <p>Czy wiesz, że wiatr jest jednym z najpotężniejszych i najbardziej nieocenionych źródeł energii na
                     naszej planecie? 🌍 W dobie rosnących cen energii i globalnego ocieplenia, farmy wiatrowe stają się
                     jednym z kluczowych rozwiązań w walce o czystszą i bardziej zrównoważoną przyszłość.</p>

                  <p>🔹 <strong>Dlaczego warto zainwestować w farmy wiatrowe?</strong> 🔹</p>

                  <ul>
                     <li><strong>🌿 Ekologiczne Źródło Energii</strong> – Farmy wiatrowe nie emitują zanieczyszczeń ani
                        gazów cieplarnianych, dzięki czemu przyczyniają się do ochrony środowiska.</li>
                     <li><strong>💰 Oszczędności i Dochody</strong> – Zmniejsz swoje rachunki za energię! Dodatkowo,
                        nadwyżka energii może być sprzedana z powrotem do sieci, generując dodatkowe dochody.</li>
                     <li><strong>📈 Stabilność i Przewidywalność</strong> – W przeciwieństwie do niestabilnych cen paliw
                        kopalnych, energia wiatrowa oferuje długoterminową stabilność kosztów.</li>
                  </ul>
               </div>
            </div>
         </div>
      </section>


      <section id="news" class="news section-padding section">
         
         <div class="news-padding">
            <div class="white-block white-block-right"></div>
            <div class="white-block white-block-left"></div>
            <h2 class="section-heading">Aktualności</h2>
            <div class="wrapper">
               <div class="news__boxes">

               <?php
               // Ustalamy argumenty dla zapytania
               $args = [
               	"post_type" => "post",
               	"posts_per_page" => 10,
               	"category_name" => "news",
               ];

               // Tworzymy nowe zapytanie
               $query = new WP_Query($args);

               // Pętla przez posty
               if ($query->have_posts()):
               	while ($query->have_posts()):
               		$query->the_post(); ?>

                  <div class="news__box">
                     <h3 class="news__heading"><?php the_title(); ?></h3>
                     <p class="news__text"><?php the_content(); ?></p>
                  </div>

                  <?php
               	endwhile;
               	// Resetujemy zapytanie
               	wp_reset_postdata();
               else:
               	echo "<p>Brak postów do wyświetlenia</p>";
               endif;
               ?>          
               </div>
            </div>
         </div>
      </section>


      <section id="gallery" class="gallery section-padding section white-section">
         <img class="gallery__icon gallery__icon--one" src="./wp-content/themes/odnawialni/assets/images/svg/sun.svg" alt="">
         <img class="gallery__icon gallery__icon--two" src="./wp-content/themes/odnawialni/assets/images/svg/sun.svg" alt="">
         <img class="gallery__icon gallery__icon--three" src="./wp-content/themes/odnawialni/assets/images/svg/sun.svg" alt="">
         <div class="white-block white-block-left"></div>
         <div class="white-block white-block-right"></div>
         <h2 class="section-heading">Galeria</h2>
         <div class="wrapper">
            <div class="gallery__boxes">
               <ul class="gallery__box">

               <?php
               // Numer id to numer strony na ktorej stworzyliśmy galerie, można go zoabczyć najeżdzająć myszką na strone i na dole w URL jest numer
               $gallery_page_id = 191;

               // Pobiera id załączników ze strony
               $gallery = get_post_gallery($gallery_page_id, false);
               $attachment_ids = explode(",", $gallery["ids"]);

               // Wyświetla wszystkie zdjęcia z galerii na stronie
               foreach ($attachment_ids as $attachment_id):

               	$image_url = wp_get_attachment_url($attachment_id);
               	$alt_text = get_post_meta($attachment_id, "_wp_attachment_image_alt", true);
               	?>

                    <li class="gallery__photo">
                        <img tabindex="0" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($alt_text); ?>">
                    </li>

                <?php
               endforeach;
               ?>

               </ul>
               <div class="popup hidden">
                  <div class="popup__box">
                     <button aria-label="Zamknij popup" class="popup__close">X</button>
                     <img src="" alt="" class="popup__img">
                     <button aria-label="Poprzednie zdjęcie" class="popup__arrow popup__arrow--left">
                        < </button>
                           <button aria-label="Następne zdjęcie" class="popup__arrow popup__arrow--right">></button>
                  </div>
               </div>
            </div>
         </div>
      </section>

      <section class="team-img section">
         <div class="white-block white-block-left"></div>
         <div class="white-block white-block-right"></div>
         <div class="wrapper">
            <h2 class="section-heading team__heading">Nasz zespół</h2>
            <div class="team__cards">
               <div class="team__card team__card--one card">
                  <button class="team__card-button" onclick="void(0)" aria-label="pokaż dane kontaktowe"> <i
                        class="far fa-question-circle"></i> </button>
                  <div class="team__card-text">
                     <h3 class="team__card-text-post">Prezes</h3>
                     <h3 class="team__card-text-name">Anna Kłys</h3>
                     <p><i class="fa-solid fa-phone"></i> +48 600 100 200</p>
                     <p><i class="fa-solid fa-at"></i> a.klys@odnawialni.pl</p>
                  </div>
               </div>
               <div class="team__card team__card--two card">
                  <button class="team__card-button" onclick="void(0)" aria-label="pokaż dane kontaktowe"> <i
                        class="far fa-question-circle"></i> </button>
                  <div class="team__card-text">
                     <h3 class="team__card-text-post">Członek zarządu</h3>
                     <h3 class="team__card-text-name">Jan Nowak</h3>
                     <p><i class="fa-solid fa-phone"></i> +48 600 300 400</p>
                     <p><i class="fa-solid fa-at"></i> j.nowak@odnawialni.pl</p>
                  </div>
               </div>
               <div class="team__card team__card--three card">
                  <button class="team__card-button" onclick="void(0)" aria-label="pokaż dane kontaktowe"> <i
                        class="far fa-question-circle"></i> </button>
                  <div class="team__card-text">
                     <h3 class="team__card-text-post">Kierownik biura</h3>
                     <h3 class="team__card-text-name">Marta Biała</h3>
                     <p><i class="fa-solid fa-phone"></i> +48 600 500 600</p>
                     <p><i class="fa-solid fa-at"></i> m.biala@odnawialni.pl</p>
                  </div>
               </div>
            </div>
         </div>
      </section>


      <section id="faq" class="faq section-padding section white-section">
         <img class="faq__icon faq__icon--one" src="./wp-content/themes/odnawialni/assets/images/svg/question.svg" alt="">
         <img class="faq__icon faq__icon--two" src="./wp-content/themes/odnawialni/assets/images/svg/question.svg" alt="">
         <div class="white-block white-block-left"></div>
         <div class="white-block white-block-right"></div>
         <h2 class="section-heading">FAQ</h2>
         <div class="wrapper">
            <div class="faq__boxes">

               <div class="faq__container">
                  <?php
                  // Ustalamy argumenty dla zapytania
                  $args = [
                  	"post_type" => "post",
                  	"posts_per_page" => 10,
                  	"category_name" => "faq",
                  ];

                  // Tworzymy nowe zapytanie
                  $query = new WP_Query($args);

                  // Pętla przez posty
                  if ($query->have_posts()):
                  	while ($query->have_posts()):
                  		$query->the_post(); ?>


                  <div class="faq__item">
                     <div class="faq__header">
                        <h3 class="faq__title"><?php the_title(); ?></h3>
                     </div>
                     <div class="faq__content collapse">
                        <div class="faq__body">
                        <?php the_content(); ?>
                        </div>
                     </div>
                  </div>

                  <?php
                  	endwhile;
                  	// Resetujemy zapytanie
                  	wp_reset_postdata();
                  else:
                  	echo "<p>Brak postów do wyświetlenia</p>";
                  endif;
                  ?>  

               </div>
            </div>
         </div>
      </section>


      <section id="contact" class="contact section-padding section white-section">
         <div class="white-block white-block-left"></div>
         <div class="white-block white-block-right"></div>
         <h2 class="section-heading">Kontakt</h2>
         <div class="wrapper">



            <form class="contact__form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="action" value="custom_contact_form">
    <div class="contact__form-top">
        <label for="name" class="contact__form-label">Imię i nazwisko:</label>
        <input type="text" name="name" class="contact__form-input" id="name" required>
        <label for="email" class="contact__form-label">Adres e-mail:</label>
        <input type="email" name="email" id="email" class="contact__form-input" required>
      </div>
      <label for="msg" class="contact__form-label">Wiadomość:</label>
      <textarea name="message" id="msg" class="contact__form-textarea" required></textarea>
      <label for="file" class="contact__form-label contact__form-hidden">Załącznik:</label>
      <input type="file" name="attachment" id="file" class="contact__form-input contact__form-file">
     <button type="submit" class="contact__form-btn btn-special-animation">Wyślij</button>
</form>



         </div>
      </section>

   </main>


<?php get_footer();
?>
