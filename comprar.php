<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
</head>
<body>
<!-- Declaração do formulário -->  
<form method="post" action="/apis/pagamento.php">  
      
    <!-- Campos obrigatórios -->
    <span>Seu e-mail:</span>  
    <input type="text" name="receiverEmail"><br>
      
    <!-- Itens do pagamento (ao menos um item é obrigatório) -->
    <span>Licença:</span>   
    <select id="licenca" name="itemDescription1">
    	<option value="">Selecione...</option>
    	<option value="Licença por Usuário">Licença por Usuário</option>
    	<option value="Licença Ilimitada">Licença Ilimitada</option>
    </select><br>
    
    <span>Quantidade:</span>
    <input type="text" name="itemQuantity1" id="quantidade" value="1"><br>
    
    <span>Valor:</span>
    <div id="valor">Instalação: R$ 500,00</div>
    <input type="hidden" id="itemAmount1" name="itemAmount1" id="itemAmount1" value="500.00"><br>
    
      
    <!-- Código de referência do pagamento no seu sistema (opcional)   
    <input type="hidden" name="reference" value="REF1234">  
      -->
    <!-- Informações de frete (opcionais)  
    <input type="hidden" name="shippingType" value="1">  
    <input type="hidden" name="shippingAddressPostalCode" value="01452002">  
    <input type="hidden" name="shippingAddressStreet" value="Av. Brig. Faria Lima">  
    <input type="hidden" name="shippingAddressNumber" value="1384">  
    <input type="hidden" name="shippingAddressComplement" value="5o andar">  
    <input type="hidden" name="shippingAddressDistrict" value="Jardim Paulistano">  
    <input type="hidden" name="shippingAddressCity" value="Sao Paulo">  
    <input type="hidden" name="shippingAddressState" value="SP">  
    <input type="hidden" name="shippingAddressCountry" value="BRA">  
      --> 
    <!-- Dados do comprador (opcionais)   
    <input type="hidden" name="senderName" value="José Comprador">  
    <input type="hidden" name="senderAreaCode" value="11">  
    <input type="hidden" name="senderPhone" value="56273440">  
    <input type="hidden" name="senderEmail" value="comprador@uol.com.br">  
      -->
    <!-- submit do form (obrigatório) -->  
    <button id="btn">Comprar licença</button> 
  
</form>

<script>

$('#licenca').change(function() {
	if ($(this).val() == "Licença por Usuário") {
		var quantidade = $('#quantidade').val();
		var valor_licenca = quantidade * 5;
		var total = valor_licenca + 500;
		$('#valor').html('Instalação: R$ 500,00 + Licença para '+ quantidade +' Usuário(s): R$ '+ valor_licenca +',00 = R$ '+ total +',00');

		$('#itemAmount1').val(total+'.00');
	}
	if ($(this).val() == "Licença Ilimitada") {
		$('#valor').html('Instalação: R$ 500,00 + Licença Ilimitada: R$ 250,00 = R$ 750,00');
		$('#itemAmount1').val('750.00');
	}
});

$('#quantidade').blur(function() {
	if ($('#licenca').val() == "Licença por Usuário") {
		var quantidade = $('#quantidade').val();
		var valor_licenca = quantidade * 5;
		var total = valor_licenca + 500;
		$('#valor').html('Instalação: R$ 500,00 + Licença para '+ quantidade +' Usuário(s): R$ '+ valor_licenca +',00 = R$ '+ total +',00');

		$('#itemAmount1').val(total+'.00');
	}
});

</script>

</body> 
</html>