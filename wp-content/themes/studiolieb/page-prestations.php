<?php while (have_posts()) :
  the_post(); ?>


  <div class="row">

    <div class="col-sm-8 headline text-left">
      <h2>Photographe et vidéaste professionnel</h2>

      <p>Spécialiste des prises de vues industrielles, commerciales ou publicitaires, je suis en mesure de réaliser
        des photos pour vos packshots, vos plaquettes d'entreprises ou vos fiches techniques produits. Je peux
        également réaliser et monter des reportages industriels pour présenter
        en détail votre entreprise et l'ensemble de ses services.</p>

      <p>Je propose également des prestations sur-mesure pour les particuliers : portraits, naisssance,
        mariages...</p>

    </div>

    <div class="col-sm-3 col-sm-offset-1">


        <a href="<?php get_permalink(2); ?>">
          <div id="goto-portfolio">
            <img src="<?php bloginfo('template_url'); ?>/assets/img/36102619_small.jpg" class="img-responsive">

            <div class="content-overlay">
              <h2>Portfolio</h2>
              <span class="description">Découvrez les dernières réalisations</span>
              <span class="access">Voir les réalisations photos & Vidéos</span>
              <i class="icon-Label"></i>
            </div>
          </div>
        </a>


    </div>
  </div>

  <section class="activities-list">
    <div class="row">
      <div class="col-sm-4">
        <div class="iwt-wrapper clearfix">
          <div class="iwithtext">
            <div class="iwt-icon">
              <i class="icon-Montre"></i>
            </div>
            <div class="iwt-text">
              <h4><a href="<?php echo get_permalink(43); ?>" title="Photographie de produits et packshots">Photographie
                  de produits & packshots</a></h4>

              <p>Prises de vues et retouches pour tous types de produits : joaillerie, verrerie, cosmétique, textile,
                alimentaire...</p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-4">
        <div class="iwt-wrapper clearfix">
          <div class="iwithtext">
            <div class="iwt-icon">
              <i class="icon-Medical"></i>
            </div>
            <div class="iwt-text">
              <h4><a href="<?php echo get_permalink(41); ?>" title="Photographie et film industriel">Photographie &
                  film industriel</a></h4>

              <p>Portraits en entreprise, parc machines, séminaires, inaugurations...</p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-4">
        <div class="iwt-wrapper clearfix">
          <div class="iwithtext">
            <div class="iwt-icon">
              <i class="icon-Mode"></i>
            </div>
            <div class="iwt-text">
              <h4><a href="<?php echo get_permalink(100); ?>" title="Photographie de mode et beauté">Photographie de
                  mode et beauté</a></h4>

              <p>Réalisation de books professionnels, accompagnement & coaching personnalisé lors du shooting...</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-4">
        <div class="iwt-wrapper clearfix">
          <div class="iwithtext">
            <div class="iwt-icon">
              <i class="icon-Coupe"></i>
            </div>
            <div class="iwt-text">
              <h4><a href="<?php echo get_permalink(102); ?>" title="Photographie
                  sportive et instants d'actions">Photographies sportives & instants d'actions</a></h4>

              <p>Réalisation de reportages sportifs, couverture d’évènements sportifs...</p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-4">
        <div class="iwt-wrapper clearfix">
          <div class="iwithtext">
            <div class="iwt-icon">
              <i class="icon-Mariage"></i>
            </div>
            <div class="iwt-text">
              <h4><a href="<?php echo get_permalink(39); ?>" title="Photographies de mariage">Mariages</a></h4>

              <p>Photos de couple, reportage photo des préparatifs jusqu’à la fin du du dîner...</p>
            </div>
          </div>
        </div>
      </div>


      <div class="col-sm-4">
        <div class="iwt-wrapper clearfix">
          <div class="iwithtext">
            <div class="iwt-icon">
              <i class="icon-Trepied"></i>
            </div>
            <div class="iwt-text">
              <h4><a href="<?php echo get_permalink(37); ?>" title="Photographies de mariage">Portraits particuliers</a>
              </h4>

              <h4></h4>

              <p>Réalisation de portraits : famille, grossesse, naissance, boudoir...</p>
            </div>
          </div>
        </div>
      </div>

    </div>


  </section>

  <?php the_content(); ?>

  <section class="goto-tarifs">

    <div class="container-fluid">

    </div>
  </section>

<?php endwhile; ?>
