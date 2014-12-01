<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		html{
			height: 90%;
			background:url(<?=IMG?>img/error404.png) center no-repeat, #d02e10;
			background-size: 50%;
		}

		@media all and (max-width : 700px){
			html{
				background-size: 80%;
			}
		}

		.opt{
			padding: 25px;
			margin: 0 auto;
			left: 20%;
			height: 40%;
			width: 60%;
			top: 22%;
			position: absolute;
			background: rgba(191, 46, 16,.3);
		border-radius: 30px;
			max-width: 96%;
			max-height: 90%;
		}

		button{
			padding: 20px;
			margin: 10px;
			text-transform: uppercase;
			background: rgba(191, 46, 16,.8);
			border:1px solid rgba(191, 46, 16,.9);
			cursor: pointer;
		}

		button:hover{
			background: rgba(191, 46, 16,1);
			color: white;
		}

		a{
			padding: 20px;
			margin: 10px;
			text-decoration: none;
			color: white;
			text-transform: uppercase;
			background: rgba(191, 46, 16,.3);
		}

		h1{
			padding-top: 5%;
			color: gold;
			text-transform: uppercase;
			text-align: center; 
		}
	</style>
</head>
<body>

	<div class="opt" align="center">
		<h1>te escapaste del camino, deseas volver ?</h1>
		<button onclick="javascript:window.history.back();">VOLVER A LA PAGINA ANTERIOR</button>
		<a href="<?=BASE_PATH;?>">IR A LA PAGINA PRINCIPAL</a>
	</div>

</body>
</html>