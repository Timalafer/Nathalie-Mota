<?php
/*
Template Name: Modal de Contact
*/
?>

<!-- Contenu de votre modale -->

<div class="popup-overlay">
    <div class="popup-salon">
        <div class="popup-header">
            <p>Contact</p>
            <span class="popup-close">&times;</span>
        </div>
        <?php
        // On insère le formulaire de demandes de renseignements
        echo do_shortcode('[contact-form-7 id="21c9c9d" title="Contact"]');
        ?>
    </div>
</div>

<!-- Code pour fermer la popup -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.popup-close').click(function() {
            $('.popup-overlay').hide();
        });
    });
</script>

<!-- Fin du contenu de votre modale -->