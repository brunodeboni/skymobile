<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Mobile Provider</title>
	
	<link rel="stylesheet" type="text/css" href="css/default.css">
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script src="plugins/bxslider/jquery.bxslider.min.js"></script>
	<link href="plugins/bxslider/jquery.bxslider.css" rel="stylesheet">
	
	<link rel="stylesheet" href="plugins/forkit/demo.css">
	<link rel="stylesheet" href="plugins/forkit/forkit.css">
</head>
<body>
<div id="container">
	<div id="content">	
		
		<!-- The contents (if there's no contents the ribbon acts as a link) -->
		<div class="forkit-curtain">
			<div class="close-button"></div>
			<h2>Aplicativos Mobile</h2>
			<img class="forkit-img" src="img/header/logo.png" width="200">
			<img class="forkit-img" src="img/footer/redeindustrial.png">
			<img class="forkit-img" src="img/header/logo.png" width="200">
			<img class="forkit-img" src="img/footer/redeindustrial.png">
		</div>

		<!-- The ribbon -->
		<a class="forkit" data-text="Mais apps" data-text-detached="Arraste-me >" href="plugins/forkit/forkit.js"></a>

		<script src="plugins/forkit/forkit.js"></script>
		
		<!-- Cabeçalho -->
		<?php require_once 'header.php';?>
		
		<!-- Conteúdo -->
		<!-- Banner em flash -->
		<object width="1000" height="550" id="img_content" >
        	<param name="movie" value="swf/home.swf"></param>
            <param name="allowFullScreen" value="true"></param>
            <param name="allowscriptaccess" value="always"></param>
            <embed src="swf/home.swf" type="application/x-shockwave-flash" width="1000" height="550" allowscriptaccess="always" allowfullscreen="true"></embed>
		</object>
		<!-- Cadastro/Download -->
		<a id="download" href="cadastro.php"></a>
		
		<!-- Slider -->
		<div id="slider">
			<ul class="bxslider">
				<li><img src="img/home/slider-capa/azul-claro-teste.png" width="950" height="350" style="border: 0;"></li>
				<li><img src="img/home/slider-capa/teste-azul-escuro.png" width="950" height="350" style="border: 0;"></li>
				<li><img src="img/home/slider-capa/teste3.png" width="950" height="350" style="border: 0;"></li>
				<li><img src="img/home/slider-capa/teste4.png" width="950" height="350" style="border: 0;"></li>
				<li><img src="img/home/slider-capa/teste5.png" width="950" height="350" style="border: 0;"></li>
				<li><img src="img/home/slider-capa/teste6.png" width="950" height="350" style="border: 0;"></li>
				<li><img src="img/home/slider-capa/teste7.png" width="950" height="350" style="border: 0;"></li>
				<li><img src="img/home/slider-capa/teste8.png" width="950" height="350" style="border: 0;"></li>
			</ul>	
		</div>
	</div>
	<!-- Rodapé -->
	<?php require_once 'footer.php';?>
</div>

<script>
$(document).ready(function(){
	//Slider
	$('.bxslider').bxSlider({
		slideWidth: 950,
		slideMargin: 5,
		mode: 'horizontal',
		tickerHover: true,
		autoHover: true,
		responsive: false,
		touchEnabled: true,
		controls: false,
		autoControls: true,
		auto: true,
		adaptiveHeight: false,
		pager: true,
		minSlides: 1,
		maxSlides: 1
	});
});
</script>

</body>
</html>