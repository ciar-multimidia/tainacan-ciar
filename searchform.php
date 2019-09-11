<form role="search" method="get" class="busca" action="<?php echo esc_url( home_url( '/acervo' ) ); ?>">
	<input class="form-control" type="search" name="s" placeholder="<?php esc_attr_e( 'Search', 'tainacan-interface' ); ?>" id="tainacan-search">
	<button class="btn" type="submit">
		<i class="tainacan-icon tainacan-icon-search" style="line-height: inherit;"></i>
	</button>
</form>
