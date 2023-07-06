<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php get_bloginfo( 'charset' ) ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	
	<?php  if ( is_singular() && pings_open( get_queried_object() ) ) :  ?>
		<link rel="pingback" href="<?php get_bloginfo( 'pingback_url' ) ?>">
	<?php endif; ?>

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header id="cabecalho" <?php if (! is_front_page() && ! is_singular()) : ?> class="simples" <?php endif; ?>>
	<div class="opiniao">
		<div class="max-large">
			<p>Sugestões e críticas? Deixe sua avaliação sobre o acervo <a href="https://forms.gle/2fCBNtPNNLHTAQ7a9" target="blank">neste formulário!</a></p>
		</div>
	</div>
	<div class="max-large margin-one-column conteudo-cabecalho">
		<div class="area-logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-ciar-top.svg" alt="Logo Publica Ciar"></a>
			<h1>Acervo de imagens produzidas pela equipe de publicação do <strong>CIAR UFG</strong></h1>
		</div>
		<div class="area-busca">
			<a href="#ficha-tecnica" data-target="#ficha-tecnica" class="bt-ficha abre-modal">Ficha técnica</a>

			<?php if (is_front_page() || is_singular()) : ?>

			<?php get_search_form(); ?>

			<div class="exemplos">Veja também <a href="<?php echo esc_url( home_url( '/tipo/ilustracao/' ) ); ?>">ilustrações</a>, <a href="<?php echo esc_url( home_url( '/tipo/fotografia/' ) ); ?>">fotografias</a>, <a href="<?php echo esc_url( home_url( '/tipo/mapa/' ) ); ?>">mapas</a> e <a href="<?php echo esc_url( home_url( '/tipo/infografico/' ) ); ?>">infográficos</a>, ou acesse nosso <strong><a href="<?php echo esc_url( home_url( '/acervo' ) ); ?>">acervo completo</a></strong>.</div>

			<?php endif; ?>

		</div>
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
