<?php

if (isset($_POST['ref_code'])) {
    
    $id_usuario = $_POST['id_usuario'];

    $item2 = $_POST['itemDescription2'];
    $quantidade2 = $_POST['itemQuantity2'];
    $valor2 = $_POST['itemAmount2'];
    $valor_total = $valor2;

    if(isset($_POST['itemDescription1'])) {
        $item1 = $_POST['itemDescription1'];
        $valor1 = $_POST['itemAmount1'];
        $valor_total = (int) $valor2 + (int) $valor1; //Substitui valor definido acima
        $valor_total .= '.00';
    }else {
        $item1 = null;
        $valor1 = null;
    }

    $nome_cliente = $_POST['empresa'];
    $email_cliente = $_POST['email'];
    $telefone = decode_telefone($_POST['telefone']);
    $ddd_cliente = substr($telefone, 0, 2);
    $telefone_cliente = substr($telefone, 2);
    $cnpj_cliente = $_POST['cnpj'];

    $ref_code = $_POST['ref_code'];

    $db = new PDO('mysql:host=mysql.centralsigma.com.br;dbname=mobile_provider',
                	'webadmin', 'webADMIN',
                	array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $sql = "insert into pagamento (id_usuario, ref_code, item1, valor1, item2, quantidade2, valor2, total, status_pagamento)
        values (:id_usuario, :ref_code, :item1, :valor1, :item2, :quantidade2, :valor2, :total, 'Pendente')";
    $query = $db->prepare($sql);
    $success = $query->execute(array(
        ':ref_code' => $ref_code,
        ':id_usuario' => $id_usuario,
        ':item1' => $item1,
        ':valor1' => $valor1,
        ':item2' => $item2,
        ':quantidade2' => $quantidade2,
        ':valor2' => $valor2,
        ':total' => $valor_total
    ));

    if ($success) {
        require_once "../apis/PagSeguroLibrary/PagSeguroLibrary.php";

        // Instantiate a new payment request
        $paymentRequest = new PagSeguroPaymentRequest();

        // Sets the currency
        $paymentRequest->setCurrency("BRL");

        // Add an item for this payment request
        //$paymentRequest->addItem('0001', 'Notebook prata', 2, 430.00);
        if (isset($_POST['itemDescription1'])) {
            $item1 = $_POST['itemDescription1'];
            $quantidade1 = $_POST['itemQuantity1'];
            $valor1 = $_POST['itemAmount1'];
            $paymentRequest->addItem('001', $item1, $quantidade1, $valor1);
        }
        $paymentRequest->addItem('002', $item2, $quantidade2, $valor2);

        // Sets a reference code for this payment request, it is useful to identify this payment in future notifications.
        //$paymentRequest->setReference("REF123");
        $paymentRequest->setReference($ref_code);

        // Sets your customer information.
        //$paymentRequest->setSender('João Comprador', 'comprador@s2it.com.br', '11', '56273440', 'CPF', '156.009.442-76');
        $paymentRequest->setSender($nome_cliente, $email_cliente, $ddd_cliente, $telefone_cliente, 'CNPJ', $cnpj_cliente);

        // Sets the url used by PagSeguro for redirect user after ends checkout process
        $paymentRequest->setRedirectUrl("http://www.skymobile.com.br");

        // Another way to set checkout parameters
        $paymentRequest->addParameter('notificationURL', 'http://www.skymobile.com.br/userpanel/statuspagamento.php');
        if (isset($_POST['itemDescription1'])) {
            $paymentRequest->addIndexedParameter('itemId', '002', 3);
            $paymentRequest->addIndexedParameter('itemDescription', $item1, 3);
            $paymentRequest->addIndexedParameter('itemQuantity', $quantidade1, 3);
            $paymentRequest->addIndexedParameter('itemAmount', $valor1, 3);
        }
        $paymentRequest->addIndexedParameter('itemId', '002', 3);
        $paymentRequest->addIndexedParameter('itemDescription', $item2, 3);
        $paymentRequest->addIndexedParameter('itemQuantity', $quantidade2, 3);
        $paymentRequest->addIndexedParameter('itemAmount', $valor2, 3);

        try {
                /*
                * #### Crendencials #####
                * Substitute the parameters below with your credentials (e-mail and token)
                * You can also get your credentails from a config file. See an example:
                * $credentials = PagSeguroConfig::getAccountCredentials();
                 */
                $credentials = new PagSeguroAccountCredentials("suporte@lojamodelo.com.br", "your_token_here");
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

        
    }else {
        echo 'Mensagem de erro!';
    }
}

    function decode_telefone($telefone){
            $telefone = trim($telefone);
            if($telefone=="") return "";
            $nums = "0123456789";

            $numsarr = str_split($nums);
            $telsarr = str_split($telefone);

            $novo_telefone = "";

            foreach($telsarr as $tel){
                $ex = false;
                foreach($numsarr as $num){
                    if($tel == $num){
                        $ex = true;
                        break;
                    }
                }

                if($ex) $novo_telefone .= $tel;
            }

            return $novo_telefone;
        }
?>