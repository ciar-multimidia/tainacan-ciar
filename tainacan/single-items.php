<?php get_header();
// get_template_part( 'template-parts/headercollection' );


echo '<main class="mt-5 max-large margin-one-column">';
	echo '<div class="row">';
		echo '<div class="col col-sm mx-sm-auto">';
			if ( have_posts() ) :
				do_action( 'tainacan-interface-single-item-top' );
				while ( have_posts() ) : the_post(); 
						do_action( 'tainacan-interface-single-item-after-title' ); 
						$image_attributes = wp_get_attachment_url(get_post_thumbnail_id());
					
					// echo '<div class="mt-3 tainacan-single-post collection-single-item">';
					echo '<div class="tainacan-single-post collection-single-item">';
						echo '<article role="article" id="post_'.get_the_ID().'"'; post_class('row'); echo '>';

							if ( tainacan_has_document() ) :
								// echo '<h1 class="title-content-items">';
								// 	echo '<a href="'.$image_attributes.'" download>Baixar</a>';
								// echo '</h1>';
								echo '<section class="tainacan-content col-9">';
									echo '<div class="single-item-collection--document">';
										tainacan_the_document();
									echo '</div>';
								echo '</section>';

								echo '<article role="article" class="col-3">';
									echo "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit consequatur qui deserunt iusto nulla accusamus, harum sequi adipisci, ullam aliquid aliquam eum consectetur soluta quam commodi animi aut modi! Veritatis.";
									// echo '<h1 class="title-content-items">'; _e( 'Information', 'tainacan-interface' ); echo '</h1>';
									// echo '<section class="tainacan-content single-item-collection margin-two-column">';
									// 	echo '<div class="single-item-collection--information justify-content-center">';
									// 		echo '<div class="row">';
									// 			echo '<div class="col s-item-collection--metadata">';
									// 				echo '<div class="card border-0">';
									// 					echo '<div class="card-body bg-white border-0 pl-0 pt-0 pb-1">';
									// 					echo '<h3>'; _e( 'Thumbnail', 'tainacan-interface' ); echo '</h3>';
									// 						the_post_thumbnail('tainacan-medium-full', array('class' => 'item-card--thumbnail mt-2'));
									// 					echo '</div>';
									// 				echo '</div>';
													
									// 				do_action( 'tainacan-interface-single-item-metadata-begin' );
													
									// 					$args = array(
									// 						'before_title' => '<div><h3>',
									// 						'after_title' => '</h3>',
									// 						'before_value' => '<p>',
									// 						'after_value' => '</p></div>',
									// 					);
									// 					//$field = null;
									// 					tainacan_the_metadata( $args );
													
									// 				do_action( 'tainacan-interface-single-item-metadata-end' );
									// 			echo '</div>';
									// 		echo '</div>';
									// 	echo '</div>';
									// echo '</section>';
								echo '</article>';


							endif;
						echo '</article>';
					echo '</div>';

					do_action( 'tainacan-interface-single-item-after-document' );
				

					// if ( tainacan_has_document() ) :
						// echo '<div class="tainacan-title my-5"><div class="border-bottom border-silver tainacan-title-page" style="border-width: 1px !important;"></div></div>';
					// endif;

					
					// $attachment = array_values(
					// 	get_children(
					// 		array(
					// 			'post_parent' => $post->ID,
					// 			'post_type' => 'attachment',
					// 			'post_mime_type' => 'image',
					// 			'order' => 'ASC',
					// 			'numberposts'  => -1,
					// 		)
					// 	)
					// );

					// if ( ! empty( $attachment ) ) : 

					// 	echo '<div class="mt-3 tainacan-single-post">';
					// 		echo '<article role="article">';
					// 			echo '<h1 class="title-content-items">'; _e( 'Attachments', 'tainacan-interface' ); echo '</h1>';
					// 			echo '<section class="tainacan-content single-item-collection margin-two-column">';
					// 				echo '<div class="single-item-collection--attachments">';
					// 					foreach ( $attachment as $attachment ) { 
					// 						echo '<div class="single-item-collection--attachments-img">';
					// 							echo '<a href="'.$attachment->guid.'" data-toggle="lightbox" data-gallery="example-gallery">';
					// 								echo wp_get_attachment_image( $attachment->ID, 'tainacan-interface-item-attachments' );
					// 							echo '</a>';
					// 						echo '</div>';
					// 					}
					// 				echo '</div>';
					// 			echo '</section>';
					// 		echo '</article>';
					// 	echo '</div>';

					// 	echo '<div class="tainacan-title my-5"><div class="border-bottom border-silver tainacan-title-page" style="border-width: 1px !important;"></div></div>';

					// endif;

					// do_action( 'tainacan-interface-single-item-after-attachments' );

					// echo '<div class="mt-3 tainacan-single-post">';

					// 	echo '<article role="article">';
					// 		echo '<h1 class="title-content-items">'; _e( 'Information', 'tainacan-interface' ); echo '</h1>';
					// 		echo '<section class="tainacan-content single-item-collection margin-two-column">';
					// 			echo '<div class="single-item-collection--information justify-content-center">';
					// 				echo '<div class="row">';
					// 					echo '<div class="col s-item-collection--metadata">';
					// 						echo '<div class="card border-0">';
					// 							echo '<div class="card-body bg-white border-0 pl-0 pt-0 pb-1">';
					// 							echo '<h3>'; _e( 'Thumbnail', 'tainacan-interface' ); echo '</h3>';
					// 								the_post_thumbnail('tainacan-medium-full', array('class' => 'item-card--thumbnail mt-2'));
					// 							echo '</div>';
					// 						echo '</div>';
											
					// 						do_action( 'tainacan-interface-single-item-metadata-begin' );
											
					// 							$args = array(
					// 								'before_title' => '<div><h3>',
					// 								'after_title' => '</h3>',
					// 								'before_value' => '<p>',
					// 								'after_value' => '</p></div>',
					// 							);
					// 							//$field = null;
					// 							tainacan_the_metadata( $args );
											
					// 						do_action( 'tainacan-interface-single-item-metadata-end' );
					// 					echo '</div>';
					// 				echo '</div>';
					// 			echo '</div>';
					// 		echo '</section>';
					// 	echo '</article>';

					// echo '</div>';

					// do_action( 'tainacan-interface-single-item-after-metadata' );

					
				endwhile;
				do_action( 'tainacan-interface-single-item-bottom' );
			else :
				_e( 'Nothing found', 'tainacan-interface' );
			endif;
		echo '</div>';
	echo '</div>'; // row
echo '</main>';
get_footer();


echo '<script>';
	echo 'jQuery(\'#topNavbar\').addClass(\'b-bottom-top\');';
	echo 'jQuery(\'nav.menu-belowheader\').removeClass(\'border-bottom\');';
	echo 'jQuery(\'nav.menu-belowheader .max-large\').addClass(\'b-bottom-bellow\');';
echo '</script>';
