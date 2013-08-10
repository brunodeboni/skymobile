<!DOCTYPE html>
<html>
<head>
<title>Mobile Provider: Cadastro de Empresa</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/default.css">
    <link rel="stylesheet" type="text/css" href="css/cadastro.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="plugins/jquery.maskedinput.js"></script>
</head>
<body>
    <div id="container">
		<div id="content">
			<!-- Cabeçalho -->
			<?php require_once 'header.php';?>
			
			<!-- Conteúdo -->
			<!-- Formulário -->
			<div id="formulario">
				<form id="cadastro_empresa" action="" method="post">
					<h1>Cadastre sua Empresa</h1>
					
					<span>Empresa:</span>
					<input type="text" id="empresa" name="empresa" class="block"><br>
					
					<span>CNPJ:</span>
					<input type="text" id="cnpj" name="cnpj" class="block"><br>
					
					<span>Rua:</span>
					<input type="text" id="logradouro" name="logradouro" class="block" placeholder="Ex: Avenida São João"><br>
					
					<span>Número:</span>
					<input type="text" id="nro" name="nro">
					
					<span style="margin-left: 10px;">Complemento:</span>
					<input type="text" id="complemento" name="complemento" size="50"><br><br>
					
					<span>Cidade:</span>
					<input type="text" id="cidade" name="cidade" class="block"><br>
					
					<span>Estado:</span>
					<select id="uf" name="uf" class="block">
                                            <option value="">Selecione...</option>
                                            <option value="AC">Acre</option>
                                            <option value="AL">Alagoas</option>
                                            <option value="AP">Amapá</option>
                                            <option value="AM">Amazonas</option>
                                            <option value="BA">Bahia</option>
                                            <option value="CE">Ceará</option>
                                            <option value="DF">Distrito Federal</option>
                                            <option value="ES">Espírito Santo</option>
                                            <option value="GO">Goiás</option>
                                            <option value="MA">Maranhão</option>
                                            <option value="MT">Mato Grosso</option>
                                            <option value="MS">Mato Grosso do Sul</option>
                                            <option value="MG">Minas Gerais</option>
                                            <option value="PA">Pará</option>
                                            <option value="PB">Paraíba</option>
                                            <option value="PR">Paraná</option>
                                            <option value="PE">Pernambuco</option>
                                            <option value="PI">Piauí</option>
                                            <option value="RJ">Rio de Janeiro</option>
                                            <option value="RN">Rio Grande do Norte</option>
                                            <option value="RS">Rio Grande do Sul</option>
                                            <option value="RO">Rondônia</option>
                                            <option value="RR">Roraima</option>
                                            <option value="SC">Santa Catarina</option>
                                            <option value="SP">São Paulo</option>
                                            <option value="SE">Sergipe</option>
                                            <option value="TO">Tocantins</option>
					</select><br>
					
					<span>Telefone Comercial:</span>
					<input type="text" id="telefone" name="telefone" class="block"><br>
					
					<span>E-mail:</span>
					<input type="text" id="email" name="email" class="block"><br>
					
					<h1>Dados de Usuário</h1>
					
					<span>Usuário:</span> <span class="descricao">Será o usuário administrador da conta da empresa. Não deve conter sinais, acentos, cedilha ou espaços.</span>
					<input type="text" id="usuario" name="usuario" class="block"><br>
					
					<span>Senha:</span>
					<input type="password" id="senha" name="senha" class="block"><br>
					
					<span>Confirme a senha:</span>
					<input type="password" id="confirma" name="confirma" class="block"><br>
					
					<span>Subdomínio para acesso ao aplicativo: </span> <span class="descricao">Não deve conter sinais, acentos, cedilha, maiúsculas ou espaços.</span><br>
					<input type="text" id="subdominio" name="subdominio" placeholder="nomedaempresa">.mobileprovider.com.br<br>
					
					<br>
					<div id="erro"></div>
					
					<button id="btn">Enviar</button>
					
				</form>
				
<script>

$(document).ready(function() {
	$('#cnpj').mask('99.999.999/9999-99');
	$('#telefone').mask('(99) 9999-9999?9');
	$('#nro').mask('?99999999');
	$('#usuario').keyup(function() {
		var newval = valid($(this).val(), 'special');
		$(this).val(newval);
	});
	$('#usuario').blur(function() {
		var newval = valid($(this).val(), 'special');
		$(this).val(newval);
	});
	$('#subdominio').keyup(function() {
		var newval = valid($(this).val(), 'special');
		var novoval = newval.toLowerCase();
		$(this).val(novoval);
	});
	$('#subdominio').blur(function() {
		var newval = valid($(this).val(), 'special');
		var novoval = newval.toLowerCase();
		$(this).val(novoval);
	});
});

//Subsitui caracteres especiais
var r={'special':/[\W]/g};
function valid(o,w){
	o = o.replace(r[w],'');
	return o;
}


