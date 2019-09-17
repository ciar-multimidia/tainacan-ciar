<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

		
<header id="cabecalho">
	<div class="max-large margin-one-column<?php if (! is_front_page() && ! is_singular()): ?> centralizado<?php endif ?>">
		<div class="area-logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-ciar-top.svg" alt="Logo Publica Ciar"></a>
			<?php if (is_front_page() || is_singular()): ?>
				<h1>Acervo de imagens produzidas pela equipe de publicação do <strong>Ciar UFG</strong></h1>
				<?php elseif(!is_singular()): ?>
				<a href="#" class="bt-ficha">Ficha técnica</a>
			<?php endif ?>
		</div>
		<?php if (is_front_page() || is_singular()): ?>
			<div class="area-busca">
				<a href="#ficha-tecnica" data-target="#ficha-tecnica" class="bt-ficha abre-modal">Ficha técnica</a>
				<?php get_search_form(); ?>
			</div>
		<?php endif ?>
	</div>
</header>

	<?php 
		$idcolecao = tainacan_get_collection_id();
		$type_colecao = 'tnc_col_'.$idcolecao.'_item';
		$type_tainacan = 'tainacan-collection';

		if (! is_post_type_archive($type_colecao) && ! is_post_type_archive($type_tainacan) && ! is_404()) {
			breadcrumb(); 
		}
	?>

	<section id="area-home">
