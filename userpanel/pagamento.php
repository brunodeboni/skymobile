<?php

require_once "../apis/PagSeguroLibrary/PagSeguroLibrary.php";

// Instantiate a new payment request
$paymentRequest = new PagSeguroPaymentRequest();

// Sets the currency
$paymentRequest->setCurrency("BRL");

// Add an item for this payment request
//$paymentRequest->addItem('0001', 'Notebook prata', 2, 430.00);
$paymentRequest->addItem($item_id, $item, $quantidade, $valor);
		
// Sets a reference code for this payment request, it is useful to identify this payment in future notifications.
//$paymentRequest->setReference("REF123");
$paymentRequest->setReference($ref_code);

// Sets your customer information.
//$paymentRequest->setSender('João Comprador', 'comprador@s2it.com.br', '11', '56273440', 'CPF', '156.009.442-76');
$paymentRequest->setSender($nome_cliente, $email_cliente, '11', '56273440', 'CPF', '156.009.442-76');

// Sets the url used by PagSeguro for redirect user after ends checkout process
$paymentRequest->setRedirectUrl("http://www.skymobile.com.br");

// Add checkout metadata information
$paymentRequest->addMetadata('PASSENGER_CPF', '15600944276', 1);
$paymentRequest->addMetadata('GAME_NAME', 'DOTA');
$paymentRequest->addMetadata('PASSENGER_PASSPORT', '23456', 1);

// Another way to set checkout parameters
$paymentRequest->addParameter('notificationURL', 'http://www.lojamodelo.com.br/nas');
$paymentRequest->addIndexedParameter('itemId', '0003', 3);
$paymentRequest->addIndexedParameter('itemDescription', 'Notebook Preto', 3);
$paymentRequest->addIndexedParameter('itemQuantity', '1', 3);
$paymentRequest->addIndexedParameter('itemAmount', '200.00', 3);

try {
	/*
	* #### Crendencials #####
	* Substitute the parameters below with your credentials (e-mail and token)
	* You can also get your credentails from a config file. See an example:
	* $credentials = PagSeguroConfig::getAccountCredentials();
	 */
	$credentials = new PagSeguroAccountCredentials("your@email.com", "your_token_here");
	// Register this payment request in PagSeguro, to obtain the payment URL for redirect your customer.
	$url = $paymentRequest->register($credentials);

	printPaymentUrl($url);
	
} catch (PagSeguroServiceException $e) {
	die($e->getMessage());
}

function printPaymentUrl($url) {
	if ($url) {
		echo "<h2>Criando requisi&ccedil;&atilde;o de pagamento</h2>";
		echo "<p>URL do pagamento: <strong>$url</strong></p>";
		echo "<p><a title=\"URL do pagamento\" href=\"$url\">Ir para URL do pagamento.</a></p>";
	}
}

?>