$('#btn').click(function() {
	if ($('#empresa').val() == "") {$('#erro').show(); $('#erro').html('Por favor, informe o nome da Empresa.'); return false;}
	if ($('#cnpj').val() == "") {$('#erro').show(); $('#erro').html('Por favor, informe o CNPJ da Empresa.'); return false;}
	if (!validarCNPJ($('#cnpj').val())) {$('#erro').show(); $('#erro').html('Por favor, informe um CNPJ válido.'); return false;}
	if ($('#logradouro').val() == "") {$('#erro').show(); $('#erro').html('Por favor, informe o endereço da Empresa.'); return false;}
	if ($('#nro').val() == "") {$('#erro').show(); $('#erro').html('Por favor, informe o endereço da Empresa.'); return false;}
	if ($('#cidade').val() == "") {$('#erro').show(); $('#erro').html('Por favor, informe a cidade da Empresa.'); return false;}
	if ($('#uf').val() == "") {$('#erro').show(); $('#erro').html('Por favor, informe o estado da Empresa.'); return false;}
	if ($('#telefone').val() == "") {$('#erro').show(); $('#erro').html('Por favor, informe o telefone da Empresa.'); return false;}
	if ($('#email').val() == "" || !checarEmail($('#email').val())) {$('#erro').show(); $('#erro').html('Por favor, informe um endereço de e-mail para contato.'); return false;}

	if ($('#usuario').val() == "") {$('#erro').show(); $('#erro').html('Por favor, crie um usuário administrador.'); return false;}
	if ($('#senha').val() == "") {$('#erro').show(); $('#erro').html('Por favor, crie uma senha.'); return false;}
	if ($('#confirma').val() == "") {$('#erro').show(); $('#erro').html('Por favor, repita a senha.'); return false;}

	if ($('#senha').val() != $('#confirma').val()) {$('#erro').show(); $('#erro').html('As duas senhas cadastradas não conferem.'); return false;}
	
	if ($('#subdominio').val() == "") {$('#erro').show(); $('#erro').html('Por favor, crie um subdomínio para acesso do aplicativo por usa Empresa.'); return false;}

	
	$('#cadastro_empresa').submit();
});

function checarEmail(mail){
	if(mail.length==0) return true;
	
	if ((mail.length > 7) && !((mail.indexOf("@") < 1) || (mail.indexOf('.') < 2)))
		{return true;}
	else
		{return false;}
}

function validarCNPJ(cnpj) {
	 
    cnpj = cnpj.replace(/[^\d]+/g,'');
 
    if(cnpj == '') return false;
     
    if (cnpj.length != 14)
        return false;
 
    // Elimina CNPJs inválidos conhecidos
    if (cnpj == "00000000000000" || 
        cnpj == "11111111111111" || 
        cnpj == "22222222222222" || 
        cnpj == "33333333333333" || 
        cnpj == "44444444444444" || 
        cnpj == "55555555555555" || 
        cnpj == "66666666666666" || 
        cnpj == "77777777777777" || 
        cnpj == "88888888888888" || 
        cnpj == "99999999999999")
        return false;
         
    // Valida DVs
    tamanho = cnpj.length - 2;
    numeros = cnpj.substring(0,tamanho);
    digitos = cnpj.substring(tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(0))
        return false;
         
    tamanho = tamanho + 1;
    numeros = cnpj.substring(0,tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(1))
          return false;
           
    return true;
    
}

</script>

<?php 

if (isset ($_POST['empresa'])) {
	
	$endereco = $_POST['logradouro'].", ".$_POST['nro'];
	
	$usuario = preg_replace('/[^a-z0-9]/i', '', $_POST['usuario']);
	
	if ($_POST['senha'] == $_POST['confirma']) {
		$senha = md5($_POST['senha']);
	}else {
		echo '<div id="erro2">Suas senhas não conferem.</div>';
		exit();
	}
	
	$subdominio = strtolower($_POST['subdominio']);
	$subdominio = preg_replace('/[^a-z0-9]/i', '', $subdominio);
	
	require 'conexoes.inc.php';
	$db = Database::instance('mobile_provider');
    
    $sql = "insert into cadastro 
    	(empresa, cnpj, endereco, email, complemento, cidade, uf, telefone, email, usuario, senha, subdominio, status) 
    	values (:empresa, :cnpj, :endereco, :complemento, :cidade, :uf, :telefone, :email, :usuario, :senha, :subdominio, 0)";
    $query = $db->prepare($sql);
    $success = $query->execute(array(
    	':empresa' => $_POST['empresa'],
    	':cnpj' => $_POST['cnpj'],
    	':endereco' => $endereco,
    	':complemento' => $_POST['complemento'],
    	':cidade' => $_POST['cidade'],
    	':uf' => $_POST['uf'],
    	':telefone' => $_POST['telefone'],
   		':email' => $_POST['email'],
    	':usuario' => $usuario,
    	':senha' => $senha,
    	':subdominio' => $subdominio
    ));
    
    if ($success) {
    	header('obrigado.php');
    	//echo '<div id="sucesso">Cadastro realizado com sucesso.</div>';
    }else {
    	echo '<div id="erro2">Ocorreu um erro ao salvar seus dados. Por favor, tente novamente.</div>';
    }
	
}

?>
			</div>
		</div>
	    	
	    <!-- Rodapé -->
		   <?php require_once 'footer.php';?>
 
    </div>

</body>
</html>
