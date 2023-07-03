<?php

//Dodawanie rzeczy do head
function odnawialni_register_styles()
{
	wp_enqueue_style(
		"custom-google-fonts",
		"//fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;1,400&display=swap"
	);
	wp_enqueue_style("slick-header", "//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css", [], "1.8.1", "all");
	wp_enqueue_style("odnawialni_styles_css", get_template_directory_uri() . "/style.css", [], "1.0", "all");
	wp_enqueue_script("font-awsome", "//kit.fontawesome.com/7726142a02.js", [], "1.0");
}
add_action("wp_enqueue_scripts", "odnawialni_register_styles");

//Dodawanie rzeczy na koncu body
function odnawialni_register_scripts()
{
	wp_enqueue_script("slick-biblioteka-footer-1", "//code.jquery.com/jquery-1.11.0.min.js", [], "1.11.0", true);
	wp_enqueue_script("slick-biblioteka-footer-2", "//code.jquery.com/jquery-migrate-1.2.1.min.js", [], "1.2.1", true);
	wp_enqueue_script(
		"slick-biblioteka-footer-3",
		"//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js",
		[],
		"1.8.1",
		true
	);
	wp_enqueue_script("odnawialni-main-js", get_template_directory_uri() . "/assets/js/main.js", [], "1.8.1", true);
	wp_enqueue_script("odnawialni-slick-js", get_template_directory_uri() . "/assets/js/slick.js", [], "1.8.1", true);
	wp_enqueue_script("cookie-scrypt", "//skrypt-cookies.pl/id/dae606c4c5bf7a9f.js", [], "1.0", true);
}
add_action("wp_enqueue_scripts", "odnawialni_register_scripts");

//Dodawanie menu(otwiera nam opcje dodawania w panelu administratora)
function odnawialni_menu()
{
	$locations = [
		"primary" => "Głowne menu",
	];

	register_nav_menus($locations);
}
add_action("init", "odnawialni_menu");

// Dodawanie dynamiczne rzeczy - zmieniamy w dashboard w WP
function odnawialni_theme_support()
{
	//dodawanie dynamiczne title
	add_theme_support("title-tag");
	//dodawanie dynamiczne logo
	add_theme_support("custom-logo");
	//dodawanie miniatury do postu
	add_theme_support("post-thumbnails");
}
add_action("after_setup_theme", "odnawialni_theme_support");


//funkcja ktora uruchamia nam formularz kontaktowy i umożliwia dodanie załącznika
function handle_contact_form_submission() {
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);
        $message = sanitize_textarea_field($_POST['message']);

        $to = 'kosinskipawel898@gmail.com'; // Adres e-mail, na który chcesz otrzymywać wiadomości
        $subject = 'Nowa wiadomość od ' . $name;
        $headers = 'From: ' . $email;

        // Obsługa załącznika
        $uploaded_file = $_FILES['attachment'];
        $upload_overrides = array( 'test_form' => false );
        $movefile = wp_handle_upload($uploaded_file, $upload_overrides);

        $attachment = '';
        if ($movefile && !isset($movefile['error'])) {
            $attachment = $movefile['file'];
        }

        // Wysyłka wiadomości e-mail
        wp_mail($to, $subject, $message, $headers, $attachment);

        // Przekierowanie po pomyślnym wysłaniu wiadomości
        wp_redirect('/thank-you');
        exit;
    }
}
add_action('admin_post_custom_contact_form', 'handle_contact_form_submission');
add_action('admin_post_nopriv_custom_contact_form', 'handle_contact_form_submission');


?>




