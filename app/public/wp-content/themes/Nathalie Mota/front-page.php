<?php get_header(); ?>


<!-- Bannière et titre de la page -->
<section class="banner">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Photoheader.png" alt="image banniere" class="img-banner">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Titreheader.png" alt="Titre du site" class="site-title">
</section>

<!-- Galerie de photos triable -->
<section class="gallery">
    <div class="gallery-filters">
        <!-- Boutons de filtrage -->
        <button id="sort-by-date" class="button-filtre">Trier par date</button>
        <button id="filter-by-format button">Filtrer par format</button>
        <button id="filter-by-category button">Filtrer par catégorie</button>
    </div>

    <div class="gallery-grid">
        <!-- Les 6 premières photos -->
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Photos NMota/Card photo.png" alt="Image 1">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Photos NMota/Card photo-1.png" alt="Image 2">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Photos NMota/Card photo-2.png" alt="Image 3">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Photos NMota/Card photo-3.png" alt="Image 3">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Photos NMota/Card photo-4.png" alt="Image 3">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Photos NMota/Card photo-5.png" alt="Image 3">
        <!-- Ajoutez les autres images de votre galerie -->
    </div>

    <button id="load-more">Charger plus de photos</button>
</section>



<?php get_footer(); ?>