<!doctype html>
<html>
<head>
	<meta charset="utf-8">
        <link rel="stylesheet" href="default.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <style>
            #container {
                width: 900px;
            }
        </style>
</head>
<body>
    <div id="container">
        <h1>Compra de Licenças</h1>
        <!-- Declaração do formulário -->
        <form method="post" action="pagamento.php">
            <p>Escolha abaixo entre os diferentes tipos de licença SIGMA Android e faça o pagamento usando o PagSeguro do UOL:</p><br>

            <?php
            $user = 'henrique';
            //$user = $_SESSION['487usuario']['name'];
            
            $db = new PDO('mysql:host=mysql.centralsigma.com.br;dbname=mobile_provider',
                                'webadmin', 'webADMIN',
                                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $sql = "select id, empresa, cnpj, telefone, email from cadastro where usuario = :user";
            $query = $db->prepare($sql);
            $query->execute(array(':user' => $user));
            $res = $query->fetch();

            $id_usuario = $res['id'];
            $empresa = $res['empresa'];
            $cnpj = $res['cnpj'];
            $telefone = $res['telefone'];
            $email = $res['email'];

            function geraCodigo($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false) {
		$lmin = 'abcdefghijklmnopqrstuvwxyz';
		$lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$num = '1234567890';
		$simb = '!@#$%*-';
		$retorno = '';
		$caracteres = '';

		//$caracteres .= $lmin;
		if ($maiusculas) $caracteres .= $lmai;
		if ($numeros) $caracteres .= $num;
		if ($simbolos) $caracteres .= $simb;

		$len = strlen($caracteres);
		for ($n = 1; $n <= $tamanho; $n++) {
			$rand = mt_rand(1, $len);
			$retorno .= $caracteres[$rand-1];
		}

		return $retorno;
            }


            ?>
            
            <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
            <input type="hidden" name="telefone" value="<?php echo $telefone; ?>">

            <span>Empresa:</span>
            <input type="text" id="empresa" name="empresa" class="block" value="<?php echo $empresa; ?>"><br>

            <span>CNPJ:</span>
            <input type="text" id="cnpj" name="cnpj" class="block" value="<?php echo $cnpj; ?>"><br>

            <!-- Campos obrigatórios -->
            <span>E-mail:</span>
            <input type="text" name="email" class="block" value="<?php echo $email; ?>"><br>
            
            <!-- Itens do pagamento (ao menos um item é obrigatório) -->
            <input type="hidden" name="itemDescription1" value="Instalação e configuração">
            <input type="hidden" name="itemQuantity1" value="1">
            <input type="hidden" name="itemAmount1" value="500.00">

            <span>Licença:</span>
            <select id="licenca" name="itemDescription2" class="block">
                <option value="">Selecione...</option>
                <option value="Licença por Usuário">Licença por Usuário</option>
                <option value="Licença Ilimitada">Licença Ilimitada</option>
            </select><br>

            <span>Quantidade:</span>
            <input type="text" name="itemQuantity2" id="quantidade" class="block" value="1"><br>

            <span>Valor:</span>
            <div id="valor">Subtotal: Instalação e configuração: R$ 500,00</div>
            <input type="hidden" id="itemAmount2" name="itemAmount2" id="itemAmount1" class="block" value=""><br>


            <!-- Código de referência do pagamento no seu sistema (opcional) -->
            <input type="hidden" name="ref_code" value="<?php echo 'REF'.geraCodigo(8, false); ?>">
              
            <!-- submit do form (obrigatório) -->
            <button id="btn" type="submit">Comprar licença</button>

        </form>

<script>

$('#licenca').change(function() {
	if ($(this).val() == "Licença por Usuário") {
                $('#quantidade').removeAttr('disabled');
                
		var quantidade = $('#quantidade').val();
		var valor_licenca = quantidade * 5;
		var total = valor_licenca + 500;
		$('#valor').html('Total: Instalação e configuração: R$ 500,00 + Licença para '+ quantidade +' Usuário(s): R$ '+ valor_licenca +',00 = R$ '+ total +',00');

		$('#itemAmount2').val('5.00');
	}
	if ($(this).val() == "Licença Ilimitada") {
		$('#valor').html('Total: Instalação e configuração: R$ 500,00 + Licença Ilimitada: R$ 250,00 = R$ 750,00');
		$('#itemAmount1').val('750.00');

                $('#quantidade').val('1');
                $('#quantidade').attr('disabled', 'true');
                $('#itemAmount2').val('250.00');
	}
});

$('#quantidade').keypress(function() {
	if ($('#licenca').val() == "Licença por Usuário") {
		var quantidade = $('#quantidade').val();
		var valor_licenca = quantidade * 5;
		var total = valor_licenca + 500;
		$('#valor').html('Total: Instalação e configuração: R$ 500,00 + Licença para '+ quantidade +' Usuário(s): R$ '+ valor_licenca +',00 = R$ '+ total +',00');

		$('#itemAmount2').val('5.00');
	}
});

</script>
    </div>
</body> 
</html>