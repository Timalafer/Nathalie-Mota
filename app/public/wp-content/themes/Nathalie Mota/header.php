<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono&display=swap" rel="stylesheet">

    <title>NathalieMota</title>
    <?php wp_head() ?>
</head>

<body>
    <header class="site-header">
        <div class="logo">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo.png" alt="image logo">
        </div>
        <nav class="menu-nav">
            <ul>
                <li><a class="link" href="#">Accueil</a></li>
                <li><a class="link" href="#">À PROPOS</a></li>
                <li><a class="link" href="#">CONTACT</a></li>
            </ul>
        </nav>
    </header>