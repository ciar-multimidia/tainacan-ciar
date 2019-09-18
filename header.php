<?php echo '<!DOCTYPE html>';
echo '<html'; language_attributes(); echo '>';
echo '<head>';
	echo '<meta charset="'.get_bloginfo( 'charset' ).'">';
	echo '<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">';
	echo '<meta http-equiv="X-UA-Compatible" content="ie=edge">';
	if ( is_singular() && pings_open( get_queried_object() ) ) : 
		echo '<link rel="pingback" href="'.get_bloginfo( 'pingback_url' ).'">';
	endif;
	wp_head();
echo '</head>';
echo '<body '; body_class(); echo '>';

echo '<header id="cabecalho">';
	echo '<div class="max-large margin-one-column'; if (! is_front_page() && ! is_singular()) { echo ' centralizado'; } echo '">';
		echo '<div class="area-logo">';
			echo '<a href="'.esc_url( home_url( '/' ) ).'"><img src="'.get_stylesheet_directory_uri().'/img/logo-ciar-top.svg" alt="Logo Publica Ciar"></a>';
			if (is_front_page() || is_singular()) { 
				echo '<h1>Acervo de imagens produzidas pela equipe de publicação do <strong>CIAR UFG</strong></h1>';
				} elseif(!is_singular()) {
				echo '<a href="#" class="bt-ficha">Ficha técnica</a>';
			}
		echo '</div>';
		if (is_front_page() || is_singular()) {
			echo '<div class="area-busca">';
				echo '<a href="#ficha-tecnica" data-target="#ficha-tecnica" class="bt-ficha abre-modal">Ficha técnica</a>';
				get_search_form();

				echo '<div class="exemplos">Veja também <a href="'.esc_url( home_url( '/tipo/ilustracao/' ) ).'">ilustrações</a>, <a href="'.esc_url( home_url( '/tipo/fotografia/' ) ).'">fotografias</a>, <a href="'.esc_url( home_url( '/tipo/mapa/' ) ).'">mapas</a> e <a href="'.esc_url( home_url( '/tipo/infografico/' ) ).'">infográficos</a>, ou acesse nosso <strong><a href="'.esc_url( home_url( '/acervo' ) ).'">acervo completo</a></strong>.</div>';

			echo '</div>';
		}
	echo '</div>';
echo '</header>';


$idcolecao = tainacan_get_collection_id();
$type_colecao = 'tnc_col_'.$idcolecao.'_item';
$type_tainacan = 'tainacan-collection';

if (! is_post_type_archive($type_colecao) && ! is_post_type_archive($type_tainacan) && ! is_404()) {
	breadcrumb(); 
}
	

echo '<section id="area-home">';
