<?php get_template_part('templates/page', 'header'); ?>

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

    <div class="row" id="list-isotope">
        <?php while (have_posts()) : the_post(); ?>
            <div class="col-sm-4 item<?php
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
                echo '<a href="' . get_the_permalink() . '">';
                the_post_thumbnail('medium');
                echo '</a><br>';
                //echo 'Terms : '.wp_get_post_terms();
                //var_dump(wp_get_post_terms(get_the_ID(), 'prestation'));
                echo '<a href="' . get_the_permalink() . '">' . get_the_title() . '</a>';
                ?>
            </div>
        <?php endwhile; ?>
    </div>

<?php the_posts_navigation(); ?>