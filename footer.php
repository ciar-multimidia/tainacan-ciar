<?php 
	echo '</section>';
	
	$marginFooter = '';
	if (is_home() || is_front_page()) {
		$marginFooter = ' style="margin-top:0"';
	}

	echo '<footer class="tainacan-footer"'.$marginFooter.'>';

		// echo '<div class="container-fluid max-large margin-one-column copyleft">';
		// 	
		// echo '</div>';
	
		echo '<div class="container-fluid max-large margin-one-column creditos">';
			echo '<div class="tainacan">';
				echo '<p class="creditos-tecnologias">Tecnologia <a href="https://wordpress.org/" target="_blank" rel="noopener">Wordpress</a> e</p>';
				echo '<a href="https://tainacan.org/" target="_blank" rel="noopener" class="link-site-tainacan"><img src="'.get_stylesheet_directory_uri().'/img/logo-tainacan.svg" alt="Tainacan logo"></a>';

				echo '<p class="opiniao">Sugestões e críticas? Deixe sua avaliação sobre o acervo <a href="https://forms.gle/2fCBNtPNNLHTAQ7a9" target="blank">neste formulário!</a></p>';
			echo '</div>';

			echo '<div class="marcas">';
				echo '<img src="'.get_stylesheet_directory_uri().'/img/logo-ciar.svg" alt="">';
				echo '<img src="'.get_stylesheet_directory_uri().'/img/logo-br.svg" alt="">';
			echo '</div>';
		echo '</div>';

		if (is_home() || is_front_page()) { get_template_part('inc/disclaimer'); }

	echo '</footer>';

	get_template_part('inc/ficha');

wp_footer();
echo '</body>';
echo '</html>';
