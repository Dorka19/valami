<?php require_once("./nagyreszthtml/DOCKTYPE.html"); ?>

	<link href="./CSS/admin.css" type="text/css" rel="stylesheet">
    <title>Admin | Filmimádók</title>
</head>

<?php require_once("./php/fejlec.php");?>

	<!-- weblap -->
		
	<div class="weblapresz"> <!-- admin navigáció -->
		<ul>
			<li><a href="./nagyreszthtml/filmekfel.htm" target="adminoldalak">Filmek feltöltése</a></li>
			<li><a href="./nagyreszthtml/rendezokfel.htm" target="adminoldalak">Rendezők feltöltése</a></li>
			<li><a href="./nagyreszthtml/szineszekfel.htm" target="adminoldalak">Színészek feltöltése</a></li>
			<li><a href="./nagyreszthtml/kepekfel.htm" target="adminoldalak">Képek feltöltése</a></li>
			<li><a href="./nagyreszthtml/dijakfel.htm" target="adminoldalak">Díjak feltöltése</a></li>
			<li><a href="./nagyreszthtml/kategoriafel.htm" target="adminoldalak">Kategória feltöltése</a></li>
			<li><a href="./nagyreszthtml/nemzetisegfel.htm" target="adminoldalak">Nemzetiség feltöltése</a></li>
		</ul>
		<div class="container">
		<iframe class="responsive-iframe" name="adminoldalak" href="./nagyreszthtml/filmekfel.htm" scrolling="no"></iframe>
		</div>
	</div>

<?php require_once("./nagyreszthtml/Footer.html"); ?>