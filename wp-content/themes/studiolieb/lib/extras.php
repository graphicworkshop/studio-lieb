<?php
/**
 * Clean up the_excerpt()
 */
function roots_excerpt_more($more) {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'roots') . '</a>';
}
add_filter('excerpt_more', 'roots_excerpt_more');

/**
 * Manage output of wp_title()
 */
function roots_wp_title($title) {
  if (is_feed()) {
    return $title;
  }

  $title .= get_bloginfo('name');

  return $title;
}
add_filter('wp_title', 'roots_wp_title', 10);


/**
 * Suppport Excerpts in Pages
 */
add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
	add_post_type_support( 'page', 'excerpt' );
}


/**
 * CUSTOM POST TYPE : PORTFOLIO
 */
  
  // Register Custom Post Type
function portfolio_post_type() {

	$labels = array(
		'name'                => 'Réalisations',
		'singular_name'       => 'Réalisation',
		'menu_name'           => 'Portfolio',
		'name_admin_bar'      => 'Portfolio',
		'parent_item_colon'   => '',
		'all_items'           => 'Toutes les réalisations',
		'add_new_item'        => 'Ajouter une réalisation',
		'add_new'             => 'Ajouter une nouvelle réalisation',
		'new_item'            => 'Nouvelle réalisation',
		'edit_item'           => 'Éditer la réalisation',
		'update_item'         => 'Mettre à jour la réalisation',
		'view_item'           => 'Voir la réalisation',
		'search_items'        => 'Chercher une réalisation',
		'not_found'           => 'Non trouvé',
		'not_found_in_trash'  => 'Non trouvé dans la corbeille',
	);
	$args = array(
		'label'               => 'portfolio',
		'description'         => 'Portfolio',
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', ),
		'taxonomies'          => array( 'prestation' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-format-gallery',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,		
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'portfolio', $args );

}

// Hook into the 'init' action
add_action( 'init', 'portfolio_post_type', 0 );

/*
 * CUSTOM TAXONOMY : PRESTATION
 */
 /*
 * Custom Taxonomy Prestations
 */
function prestations_taxonomy()
{

    $labels = array(
        'name' => 'Types de prestation',
        'singular_name' => 'Type de prestation',
        'menu_name' => 'Type de prestations',
        'all_items' => 'Toutes les types',
        'parent_item' => 'Prestation parente',
        'parent_item_colon' => 'Prestation parente :',
        'new_item_name' => 'Nom du nouveau type de prestation',
        'add_new_item' => 'Ajouter un type de prestation',
        'edit_item' => 'Modifier un type de prestation',
        'update_item' => 'Mettre à jour le type de prestation',
        'view_item' => 'Voir le type de prestation',
        'separate_items_with_commas' => 'Séparer les types de prestations avec des virgules',
        'add_or_remove_items' => 'Ajouter ou supprimer des types de prestations',
        'choose_from_most_used' => 'Choisir parmi les plus utilisés',
        'popular_items' => 'Types de prestations populaires',
        'search_items' => 'Chercher un type de prestation',
        'not_found' => 'Non trouvé',
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
    );
    register_taxonomy('prestation', array('portfolio'), $args);

}

// Hook into the 'init' action
add_action('init', 'prestations_taxonomy', 0);
