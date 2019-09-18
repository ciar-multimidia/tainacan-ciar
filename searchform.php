<?php 
echo '<form role="search" method="get" class="busca" action="'.esc_url( home_url( '/acervo' ) ).'">';
	echo '<input class="form-control" type="search" name="s" placeholder="'.esc_attr_e( 'Pesquise uma imagem por palavras-chave', 'tainacan-interface' ).'" id="tainacan-search">';
	echo '<button class="btn" type="submit">';
		echo '<i class="tainacan-icon tainacan-icon-search" style="line-height: inherit;"></i>';
	echo '</button>';
echo '</form>';
