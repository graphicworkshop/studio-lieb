<?php
/*
Template Name: Prestations
*/
?>

<?php while (have_posts()) :
the_post();
the_content(); ?>

<div id="pricing-container">

  <div class="container pricing-widget">

    <div class="text-center">
      <h2>Les packs et options</h2>
    </div>

    <?php if (have_rows('formules')): ?>

      <div class="plans">

        <?php while (have_rows('formules')): the_row();

          // vars
          $code_formule = get_sub_field('code_formule');
          $nom = get_sub_field('nom');
          $tarifs = get_sub_field('tarifs');
          $description_courte = get_sub_field('description_courte');
          $description = get_sub_field('description');
          $avantages = get_sub_field('avantages');
          $en_avant = get_sub_field('mettre_en_avant');


          ?>

          <div class="plan text-center" data-plan="<?php echo $code_formule ?>">
            <?php if ($en_avant) { ?>
              <div class="special">Le plus populaire</div>
            <?php } ?>

            <p class="h2"><?php echo $nom ?></p>

            <p class="price"><?php echo $tarifs ?></p>

            <p>
              <?php if ($en_avant) { ?>
                <a class="btn btn-primary" href="<?php echo get_the_permalink(11) ?>">Demandez un devis</a>
              <?php } else { ?>
                <a class="btn btn-secondary" href="<?php echo get_the_permalink(11) ?>">Demandez un devis</a>
              <?php } ?>
            </p>

            <h3><?php echo $description_courte ?></h3>
            <ul class="features">
              <?php echo $description ?>
            </ul>

            <ul class="special-features">
              <?php echo $avantages ?>
            </ul>

          </div>

        <?php endwhile; ?>

      </div>

      <div class="linelineline moveup"></div>

    <?php endif; ?>

    <?php endwhile; ?>

    <?php if (have_rows('bloc_details')): ?>

      <?php while (have_rows('bloc_details')):
        the_row();

        // vars
        $titre = get_sub_field('titre');
        $texte_en_exergue = get_sub_field('texte_en_exergue');
        $image = get_sub_field('image');
        $position_image = get_sub_field('position_image');
        $texte = get_sub_field('texte');


        $size = 'medium';
        $thumb = $image['sizes'][ $size ];

        ?>

        <div class="pricing-info">
          <div class="row">
            <?php if ($position_image == "Gauche") { ?>
              <div class="col-md-5"><img class="img-responsive" src="<?php echo $thumb; ?>" alt="<?php echo $image['alt']; ?>" /></div>
              <div class="col-md-7">

                <h2><?php echo $titre ?></h2>

                <?php if ($texte_en_exergue) { ?>
                  <h3><?php echo $texte_en_exergue ?></h3>
                <?php } ?>

                <?php echo $texte ?>

              </div>

            <?php } else { ?>

              <div class="col-md-7">
                <h2><?php echo $titre ?></h2>

                <?php if ($texte_en_exergue) { ?>
                  <h3><?php echo $texte_en_exergue ?></h3>
                <?php } ?>

                <?php echo $texte ?>

              </div>

              <div class="col-md-5"><img class="img-responsive" src="<?php echo $thumb; ?>" alt="<?php echo $image['alt']; ?>" /></div></div>

            <?php } ?>
          </div>
        </div>

      <?php endwhile; ?>

    <?php endif; ?>

  </div>
</div>
