<?php 
echo '<div class="aviso-copyright"'; 
	if (is_home() || is_front_page()) { echo ' id="aviso-popup"'; }
echo '>'; 
	echo '<p>As imagens dispostas aqui podem ser usadas e compartilhadas por terceiros, inclusive em sala de aula e pesquisas acadêmicas, desde que acompanhadas dos créditos do Ciar UFG. A distribuição é gratuita e o uso comercial proibido.</p><button class="btn btn-outline-dark">Entendi</button>';
echo '</div>';