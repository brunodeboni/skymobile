<?php 
ob_start();
session_start();
$_SESSION = array(); // Clears the $_SESSION variable
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Painel de Controle</title>
	<style>
	body{      
		color: #24211D; 
	    font-size: 14px; 
	    font-family:Arial, sans-serif; 
	    background: #FFFAF0;
	}
	#container {
		width: 300px;
		margin:10px auto;
		padding:10px;
		background: #FAEBD7;
		font-weight: bold;
		-webkit-border-radius: 5px;
	    border-radius: 5px;
	}
	input {
		padding: 3px 0;
	}
	.block {
		width:100%;
		margin:auto;
		display:block;
		background: #FFF;
	}
	h1{
		display:block;
		margin-bottom:5px;
		text-align:center;
		padding:10px;
		font-size:16px;
		background: #6AC334;
		color:#FFF;
		-webkit-border-radius: 5px;
	    border-radius: 5px;
	}
	button {
		padding:10px 30px;
	    background:#6AC334;
	    color: #FFF;
	    font-weight: bold;
	    text-decoration: none;
	    	
	    border: 0;
	    -webkit-border-radius: 5px;
	    border-radius: 5px;
	}
	.clear {
		clear:both;
	}
	#erro {
		margin-top: 10px;
		font-weight: bold;
		color: red;
	}
	
	</style>
</head>
<body>
<div id="container">
	<h1>Painel de Controle</h1>
	<div id="form">
		<br class="clear">
		<form action="" method="post" id="form_login">

		<span class="login">Login</span>:<br>
		<input type="text" name="login" id="login" maxlength="50" class="block"><br>

		<span class="senha">Senha</span>:<br/>
		<input type="password" name="senha" id="senha" maxlength="50" class="block">

		<!-- [Display:Block] -->
		<br class="clear">
		<button type="submit">Entrar</button>
		
		</form>
	</div>

<?php


// Verifica se um formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Salva duas variáveis com o que foi digitado no formulário
	// Detalhe: faz uma verificação com isset() pra saber se o campo foi preenchido
	$user = (isset($_POST['login'])) ? $_POST['login'] : '';
	$password = (isset($_POST['senha'])) ? $_POST['senha'] : '';
	
	$login = 'admin';
	$senha = 'sigma2013';

	if ($user == $login && $password == $senha) {
		session_start();
		$_SESSION['487usuario'] = true;
		
		// O usuário e a senha digitados foram validados, manda pra página interna
		header("Location: aprova_cadastro.php");
	} else {
		// O usuário e/ou a senha são inválidos, manda de volta pro form de login
		echo '<div id="erro">
				Usu&aacute;rio ou senha inv&aacute;lidos.
			</div>';
	}

}
?>

</div>
</body>
</html>
