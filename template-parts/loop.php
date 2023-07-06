<?php 
if ( have_posts() ) :
	echo '<div class="tainacan-title">';
		echo '<div class="border-bottom border-jelly-bean tainacan-title-page">';
			echo '<ul class="list-inline mb-1 d-flex">';
				echo '<li class="list-inline-item text-midnight-blue font-weight-bold title-page">';
					if ( is_home() ) {
						if ( get_option( 'page_for_posts' ) ) :
							echo get_the_title( get_option( 'page_for_posts' ) );
						else :
							_e( 'Blog Posts', 'tainacan-interface' );
						endif;
					} elseif ( is_search() ) {
						_e( 'Search Results for', 'tainacan-interface' );
						echo ' "' , get_search_query(), '"';
					} elseif ( is_archive() ) {
						echo ' ' . get_the_archive_title();
					} 
				echo '</li>';
				echo '<li class="list-inline-item float-right title-back align-self-end ml-auto"><a href="javascript:history.go(-1)">'._e( 'Back', 'tainacan-interface' ).'</a></li>';
			echo '</ul>';
		echo '</div>';
	echo '</div>';

	echo '<div class="mt-5 tainacan-list-post margin-md-two-column">';
		while ( have_posts() ) :
			the_post(); 
			get_template_part( 'template-parts/list-post' ); 
		endwhile;
	echo '</div>';

	echo tainacan_pagination();
	
else : 
	_e( 'Nothing found', 'tainacan-interface' );
endif; 
