<!doctype html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
<!-- Declaração do formulário -->  
<form method="post" action="/apis/pagamento.php">  
      
    <!-- Campos obrigatórios -->
    <span>Seu e-mail:</span>  
    <input type="text" name="receiverEmail"><br>
      
    <!-- Itens do pagamento (ao menos um item é obrigatório) -->
    <span>Licença:</span>   
    <select name="itemDescription1">
    	<option value="">Selecione...</option>
    	<option value="Licença por Usuário">Licença por Usuário</option>
    	<option value="Licença Ilimitada">Licença Ilimitada</option>
    </select>
    <input type="text" name="itemDescription1" value="Instalação SIGMA Android"><br>  
    
    <span>Quantidade:</span>
    <input type="text" name="itemQuantity1" value="1"> 
    
    <span>Valor:</span>
    <input type="text" name="itemAmount1" value="500.00"><br>
    
      
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
    <input type="image" name="submit"   
    src="https://p.simg.uol.com.br/out/pagseguro/i/botoes/pagamentos/120x53-pagar.gif"   
    alt="Pague com PagSeguro">  
      
</form> 
</body> 
</html>