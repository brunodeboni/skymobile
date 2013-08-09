<!DOCTYPE html>
<html>
<head>
<title>Mobile Provider: Conheça</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link type="text/css" rel="stylesheet" href="plugins/bruno-slider/themes/base.css"/>
    <link type="text/css" rel="stylesheet" href="plugins/bruno-slider/themes/default/theme.css"/>
    <link rel="stylesheet" type="text/css" href="css/default.css">
    <link rel="stylesheet" type="text/css" href="css/conheca.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="plugins/bruno-slider/jquery.accessible-news-slider.js"></script>
<script type="text/javascript">
// when the DOM is ready, convert the feed anchors into feed content
$(document).ready(function() {

	$('#slider-passos').accessStories();

});
</script>
</head>
<body>
    <div id="container">
		<div id="content">
			<!-- Cabeçalho -->
			<?php require_once 'header.php';?>
	        
	        <!-- Conteúdo -->
	        <!-- Animação em flash -->
			<object width="1000" height="100" id="android">
		        <param name="movie" value="swf/conheca.swf"></param>
		        <param name="allowFullScreen" value="true"></param>
		        <param name="allowscriptaccess" value="always"></param>
		        <embed src="swf/conheca.swf" type="application/x-shockwave-flash" width="1000" height="100" allowscriptaccess="always" allowfullscreen="true"></embed>
			</object>
	        
	        
	        <!-- Slider passo-a-passo -->
	        <ul id="slider-passos">
	        	<li>
	            	<img src="img/a.jpg" style="display: none;">
	                <h3>Cadastrando sua conta</h3>
	               	<p></p>	
	            </li>
	            <li>
	            	<img src="img/a.jpg" style="display: none;">
	                <h3>Confirmação do cadastro</h3>
	                <p></p>
	             </li>
	             <li>
	             	<img src="img/a.jpg" style="display: none;">
	                <h3>Instalando o aplicativo</h3>
	                <p></p>
	             </li>
	             <li>
	             	<img src="img/a.jpg" style="display: none;">
	                <h3>Modificando o caminho</h3>
	                <p></p>
	             </li>
	             <li>
	                <img src="img/a.jpg" style="display: none;">
	                <h3>Pronto para usar</h3>
	                <p></p>
	             </li>
	         </ul>
			
	    </div>
	    	
	    <!-- Rodapé -->
		<?php require_once 'footer.php';?>
 
    </div>

</body>
</html>
