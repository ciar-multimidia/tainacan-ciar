jQuery(document).ready(function($) { 
  //////////////////////////////////////// FANCYBOX
  var abrirFancybox = $('.abre-modal');
  abrirFancybox.on('click', function(event) {
    var thisTarget = $(this).data('target');
    event.preventDefault();
    $.fancybox.open($(thisTarget));
  });



  //////////////////////////////////////// PARA O DOWNLOAD
  var $btDownload = $('#btdownload');
  var textoOriginalBt = $btDownload.text();
  $btDownload.click(function() {
    $( this ).text('Aguarde...');
    $(window).on('focus', function(event) {
      $btDownload.text(textoOriginalBt);
      $(this).off('focus');
    });
  });




  //////////////////////////////////////// SLIDE DE IMAGENS DA HOME
  var $slides_home = $(".wrap");
  var velocidadeSlide = 1;
  var animarEmLoop = function($el, inicial, final, velocidade){
  	$el
  	.prop('posx', inicial)
  	.css({
  		'-webkit-transform': 'translateX('+inicial+'px)',
  			'-ms-transform': 'translateX('+inicial+'px)',
  				'transform': 'translateX('+inicial+'px)'
  	})
  	.animate(
  		{'posx': final},
  		{
  			duration: velocidade,
  			easing: "linear",
  			step: function(now, fx){
  				$(this).css({
  					'-webkit-transform': 'translateX('+now+'px)',
  						'-ms-transform': 'translateX('+now+'px)',
  							'transform': 'translateX('+now+'px)'
  				});
  			},
  			complete: function(){
  				animarEmLoop($el, inicial, final, velocidade);
  			}
  		});
  }
  $slides_home.each(function(index, el) {
  	var $slide = $(el).find(".sub-wrap ul");
  	var $ultimaImgSlide = $slide.children().last();
  	var larguraAnimacao = $ultimaImgSlide.position().left + $ultimaImgSlide.outerWidth();
  	var imagemASerDuplicada = 0;
  	var ultimaImagemASerDuplicada = $slide.children().length-1;
    var larguraDesejadaSlide;
    if (larguraAnimacao < $(window).width()) {
      larguraDesejadaSlide = $(window).width()*2;
    } else{
      larguraDesejadaSlide = larguraAnimacao+$(window).width();
    }
  	var larguraSlide = $slide.children().last().position().left + $slide.children().last().outerWidth();
  	while (larguraSlide < larguraDesejadaSlide){
  		console.log(index, larguraSlide, larguraDesejadaSlide);
  		$slide.append($slide.children().eq(imagemASerDuplicada).clone());
  		larguraSlide = $slide.children().last().position().left + $slide.children().last().outerWidth();
  		if (imagemASerDuplicada === ultimaImagemASerDuplicada) {
  			imagemASerDuplicada = 0;
  		} else{
  			imagemASerDuplicada++;
  		}
  	}
	console.log(index, larguraSlide, larguraDesejadaSlide);

  	var slideReverso = $slides_home.index($(el)) % 2 === 1;
  	var tempoAnimacao = (Math.round((larguraAnimacao/velocidadeSlide)*100)); 

  	var xInicial;
  	var xFinal;

  	if (slideReverso) {
  		xInicial = -larguraAnimacao;
  		xFinal = 0;
  	}

  	else{
  		xInicial = 0;
  		xFinal = -larguraAnimacao;
  	}
  	animarEmLoop($(el).find(".sub-wrap"), xInicial, xFinal, tempoAnimacao);
  });
});  

