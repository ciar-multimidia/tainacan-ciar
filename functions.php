<?php
// ========================================//
// SETUPs
// ========================================// 
add_action( 'after_setup_theme', 'ciar_setup' );
function ciar_setup() {
	// estilos e scripts
	add_action( 'wp_enqueue_scripts', 'ciar_estilo_script', PHP_INT_MAX); 

    // seguranca e limpeza
    add_filter( 'style_loader_src', 'scripts_remove_versao', 9999 );
    add_filter( 'script_loader_src', 'scripts_remove_versao', 9999 );
    add_filter( 'style_loader_src', 'remove_query_string', 10, 2 );
    add_filter( 'script_loader_src', 'remove_query_string', 10, 2 );
    
    remove_action( 'wp_head', 'wp_shortlink_wp_head', 10);
    remove_action( 'wp_head', 'wp_generator' );
    remove_action( 'wp_head', 'wp_generator_tag' );
    remove_action( 'wp_head', 'wp_resource_hints', 2);
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'feed_links', 2 );
    remove_action( 'wp_head', 'feed_links_extra', 3 );
    remove_action( 'wp_head', 'rest_output_link_wp_head');
    remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
    remove_action( 'wp_head', 'wlwmanifest_link');
}

// ========================================//
// CSS E SCRIPTS
// ========================================// 
function ciar_estilo_script() {
	// estilo
	$parent_style = 'parent-style';
	wp_enqueue_style( $parent_style, get_template_directory_uri().'/style.css' );
	wp_enqueue_style( 'custom-style', get_stylesheet_directory_uri().'/css/layout.css', array( $parent_style ) );

	// jquery atualizado
    wp_deregister_script( 'jquery-core' );
    wp_register_script( 'jquery-core', "//code.jquery.com/jquery-3.4.1.min.js", array(), '' );
    wp_deregister_script( 'jquery-migrate' );
    wp_register_script( 'jquery-migrate', "//code.jquery.com/jquery-migrate-3.1.0.min.js", array(), '' );

    // scripts utilizados
    wp_enqueue_script( 'fancybox', '//cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js', array('jquery-core'), '', true);
    wp_enqueue_script( 'scripts', get_stylesheet_directory_uri() . '/js/app.js', array('jquery-core'), '', true);
}


