<!DOCTYPE html>
<html>
<head>
<title>Mobile Provider: Preços</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/default.css">
    <link rel="stylesheet" type="text/css" href="css/precos.css">
</head>
<body>
    <div id="container">
		<div id="content">
			<!-- Cabeçalho -->
			<?php require_once 'header.php';?>
			
			<!-- Conteúdo -->
			<!-- Banner em flash -->
			<object width="1000" height="550" id="img_content" >
	        	<param name="movie" value="swf/precos.swf"></param>
	            <param name="allowFullScreen" value="true"></param>
	            <param name="allowscriptaccess" value="always"></param>
	            <embed src="swf/precos.swf" type="application/x-shockwave-flash" width="1000" height="550" allowscriptaccess="always" allowfullscreen="true"></embed>
			</object>
			
			<!-- Chamada -->
			<div id="chamada">
				<p>
					<a href="">Crie agora mesmo</a> a sua conta e teste gratuitamente por 30 dias.<br>
					Se o seu período de testes expirou, escolha uma das assinaturas abaixo para continuar usando o Mobile Provider.
				</p> 
			</div>
			
			<!-- Tabela de preços -->
	        <div id="precos-wrapper">
	        	<div id="preco-instalacao">
	            	<div id="preco-instalacao-texto">Instalação e configuração Mobile Provider (Taxa única)</div>
	                <div id="preco-instalacao-valor">
	                	<span>R$</span> &nbsp;&nbsp; <span style="font-size: 35px;">500,00</span>
	                </div>
	            </div>
	                    
	            <div id="mais">+</div>
	                    
	            <div id="preco-assinatura">
	            	<div id="preco-assinatura-usuario">
	                	<div class="preco-assinatura-header">
	                    	<h1 class="preco-assinatura-h">Assinatura por Usuário</h1>
	                        <p class="preco-assinatura-p">Pague pelo número exato de usuários</p>
	                    </div>
	                	<div class="preco-assinatura-content">
	                    	<span>R$ </span> &nbsp; <span style="font-size: 35px;">5,00</span><br>
	                        <span style="font-size: 16px;">por usuário / mês</span>
	                    </div>
	                    <div class="comprar">
	                    	<a href="" class="btn-comprar">Comprar</a>
	                    </div>
	            	</div>
	
	            	<div id="ou">ou</div>
	
		            <div id="preco-assinatura-ilimitada">
		            	<div class="preco-assinatura-header">
		                	<h1 class="preco-assinatura-h">Assinatura Ilimitada</h1>
		                    <p class="preco-assinatura-p">Muitos usuários? Economize muito!</p>
		                </div>
		                <div class="preco-assinatura-content">
		                	<span>R$ </span> &nbsp; <span style="font-size: 35px;">250,00</span><br>
		                    <span style="font-size: 16px;">por mês</span>
		                </div>
		                <div class="comprar">
		                	<a href="" class="btn-comprar">Comprar</a>
		                </div>
		            </div>
	        	</div>
	    	</div>
	    	
	    	<!-- Forma de pagamento e processo de compra -->
	    	<div id="pagamento-wrapper">
	    		<div id="forma-pagamento">
	    			<div class="pagamento-header">Forma de pagamento</div>
	    			<div class="pagamento-texto">
	    				Nossas formas de pagamento são tão flexíveis quanto nosso sistema. O pagamento pode ser realizado mensalmente através de boleto bancário, cartões de crédito ou transferência eletrônica. E tudo isso contando com o sistema de segurança do <img src="img/precos/pagseguro.jpg" height="17">
	    			</div>
	    		</div>
	    		<div id="processo-compra">
	    			<div class="pagamento-header">Processo de Compras</div>
	    			<div class="pagamento-texto">Se sua empresa tem um processo de compras que obrigatoriamente envolve envio de proposta, emissão de pedido ou outros procedimentos internos, entre em contato com o Setor Comercial, que irá lhe fornecer o atendimento necessário. <a href="">Clique aqui</a> e abra um ticket.</div>
	    		</div>
	    	</div>
	    	
	    </div>
	    	
	    <!-- Rodapé -->
		   <?php require_once 'footer.php';?>
 
    </div>

</body>
</html>