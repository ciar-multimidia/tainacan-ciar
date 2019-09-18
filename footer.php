<?php 
	echo '</section>';
	
	$marginFooter = '';
	if (is_home() || is_front_page()) {
		$marginFooter = ' style="margin-top:0"';
	}

	echo '<footer class="tainacan-footer"'.$marginFooter.'>';

		// echo '<div class="container-fluid max-large margin-one-column copyleft">';
		// 	get_template_part('inc/disclaimer'); 
		// echo '</div>';
	
		echo '<div class="container-fluid max-large margin-one-column creditos">';
			echo '<div class="tainacan">';
				echo '<p>Tecnologia <a href="https://wordpress.org/" target="_blank" rel="noopener">Wordpress</a> e</p>';
				echo '<a href="https://tainacan.org/" target="_blank" rel="noopener"><img src="'.get_stylesheet_directory_uri().'/img/logo-tainacan.svg" alt="Tainacan logo"></a>';
			echo '</div>';

			echo '<div class="marcas">';
				echo '<img src="'.get_stylesheet_directory_uri().'/img/logo-ciar.svg" alt="">';
				echo '<img src="'.get_stylesheet_directory_uri().'/img/logo-br.svg" alt="">';
			echo '</div>';
		echo '</div>';

	echo '</footer>';

	get_template_part('inc/ficha');

wp_footer();
echo '</body>';
echo '</html>';
