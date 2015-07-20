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

        <div id="list-isotope">
            <div class="grid-sizer"></div>
            <div class="gutter-sizer"></div>

            <?php $posts = query_posts($query_string . '&orderby=menu_order&order=asc&posts_per_page=-1'); ?>

            <?php while (have_posts()) : the_post(); ?>

                <?php 

                /* Get Thumbnail ID */
                $post_thumbnail_id = get_post_thumbnail_id( $post_id ); 

                /* Get Image Meta */
                $image_meta = get_post_meta($post_thumbnail_id,'_wp_attachment_metadata',TRUE);

                /* Check Orientation ( Portrait / Landscape ) */
                $orientation = $image_meta['height'] > $image_meta['width'] ? 'grid-item--portrait' : 'landscape';


                if (wp_get_post_terms(get_the_ID(), 'prestation')) {

                    
                    $prestations = wp_get_post_terms(get_the_ID(), 'prestation');
                    
                    $class ='';

                    foreach ($prestations as $prestation) {
                        $class = $liste_presta . ' ' . $prestation->slug;
                    }

                }

                ?>

                <div class="img grid-item item <?php echo $class ?> <?php echo $orientation ?>" data-category="<?php echo $class ?>">


                <?php
                //echo '<a href="' . get_the_permalink() . '">';


                the_post_thumbnail('large', array( 'class' => 'img-responsive' ));
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