<?php
include_once("header.php")
?>


<body>
  	<form action="inc/upload.inc.php" method="post" enctype="multipart/form-data">
		<input type="file" accept="image/*" name="fileToUpload" id="fileToUpload" capture>
		<input type="submit" value="Upload Image" name="submit">
	</form>

	<!-- <form action="inc/db_test.inc.php" method="post" enctype="multipart/form-data">
		<input type="submit" value="test" name="test_db_connection">
	</form> -->

	<?php
	
	if (isset($_GET["error"])) {
		if ($_GET["error"] == "decodeError"){
			echo "Nie udało się przeczytać tego kodu kreskowego, postaraj się zrobić wyraźniejsze zdjęcie";
		};
	
		if ($_GET["error"] == "noImg") {
			echo "Proszę wybrać/zrobić zdjęcie";
		}
	}


	?>

<body>


<?php
include_once("footer.php")
?>