<?php get_header();


if ( have_rows( 'home_linha1' ) ):
	echo '<section class="home-acervo">';
		echo '<div class="wrap">';
			echo '<div class="sub-wrap"><ul>';
				while ( have_rows( 'home_linha1' ) ) : the_row();
					$imagem = get_sub_field( 'imagem' );
					$link = get_sub_field( 'link' );
					$tipo = get_sub_field( 'tipo' );
					$area = get_sub_field( 'area' );


				echo '<li>'; 
					echo '<a href="'.($link ? $link : '').'">';
						echo '<img src="'.$imagem['sizes']['large'].'" alt="'.$imagem['alt'].'">';
						echo '<div class="efeito-hover" style="background-image: url('.$imagem['sizes']['large'].')"></div>';
						// if($tipo) { echo '<mark>'.$tipo.'</mark>'; }

						// echo '<hgroup>'; 
							/*echo '<h1>'.$imagem['title'].'</h1>';*/
							// if($area) {echo '<h2>'.$area.'</h2>';}
						// echo '</hgroup>';
					echo '</a>';
				echo '</li>';
				endwhile;
			echo '</ul></div>';
		echo '</div>';
	echo '</section>';
else:
	// no rows found
endif;


if ( have_rows( 'home_linha2' ) ):
	echo '<section class="home-acervo">';
		echo '<div class="wrap">';
			echo '<div class="sub-wrap"><ul>';
				while ( have_rows( 'home_linha2' ) ) : the_row();
					$imagem = get_sub_field( 'imagem' );
					$link = get_sub_field( 'link' );
					$tipo = get_sub_field( 'tipo' );
					$area = get_sub_field( 'area' );

				echo '<li>'; 
					echo '<a href="'.($link ? $link : '').'">'; 
						echo '<img src="'.$imagem['sizes']['large'].'" alt="'.$imagem['alt'].'">';
						echo '<div class="efeito-hover" style="background-image: url('.$imagem['sizes']['large'].')"></div>';

						// if($tipo) { echo '<mark>'.$tipo.'</mark>'; }

						// echo '<hgroup>'; 
							/*echo '<h1>'.$imagem['title'].'</h1>';*/
							// if($area) {echo '<h2>'.$area.'</h2>';}
						// echo '</hgroup>';
					echo '</a>';
				echo '</li>';
				endwhile;
			echo '</ul></div>';
		echo '</div>';
	echo '</section>';
else:
	// no rows found
endif;



if ( have_rows( 'home_linha3' ) ):
	echo '<section class="home-acervo">';
		echo '<div class="wrap">';
			echo '<div class="sub-wrap"><ul>';
				while ( have_rows( 'home_linha3' ) ) : the_row();
					$imagem = get_sub_field( 'imagem' );
					$link = get_sub_field( 'link' );
					$tipo = get_sub_field( 'tipo' );
					$area = get_sub_field( 'area' );

				echo '<li>'; 
					echo '<a href="'.($link ? $link : '').'">'; 
						echo '<img src="'.$imagem['sizes']['large'].'" alt="'.$imagem['alt'].'">';
						echo '<div class="efeito-hover" style="background-image: url('.$imagem['sizes']['large'].')"></div>';
						
						// if($tipo) { echo '<mark>'.$tipo.'</mark>'; }

						// echo '<hgroup>'; 
							/*echo '<h1>'.$imagem['title'].'</h1>';*/
							// if($area) {echo '<h2>'.$area.'</h2>';}
						// echo '</hgroup>';
					echo '</a>';
				echo '</li>';
				endwhile;
			echo '</ul></div>';
		echo '</div>';
	echo '</section>';
else:
	// no rows found
endif;


get_footer(); ?>
