<?php
// Activer l'affichage des erreurs pour faciliter le debogage
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Inclusion du fichier de fonctions - Le nom de la fonction "include" etait incorrect dans l'original ("includ")
include 'inc/inc.functions.php'; 
?>
<!DOCTYPE HTML>
<!--
	Story by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Story by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

		<?php 
		// Inclusion du fichier inc.css.php pour importer les styles CSS de la page
		include 'inc/inc.css.php'; 
		?>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
		<div id="wrapper" class="divided">

			<?php
			// Verification si la cle 'page' existe dans la superglobale $_GET
			// Correction : utilisation de array_key_exists (au lieu de array_key_exist) qui est la fonction correcte pour verifier l'existence d'une cle dans un tableau
			getPagesTemplate(
				array_key_exists('page', $_GET) ? $_GET['page'] : null
			);
			?>

			<?php 
			// Inclusion du fichier du pied de page (footer)
			include 'inc/tpls-footer.php'; 
			?>
		</div>

		<?php 
		// Inclusion des fichiers JavaScript - Correction de l'erreur "includes" en "include"
		include 'inc/inc.js.php'; 
		?>

	</body>
</html>

