<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package UNIVERSOME
 */

get_header();
?>

<?php
$author_id = get_post_field('post_author', get_the_ID());
$author_name = get_the_author_meta('display_name', $author_id);

// Controlla se esiste un avatar personalizzato
$custom_avatar = get_user_meta($author_id, 'custom_avatar', true);

if ($custom_avatar) {
    // Se esiste, usa l'avatar personalizzato
    $author_avatar = $custom_avatar;
} else {
    // Altrimenti, usa l'avatar predefinito di WordPress
    $author_avatar = get_avatar_url($author_id, array('size' => 80));
}

$author_posts_url = get_author_posts_url($author_id);
$post_date = get_the_date();
$category = get_the_category();
$tags = get_the_tags();

// Recupera i dati dei campi social dell'autore
$instagram = get_the_author_meta('instagram', $author_id);
$twitter = get_the_author_meta('twitter', $author_id);
$linkedin = get_the_author_meta('linkedin', $author_id);

// Definisci gli URL di base per i social network
$full_instagram_url = !empty($instagram) ? 'https://www.instagram.com/' . esc_attr($instagram) : '';
$full_twitter_url = !empty($twitter) ? 'https://twitter.com/' . esc_attr($twitter) : '';
$full_linkedin_url = !empty($linkedin) ? 'https://www.linkedin.com/in/' . esc_attr($linkedin) : '';
?>

<main id="primary" class="site-main">
    <!-- Immagine in evidenza con titolo -->
    <div class="post_top">
        <div class="post_top_space">
            <?php if (has_post_thumbnail()): ?>
                <?php the_post_thumbnail('full', array('class' => 'post_img')); ?>
            <?php else: ?>
            <?php endif; ?>
            <div class="carosello-titolo">
                <h1 class="title"><?php the_title(); ?></h1>
            </div>
        </div>
    </div>

    <div class="site_container">

        <!-- Informazioni Autore e Post -->
        <div class="author-info">
            <!-- Avatar dell'autore -->
            <img src="<?php echo esc_url($author_avatar); ?>" alt="<?php echo esc_attr($author_name); ?>"
                class="author-avatar">

            <!-- Dettagli dell'autore -->
            <div class="author-details">
                <a href="<?php echo esc_url($author_posts_url); ?>" class="author-name">
                    <?php echo esc_html($author_name); ?>
                </a>
                <div class="post-date">
                    <?php echo esc_html($post_date); ?>
                </div>
            </div>

            <!-- Icone Social -->
            <?php if ($full_instagram_url || $full_twitter_url || $full_linkedin_url): ?>
                <div class="post-social-icons">
                    <?php if ($full_instagram_url): ?>
                        <a href="<?php echo esc_url($full_instagram_url); ?>" target="_blank" title="Instagram">
                            <svg class="icon social-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M7.8 2h8.4C19.4 2 22 4.6 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8C4.6 22 2 19.4 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2m-.2 2A3.6 3.6 0 0 0 4 7.6v8.8C4 18.39 5.61 20 7.6 20h8.8a3.6 3.6 0 0 0 3.6-3.6V7.6C20 5.61 18.39 4 16.4 4zm9.65 1.5a1.25 1.25 0 0 1 1.25 1.25A1.25 1.25 0 0 1 17.25 8A1.25 1.25 0 0 1 16 6.75a1.25 1.25 0 0 1 1.25-1.25M12 7a5 5 0 0 1 5 5a5 5 0 0 1-5 5a5 5 0 0 1-5-5a5 5 0 0 1 5-5m0 2a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3" />
                            </svg>
                        </a>
                    <?php endif; ?>
                    <?php if ($full_twitter_url): ?>
                        <a href="<?php echo esc_url($full_twitter_url); ?>" target="_blank" title="Twitter">
                            <svg class="icon social-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                <path fill="currentColor"
                                    d="M9.294 6.928L14.357 1h-1.2L8.762 6.147L5.25 1H1.2l5.31 7.784L1.2 15h1.2l4.642-5.436L10.751 15h4.05zM7.651 8.852l-.538-.775L2.832 1.91h1.843l3.454 4.977l.538.775l4.491 6.47h-1.843z" />
                            </svg>
                        </a>
                    <?php endif; ?>
                    <?php if ($full_linkedin_url): ?>
                        <a href="<?php echo esc_url($full_linkedin_url); ?>" target="_blank" title="LinkedIn">
                            <svg class="icon social-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M4.001 3h16a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1h-16a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1m1 2v14h14V5zm2.5 4a1.5 1.5 0 1 1 0-3a1.5 1.5 0 0 1 0 3m-1 1h2v7.5h-2zm5.5.43c.584-.565 1.266-.93 2-.93c2.071 0 3.5 1.679 3.5 3.75v4.25h-2v-4.25a1.75 1.75 0 1 0-3.5 0v4.25h-2V10h2z" />
                            </svg>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>





        <!-- Categoria e Tag -->
        <div class="category-tags-wrapper">
            <?php if (!empty($category)): ?>
                <div class="category-label">
                    <?php echo esc_html($category[0]->name); ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($tags)): ?>
                <?php foreach ($tags as $index => $tag): ?>
                    <?php if ($index < 5): ?>
                        <span class="tag-label bg-green-100 text-green-600 px-2 py-1 rounded">
                            <?php echo esc_html($tag->name); ?>
                        </span>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <?php while (have_posts()):
            the_post(); ?>
            <!-- Wrapper per centralizzare il contenuto -->
            <div class="mx-auto flex">
                <!-- Sezione dell'Articolo -->
                <div class="articolo flex-1 overflow-y-auto pr-4 px-5 bg-white rounded-l-lg shadow-lg">
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>

                        <?php if (get_edit_post_link()): ?>
                            <footer class="entry-footer mt-4">
                                <?php
                                edit_post_link(
                                    sprintf(
                                        wp_kses(
                                            /* translators: %s: Name of current post. Only visible to screen readers */
                                            __('Edit <span class="screen-reader-text">%s</span>', 'universome'),
                                            array(
                                                'span' => array(
                                                    'class' => array(),
                                                ),
                                            )
                                        ),
                                        wp_kses_post(get_the_title())
                                    ),
                                    '<span class="edit-link">',
                                    '</span>'
                                );
                                ?>
                            </footer>
                        <?php endif; ?>
                    </article>
                </div>

                <!-- Barra Laterale -->
                <div class="sidebar">
                    <h2 class="sidebar-title">Articoli Suggeriti</h2>
                    <div class="sidebar-content">
                        <?php
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 4,
                            'orderby' => 'rand',
                            'meta_query' => array(
                                array(
                                    'key' => '_thumbnail_id',
                                    'compare' => 'EXISTS'
                                ),
                            )
                        );
                        $query = new WP_Query($args);

                        if ($query->have_posts()):
                            while ($query->have_posts()):
                                $query->the_post();
                                ?>
                                <div class="sidebar-card cards-border">
                                    <a href="<?php the_permalink(); ?>" class="sidebar-card-link">
                                        <div class="sidebar-card-thumbnail">
                                            <?php the_post_thumbnail('full'); ?>
                                        </div>
                                        <h3 class="card_title"><?php the_title(); ?></h3>
                                    </a>
                                </div>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                        else:
                            echo '<p>Nessun articolo trovato con immagine in evidenza.</p>';
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>

        <!-- Pulsante di condivisione fisso su mobile -->
        <button onclick="shareArticle()" class="fixed-share-button">
            Condividi Articolo
        </button>
</main>
</div>

<?php
get_sidebar();
get_footer();
?>