<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://bing.com/search?q=
 * @package UNIVERSOME
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); // Hook di WordPress per inserire script e stili nel <head> ?>
</head>

<body <?php body_class(); // Aggiunge classi al tag <body> basate sul contesto della pagina ?>>
    <div class="mobile-last-modified">
        <span class="update-label">Ultimo aggiornamento: </span>
        <span class="update-time">
            <?php
            // Query per ottenere l'ultimo post modificato
            $recent = new WP_Query([
                'post_type' => 'any', // Include tutti i tipi di post
                'posts_per_page' => 1, // Limita a un risultato
                'orderby' => 'modified', // Ordina per data di modifica
                'order' => 'DESC', // Dal più recente al più vecchio
            ]);

            if ($recent->have_posts()) {
                $recent->the_post();
                // Mostra la data dell'ultimo post modificato
                echo get_the_modified_time('d/m/Y, H:i');
            }
            wp_reset_postdata(); // Ripristina il contesto del post originale
            ?>
        </span>
    </div>

    <?php wp_body_open(); // Hook di WordPress per inserire contenuti subito dopo l'apertura del <body> ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text"
            href="#primary"><?php esc_html_e('Skip to content', 'universome'); ?></a>

        <header class="header w-full z-50">
            <div class="header-top">
                <div class="container mx-auto justify-between items-center">
                    <!-- Logo e menu mobile -->
                    <div class="flex items-center">
                        <!-- Hamburger menu per mobile -->
                        <button class="md:hidden" id="mobile-menu-button">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                        <!-- Logo -->
                        <a href="<?php echo home_url(); ?>">
                            <?php if (function_exists('the_custom_logo')): ?>
                                <div class="custom-logo">
                                    <?php the_custom_logo(); // Mostra il logo personalizzato ?>
                                </div>
                            <?php endif; ?>
                        </a>
                    </div>

                    <!-- Data e ora (visibili solo su desktop) -->
                    <div class="nav-element" id="current-date-time">
                        <?php echo date('d/m/Y'); // Mostra la data corrente ?>
                    </div>
                    <div class="nav-element" id="current-time">
                        <?php echo date('H:i'); // Mostra l'ora corrente ?>
                    </div>
                    <div class="nav-element" id="last-modified">
                        <?php
                        // Query per ottenere l'ultimo post modificato
                        $recent = new WP_Query([
                            'post_type' => 'any', // Include tutti i tipi di post
                            'posts_per_page' => 1, // Limita a un risultato
                            'orderby' => 'modified', // Ordina per data di modifica
                            'order' => 'DESC', // Dal più recente al più vecchio
                        ]);

                        if ($recent->have_posts()) {
                            $recent->the_post();
                            // Mostra la data dell'ultimo post modificato
                            echo get_the_modified_time('d/m/Y, H:i');
                        }
                        wp_reset_postdata(); // Ripristina il contesto del post originale
                        ?>
                    </div>


                    <!-- Icone social e ricerca mobile -->
                    <div class="flex items-center">
                        <!-- Icone social (visibili solo su desktop) -->
                        <div class="hidden md:flex">
                            <div class="nav_ico">
                                <a href="https://www.facebook.com/UniVersoMessina">
                                    <svg class="icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M8 6a6 6 0 0 1 6-6h5v6.5h-4v2h4.247L17.802 15H15v9H8v-9H4.25V8.5H8zm6-4a4 4 0 0 0-4 4v4.5H6.25V13H10v9h3v-9h3.198l.555-2.5H13v-4a2 2 0 0 1 2-2h2V2z" />
                                    </svg>
                                </a>
                            </div>
                            <div class="nav_ico">
                                <a href="https://www.instagram.com/uvm_universome">
                                    <svg class="icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M7.8 2h8.4C19.4 2 22 4.6 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8C4.6 22 2 19.4 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2m-.2 2A3.6 3.6 0 0 0 4 7.6v8.8C4 18.39 5.61 20 7.6 20h8.8a3.6 3.6 0 0 0 3.6-3.6V7.6C20 5.61 18.39 4 16.4 4zm9.65 1.5a1.25 1.25 0 0 1 1.25 1.25A1.25 1.25 0 0 1 17.25 8A1.25 1.25 0 0 1 16 6.75a1.25 1.25 0 0 1 1.25-1.25M12 7a5 5 0 0 1 5 5a5 5 0 0 1-5 5a5 5 0 0 1-5-5a5 5 0 0 1 5-5m0 2a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3" />
                                    </svg>
                                </a>
                            </div>
                            <div class="nav_ico">
                                <a href="https://twitter.com/universomessina">
                                    <svg class="icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 16 16">
                                        <path fill="currentColor"
                                            d="M9.294 6.928L14.357 1h-1.2L8.762 6.147L5.25 1H1.2l5.31 7.784L1.2 15h1.2l4.642-5.436L10.751 15h4.05zM7.651 8.852l-.538-.775L2.832 1.91h1.843l3.454 4.977l.538.775l4.491 6.47h-1.843z" />
                                    </svg>
                                </a>
                            </div>
                            <div class="nav_ico">
                                <a href="https://open.spotify.com/show/1J8nrLau2QtjbMjFodeotT">
                                    <svg class="icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24">
                                        <g fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="1.5">
                                            <path d="M7 15s4.5-1 9 1m-9.5-4s6-1.5 11 1.5M6 9c3-.5 8-1 13 2" />
                                            <path
                                                d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10s-4.477 10-10 10" />
                                        </g>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Icona ricerca per mobile -->
                    <button class="md:hidden" id="mobile-search-button">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </div>
            </div>
    </div>

    <!-- Categorie e barra di ricerca -->
    <div class="header-bottom bg-white">
        <div class="container mx-auto px-4 flex justify-between items-center py-4">
            <!-- Categorie WordPress -->
            <nav class="flex-grow">
                <ul class="flex flex-wrap gap-4">
                    <?php
                    $args = array(
                        'parent' => 0, // Prende solo le categorie principali
                        'exclude' => get_cat_ID('senza categoria'), // Esclude la categoria "senza categoria"
                        'hide_empty' => false // Mostra anche categorie senza post
                    );
                    $categories = get_categories($args);
                    foreach ($categories as $category) {
                        echo '<li class="category-item"><a href="' . get_category_link($category->term_id) . '" class="text-gray-700 hover:text-gray-900 font-semibold">' . $category->name . '</a></li>';
                    }
                    ?>
                </ul>
            </nav>
            <!-- Barra di ricerca -->
            <div class="flex w-full max-w-sm justify-center">
                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>"
                    class="flex items-center bg-[#e2e2e2] rounded-full overflow-hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192.904 192.904" width="16px"
                        class="fill-black ml-4">
                        <path
                            d="m190.707 180.101-47.078-47.077c11.702-14.072 18.752-32.142 18.752-51.831C162.381 36.423 125.959 0 81.191 0 36.422 0 0 36.423 0 81.193c0 44.767 36.422 81.187 81.191 81.187 19.688 0 37.759-7.049 51.831-18.751l47.079 47.078a7.474 7.474 0 0 0 5.303 2.197 7.498 7.498 0 0 0 5.303-12.803zM15 81.193C15 44.694 44.693 15 81.191 15c36.497 0 66.189 29.694 66.189 66.193 0 36.496-29.692 66.187-66.189 66.187C44.693 147.38 15 117.689 15 81.193z" />
                    </svg>
                    <input type="search" name="s" placeholder="Cerca..."
                        class="w-full px-4 py-2 bg-[#e2e2e2] placeholder-gray-400 search-input" />
                </form>
            </div>
        </div>
    </div>

    <!-- Menu mobile (nascosto di default) -->
    <div class="mobile-menu-overlay" id="mobile-menu-overlay"></div>
    <div class="hidden md:hidden" id="mobile-menu">
        <div class="mobile-menu-header">
            <div class="mobile-logo">
                <?php
                if (function_exists('the_custom_logo')) {
                    the_custom_logo();
                }
                ?>
            </div>
            <span class="close-menu" id="close-menu">&times;</span>
        </div>
        <div class="mobile-menu-content">
            <div class="mobile-menu-categories">
                <?php
                $args = array(
                    'parent' => 0, // Prende solo le categorie principali
                    'exclude' => get_cat_ID('senza categoria'), // Esclude la categoria "senza categoria"
                    'hide_empty' => false // Mostra anche categorie senza post
                );
                $categories = get_categories($args);
                foreach ($categories as $category) {
                    echo '<a href="' . get_category_link($category->term_id) . '"class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">' . $category->name . '</a>';
                }
                ?>
            </div>
        </div>
        <div class="mobile-menu-footer">
            <p>Sei un giornalista?</p>
            <a href="https:\\universome.unime.it\login">
                <button
                    class="text-white bg-[#787878] hover:bg-[#f28b0c] font-semibold rounded-md text-sm px-6 py-3 block w-full mt-3"
                    style="border: none;">Accedi</button>
            </a>
        </div>
    </div>

    <!-- Form di ricerca mobile (nascosto di default) -->
    <div class="hidden md:hidden" id="mobile-search">
        <div class="p-4">
            <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>"
                class="flex items-center bg-[#e2e2e2] rounded-full overflow-hidden">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192.904 192.904" width="16px"
                    class="fill-black ml-4">
                    <path
                        d="m190.707 180.101-47.078-47.077c11.702-14.072 18.752-32.142 18.752-51.831C162.381 36.423 125.959 0 81.191 0 36.422 0 0 36.423 0 81.193c0 44.767 36.422 81.187 81.191 81.187 19.688 0 37.759-7.049 51.831-18.751l47.079 47.078a7.474 7.474 0 0 0 5.303 2.197 7.498 7.498 0 0 0 5.303-12.803zM15 81.193C15 44.694 44.693 15 81.191 15c36.497 0 66.189 29.694 66.189 66.193 0 36.496-29.692 66.187-66.189 66.187C44.693 147.38 15 117.689 15 81.193z" />
                </svg>
                <input type="search" name="s" placeholder="Cerca..."
                    class="w-full px-4 py-3 bg-[#e2e2e2] text-black placeholder-gray-600 search-input" />
            </form>
        </div>
    </div>
    </header>
    </div>
    <?php wp_footer(); // Hook di WordPress per inserire script prima della chiusura del <body> ?>
</body>

</html>