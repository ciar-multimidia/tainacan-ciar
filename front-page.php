<?php get_header();


if( have_rows('imgslinha1','option') ) { 
echo '<section class="home-acervo">';
	echo '<div class="wrap">';
		echo '<div class="sub-wrap"><ul>';
			while (have_rows('imgslinha1','option')) : the_row();
				$imagem = get_sub_field('imagem');
				$link = get_sub_field('link');
				$tipo = get_sub_field('tipo');
				$area = get_sub_field('area');

			echo '<li>'; 
				if($link) { echo '<a href="'.$link['url'].'">'; }
					echo '<img src="'.$imagem['sizes']['medium'].'" alt="'.$imagem['alt'].'">';
					if($tipo) { echo '<mark>'.$tipo.'</mark>'; }

					echo '<hgroup>'; 
						echo '<h1>'.$imagem['title'].'</h1>';
						if($area) {echo '<h2>'.$area.'</h2>';}
					echo '</hgroup>';
				if($link) { echo '</a>'; }
			echo '</li>';
			endwhile;
		echo '</ul></div>';
	echo '</div>';
echo '</section>';
}


 get_footer(); ?>
