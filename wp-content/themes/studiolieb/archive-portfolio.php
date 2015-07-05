<?php get_template_part('templates/page', 'header'); ?>
<div id="effect" class="effects">
    <?php
    $prestations = (get_terms('prestation'));
    if ($prestations) {
        ?>
        <div id="filters">
            <button class="*" data-filter="*">Tout voir</button>
            <?php
            foreach ($prestations as $prestation) {
                echo '<button data-filter=".'. $prestation->slug .'">'
                . $prestation->name . '</button>';
            }
            ?>
        </div>
        <?php } ?>

        <div class="row grid-item" id="list-isotope">
            <?php while (have_posts()) : the_post(); ?>
                <div class="img grid item<?php
                if (wp_get_post_terms(get_the_ID(), 'prestation')) {

                    $prestations = wp_get_post_terms(get_the_ID(), 'prestation');
                    $liste_presta ='';

                    foreach ($prestations as $prestation) {
                        $liste_presta = $liste_presta . ' ' . $prestation->slug;
                    }

                    echo $liste_presta.'"';
               // echo ' data-category="'.$liste_presta;

                }
                ?>">
                <?php
            //echo '<a href="' . get_the_permalink() . '">';
                the_post_thumbnail('medium', array( 'class' => '' ));
            //echo '</a>';
                //echo 'Terms : '.wp_get_post_terms();
                //var_dump(wp_get_post_terms(get_the_ID(), 'prestation'));
                echo '<div class="overlay"><a href="' . get_the_permalink() . '" class="expand">' . get_the_title() . '</a></div>';
                ?>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<?php the_posts_navigation(); ?>