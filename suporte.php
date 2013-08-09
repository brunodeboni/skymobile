<!DOCTYPE html>
<html>
<head>
<title>Mobile Provider: Suporte</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/default.css">
    <link rel="stylesheet" type="text/css" href="css/suporte.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">


</script>
</head>
<body>
    <div id="container">
		<div id="content">
			<!-- Cabeçalho -->
			<?php require_once 'header.php';?>
	        
	        <!-- Conteúdo -->
	        <div id="boxes-wrapper">
				<div id="left-wrapper">
			        <!-- FAQ -->
			        <div id="faq">
			        	<div id="faq-title">Perguntas mais lidas</div>
			        	<div id="faq-content">
			        		<div class="faq-questions">
			        			<a href="">Como faço para desvincular minha conta do Skype da minha conta da Microsoft? Como faço para desvincular minha conta do Skype da minha conta da Microsoft?</a>
			        		</div>
			        		<div class="faq-questions">
			        			<a href="">Como faço para desvincular minha conta do Skype da minha conta da Microsoft?</a>
			        		</div>
			        		<div class="faq-questions">
			        			<a href="">Como faço para desvincular minha conta do Skype da minha conta da Microsoft? Como faço para desvincular minha conta do Skype da minha conta da Microsoft?</a>
			        		</div>
			        		<div class="faq-questions">
			        			<a href="">Como faço para desvincular minha conta do Skype da minha conta da Microsoft?</a>
			        		</div>
			        		<div class="faq-questions">
			        			<a href="">Como faço para desvincular minha conta do Skype da minha conta da Microsoft?</a>
			        		</div>
			        		<div class="faq-questions">
			        			<a href="">Como faço para desvincular minha conta do Skype da minha conta da Microsoft?</a>
			        		</div>
			        		<div id="veja-mais"><a href="faq.php">Veja mais perguntas</a></div>
			        	</div>
			        </div>
			        <!-- Botões -->
			        <div id="botoes">
			        	<div id="ticket">
			        		<a href="" class="btn">Abra um ticket de suporte</a>
			        	</div>
			        	<div id="chat">
			        		<a href="" class="btn">Acesse o chat online</a>
			        	</div>
			        </div>
		        </div>
		        <div id="right-wrapper">
			        <!-- Baixar PDF -->
			        <div id="pdf-box">
			        	<a href="">
			        	<img src="img/suporte/pdf.png" width="60">
			        	<span>Baixar o Manual em PDF</span></a>
			        </div>
			        <!-- Vídeo -->
		        	<div id="video-box">
			        	<div id="txt">Vídeo</div>
			        </div>
		        
				</div>
			</div>
	    </div>
	    	
	    <!-- Rodapé -->
		<?php require_once 'footer.php';?>
 
    </div>
<script>
$(document).ready(function() {
	$('.faq-questions a').each(function() {
		if( $(this).html().length > 120) {
			var new_opt = $(this).html().substring(0, 120) + '...';
			//$(this).attr('title', $(this).val());
			$(this).html(new_opt);
		}
	});
	
});
</script>
</body>
</html>