// ========================================//
// SEGURANCA
// ========================================// 
// remover versão do wp nos scripts 
function scripts_remove_versao( $src ) {
    if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
// retirar query strings de scripts e css
function remove_query_string( $src ) {
 if( strpos( $src, '?ver=' ) )
 $src = remove_query_arg( 'ver', $src );
 return $src;
}



// ========================================//
// MIGALHAS DE PAO - NAVEGACAO
// ========================================// 
function breadcrumb() {

	$showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
	$delimiter = '<span>&#155;</span>'; // delimiter between crumbs
	$home = __('Home', 'tainacan-interface'); // text for the 'Home' link
	$showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
	$before = '<span class="current">'; // tag before the current crumb
	$after = '</span>'; // tag after the current crumb

	global $post;
	$homeLink = esc_url( home_url() );

	if (is_home() || is_front_page()) {

		if ($showOnHome == 1) echo '<nav aria-label="breadcrumb" class="d-none d-md-flex mt-3 border-bottom-0 max-large margin-one-column"><a href="' . $homeLink . '">' . $home . '</a></nav>';

	} else {

		echo '<nav aria-label="breadcrumb" class="d-md-flex mt-3 mb-3 border-bottom-0 max-large margin-one-column"><div><a href="' . $homeLink . '">' . $home . '</a>&nbsp;' . $delimiter . '&nbsp;';

		if ( is_category() ) {
			$thisCat = get_category(get_query_var('cat'), false);
			if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, '&nbsp;' . $delimiter . '&nbsp;');
			echo $before . __('Archive by category "', 'tainacan-interface') . single_cat_title('', false) . '"' . $after;

		} elseif ( is_search() ) {
			echo $before . __('Search results for "', 'tainacan-interface') . get_search_query() . '"' . $after;

		} elseif ( is_day() ) {
			echo '<a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . get_the_time('Y') . '</a> ' . $delimiter . '&nbsp;';
			echo '<a href="' . esc_url(get_month_link(get_the_time('Y'),get_the_time('m'))) . '">' . get_the_time('F') . '</a> ' . $delimiter . '&nbsp;';
			echo $before . get_the_time('d') . $after;

		} elseif ( is_month() ) {
			echo '<a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . get_the_time('Y') . '</a>&nbsp;' . $delimiter . '&nbsp;';
			echo $before . get_the_time('F') . $after;

		} elseif ( is_year() ) {
			echo $before . get_the_time('Y') . $after;

		} elseif ( is_single() && !is_attachment() ) {
			if ( get_post_type() != 'post' ) {
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				if(!is_page() && get_post_type() != 'tainacan-collection') {
					echo '<a href="'. esc_url(get_post_type_archive_link('tainacan-collection')) .'">'; _e( 'Collections', 'tainacan-interface' ); echo '</a>&nbsp;' . $delimiter . '&nbsp;';
				}
				echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
				if ($showCurrent == 1) echo '&nbsp;' . $delimiter . '&nbsp;' . $before . get_the_title() . $after;
			} else {
				$cat = get_the_category(); $cat = $cat[0];
				$cats = get_category_parents($cat, TRUE, '&nbsp;' . $delimiter . '&nbsp;');
				if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
				echo $cats;
				if ($showCurrent == 1) echo $before . get_the_title() . $after;
			}

		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
			$post_type = get_post_type_object(get_post_type());
			if(is_tax()) {
				$term = get_queried_object();
				$taxonomy = get_taxonomy( $term->taxonomy );
				echo $taxonomy->labels->name; 
				// Create a list of all the term's parents
				$parent = $term->parent;
				while ($parent):
					$new_parent = get_term_by( 'id', $parent, get_query_var( 'taxonomy' ));
					$parents[] = $new_parent;
					$parent = $new_parent->parent;
				endwhile;
				if( !empty( $parents ) ) :
					$parents = array_reverse($parents);
				// For each parent, create a breadcrumb item
				
				foreach( $parents as $parent ) :
					//$item = get_term_by( 'id', $parent, get_query_var( 'taxonomy' ));
					$url = get_term_link($parent);
					echo '&nbsp;' . $delimiter . '&nbsp;';
					echo '<a href="' . esc_url($url) . '">'.$parent->name.'</a>';
				endforeach;
				endif;
				// Display the current term in the breadcrumb
				echo '&nbsp;' . $delimiter . '&nbsp;';
				echo $before . $term->name . $after;
			} elseif(!is_tax() && get_post_type() != 'tainacan-collection') {
				echo '<a href="'. esc_url(get_post_type_archive_link('tainacan-collection')) .'">'; _e( 'Collections', 'tainacan-interface' ); echo '</a>&nbsp;' . $delimiter . '&nbsp;';

				echo $before . $post_type->labels->singular_name . $after;
			} else {
				echo $before . $post_type->labels->singular_name . $after;
			}
		} elseif ( is_attachment() ) {
			$parent = get_post($post->post_parent);
			$cat = get_the_category($parent->ID); $cat = $cat[0];
			echo get_category_parents($cat, TRUE, '&nbsp;' . $delimiter . '&nbsp;');
			echo '<a href="' . esc_url(get_permalink($parent)) . '">' . $parent->post_title . '</a>';
			if ($showCurrent == 1) echo '&nbsp;' . $delimiter . '&nbsp;' . $before . get_the_title() . $after;

		} elseif ( is_page() && !$post->post_parent ) {
			if ($showCurrent == 1) echo $before . get_the_title() . $after;

		} elseif ( is_page() && $post->post_parent ) {
			$parent_id  = $post->post_parent;
			$breadcrumbs = array();
			while ($parent_id) {
				$page = get_page($parent_id);
				$breadcrumbs[] = '<a href="' . esc_url(get_permalink($page->ID)) . '">' . get_the_title($page->ID) . '</a>';
				$parent_id  = $page->post_parent;
			}
			$breadcrumbs = array_reverse($breadcrumbs);
			for ($i = 0; $i < count($breadcrumbs); $i++) {
				echo $breadcrumbs[$i];
				if ($i != count($breadcrumbs)-1) echo '&nbsp;' . $delimiter . '&nbsp;';
			}
			if ($showCurrent == 1) echo '&nbsp;' . $delimiter . '&nbsp;' . $before . get_the_title() . $after;

		} elseif ( is_tag() ) {
			echo $before . __('Posts tagged "', 'tainacan-interface') . single_tag_title('', false) . '"' . $after;

		} elseif ( is_author() ) {
			global $author;
			$userdata = get_userdata($author);
			echo $before . __('Articles posted by ', 'tainacan-interface') . $userdata->display_name . $after;

		} elseif ( is_404() ) {
			echo $before . __('Error 404', 'tainacan-interface') . $after;
		}

		if ( get_query_var('paged') ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo '&nbsp;(';
			echo __('Page', 'tainacan-interface') . '&nbsp;' . get_query_var('paged');
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
		}

		echo '</div></nav>';

	}
}