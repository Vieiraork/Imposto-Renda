<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="style.css">
	</head>
<body class="fundo">
	<center>
		<div class="container container-fluid p-4 rounded p-4 my-3 border">
<?php
	trim($_POST["salario"]);
	trim($_POST["imposto"]);

	if(empty($_POST["salario"]) || empty($_POST["imposto"])){
		header('Location: index.html');
	}

	class Processa{
		private $minimo;
		private $dependentes;
		private $salario;
		private $imposto;
		public $calculoprevio;
		public $calculoreal;
		
	//-------------------GET e SET-------------------
		function getMinino(){
			return $this->minimo;
		}
		function setMinimo($minimo){
			$this->minimo=$minimo;
		}
		function getDependentes(){
			return $this->dependentes;
		}
		function setDependentes($dependentes){
			$this->dependentes=$dependentes;
		}
		function getSalario(){
			return $this->salario;
		}
		function setSalario($salario){
			$this->salario=$salario;
		}
		function getImposto(){
			return $this->imposto;
		}
		function setImposto($imposto){
			$this->imposto=$imposto;
		}
	//-------------------Validação-------------------
		
		public function calculaImposto($salario, $imposto){
			$this->setSalario($salario);
			$this->setImposto($imposto);
			if($this->getImposto()==0){
				$calculoprevio=0;
			}else{
				$calculoprevio = ($this->getSalario()*$this->getImposto())/100;
			}
			
			if($this->getsalario()<5195){
				$calculoreal = ($this->getSalario())*0;
				if($calculoprevio==$calculoreal){
					echo "Seu imposto continua o mesmo!<br>";
					echo "Valor do imposto R$ ".$calculoreal."<br>";
				}else{
					echo "Seu imposto mudou!<br>";
					echo "Você pagará agora: R$ ".$calculoreal."<br>";
				}
			}else if($this->getSalario()>5194 && $this->getSalario()<12468){
				$calculoreal = ($this->getSalario())*0.08;
				if($calculoprevio==$calculoreal){
					echo "Seu imposto continua o mesmo!<br>";
					echo "Valor do imposto R$ ".$calculoreal."<br>";
				}else{
					echo "Seu imposto mudou!<br>";
					echo "Você pagará agora: R$ ".$calculoreal."<br>";
				}
			}else if($this->getSalario()>12468){
				$calculoreal = ($this->getSalario())*0.20;
				if($calculoprevio==$calculoreal){
					echo "Seu imposto continua o mesmo!<br>";
					echo "Valor do imposto R$ ".$calculoreal."<br>";
				}else{
					echo "Seu imposto mudou!<br>";
					echo "Você pagará agora: R$ ".$calculoreal."<br>";
				}
			}
		}
	}
	//-------------------Criação Objeto-------------------
	$objeto = new Processa();
	
	$objeto->calculaImposto($_POST["salario"], $_POST["imposto"]);
?>
			<a href="index.html"><input type="submit" value="Voltar" class="btn btn-outline-primary"></a>
		</div>
	</center>
</body>
</html>