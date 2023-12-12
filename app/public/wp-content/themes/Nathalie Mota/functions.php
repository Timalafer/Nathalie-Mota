<?php
function enqueue_theme_styles()
{
  wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/style.css', array(), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'enqueue_theme_styles');
function enqueue_custom_scripts()
{
  wp_enqueue_script('custom-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');


// Fonction pour ajouter une nouvelle page de menu dans l'administration WordPress

function nathaliemota_add_admin_pages()
{
  add_menu_page(
    __('Paramètres du thème NathalieMota', 'nathaliemota'), // Titre de la page dans le menu
    __('nathaliemota', 'nathaliemota'), // Titre du menu
    'manage_options', // Capacité utilisateur requise pour voir cette page
    'nathaliemota-settings', // Slug de la page
    'nathaliemota_theme_settings', // Fonction pour afficher la page
    'dashicons-admin-settings', // Icône du menu
    60 // Position dans le menu
  );
}
// Fonction pour afficher les réglages du thème dans une interface
function nathaliemota_theme_settings()
{
  echo '<h1>' . get_admin_page_title() . '</h1>';
  echo '<form action="options.php" method="post" name="nathaliemota_settings">';
  echo '<div>';

  settings_fields('nathaliemota_settings_fields');
  do_settings_sections('nathaliemota_settings_section');
  submit_button();

  echo '</div>';
  echo '</form>';
}

function nathaliemota_settings_register()
{
  register_setting('nathaliemota_settings_fields', 'nathaliemota_settings_fields', 'nathaliemota_settings_fields_validate');
  add_settings_section('nathaliemota_settings_section', __('Paramètres', 'nathaliemota'), 'nathaliemota_settings_section_introduction', 'nathaliemota_settings_section');
  add_settings_field('nathaliemota_settings_field_introduction', __('Introduction', 'nathaliemota'), 'nathaliemota_settings_field_introduction_output', 'nathaliemota_settings_section', 'nathaliemota_settings_section');
  add_settings_field('nathaliemota_settings_field_phone_number', __('Numéro de téléphone', 'nathaliemota'), 'nathaliemota_settings_field_phone_number_output', 'nathaliemota_settings_section', 'nathaliemota_settings_section');
  add_settings_field('nathaliemota_settings_field_email', __('Email', 'cnathaliemota'), 'nathaliemota_settings_field_email_output', 'nathaliemota_settings_section', 'nathaliemota_settings_section');
}

function nathaliemota_settings_section_introduction()
{
  echo __('Paramètrez les différentes options de votre thème Nathalie Mota.', 'nathaliemota');
}

function nathaliemota_settings_fields_validate($inputs)
{
  if (isset($_POST) && !empty($_POST)) {
    if (isset($_POST['nathaliemota_settings_field_introduction']) && !empty($_POST['nathaliemota_settings_field_introduction'])) {
      update_option('nathaliemota_settings_field_introduction', $_POST['nathaliemota_settings_field_introduction']);
    }
    if (isset($_POST['nathaliemota_settings_field_phone_number']) && !empty($_POST['nathaliemota_settings_field_phone_number'])) {
      update_option('nathaliemota_settings_field_phone_number', $_POST['nathaliemota_settings_field_phone_number']);
    }
    if (isset($_POST['nathaliemota_settings_field_email']) && !empty($_POST['nathaliemota_settings_field_email'])) {
      update_option('nathaliemota_settings_field_email', $_POST['nathaliemota_settings_field_email']);
    }
  }

  return $inputs;
}
function nathaliemota_settings_field_introduction_output()
{
  $value = get_option('nathaliemota_settings_field_introduction');
  echo '<input name="nathaliemota_settings_field_introduction" type="text" value="' . esc_attr($value) . '" />';
}

function nathaliemota_settings_field_phone_number_output()
{
  $value = get_option('nathaliemota_settings_field_phone_number');
  echo '<input name="nathaliemota_settings_field_phone_number" type="text" value="' . esc_attr($value) . '" />';
}

function nathaliemota_settings_field_email_output()
{
  $value = get_option('nathaliemota_settings_field_email');
  echo '<input name="nathaliemota_settings_field_email" type="text" value="' . esc_attr($value) . '" />';
}

// Création du type de contenu personnalisé pour les photos
function creer_type_contenu_photos()
{
  $args = array(
    'label' => 'Photos',
    'public' => true,
    'menu_icon' => 'dashicons-format-image', // Icône pour le menu admin (optionnel)
    'supports' => array('title', 'editor', 'thumbnail'), // Champs supportés (titre, éditeur, image à la une)
  );
  register_post_type('photos', $args);
}
// Création d'une taxonomie personnalisée pour les catégories de photos
function creer_taxonomie_photos()
{
  $args = array(
    'label' => 'Catégories',
    'public' => true,
  );
  register_taxonomy('categorie_photo', 'photos', $args);
}


function register_custom_menus()
{
  register_nav_menus(
    array(
      'topbar_menu' => esc_html__('Barre supérieure', 'your_theme_textdomain'),
      'main_menu'   => esc_html__('Main', 'your_theme_textdomain'),
      'footer_menu' => esc_html__('Footer', 'your_theme_textdomain'),
      'mobile_menu' => esc_html__('Mobile (optional)', 'your_theme_textdomain'),
      // Ajoutez d'autres emplacements de menu si nécessaire
    )
  );
}



/***** Actions *****/
add_action('admin_menu', 'nathaliemota_add_admin_pages', 10);
add_action('admin_init', 'nathaliemota_settings_register');
add_action('init', 'creer_type_contenu_photos');
add_action('init', 'creer_taxonomie_photos');
add_action('after_setup_theme', 'register_custom_menus');
