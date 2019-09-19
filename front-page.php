<?php get_header();


if( have_rows('imgslinha1','option') ) { 
echo '<section class="home-acervo">';
	echo '<div class="wrap">';
		echo '<div class="sub-wrap"><ul>';
			while (have_rows('imgslinha1','option')) : the_row();
				$imagem = get_sub_field('imagem');
				$link = get_sub_field('link');
				$tipos = get_sub_field('tipo');
				$areas = get_sub_field('area');
				$tags = get_sub_field('tags');

			echo '<li>'; 
				if($link) { echo '<a href="http://acervoimg.local/acervo/fig-3-jpg/">'; }
					if($imagem) {echo '<img src="'.$imagem['sizes']['medium'].'" alt="'.$imagem['alt'].'">';}
					if($tipos) {
						echo '<mark>';
						foreach ($tipos as $tipo) {
							$term = get_term( $tipo, 'tipo');
							var_dump($term);
						}

						// print_r($tipos);
						echo '</mark>';
					}

					echo '<hgroup><h1>Chi Clayborn</h1>'; 
					echo '<h2>Dewey, broadtail, rotundo</h2></hgroup>';
				if($link) { echo '</a>'; }
			echo '</li>';
			endwhile;
		echo '</ul></div>';
	echo '</div>';
echo '</section>';
}


 get_footer(); ?>
