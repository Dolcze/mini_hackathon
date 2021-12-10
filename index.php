<?php
include_once("header.php");
?>


    <div class="main">
      <div class="instruction">
        <div class="instructions_left">
          <img class="img_instruction"src="phone_barcode.png" alt="scanning_barcode_with_phone">
        </div>
        <div class="instructions_right">
            <h1>Wykonaj telefonem zdjęcie</h1>
        </div>
      </div>


      <form class="form" action="inc/upload.inc.php" method="post" enctype="multipart/form-data">
        <input type="file" accept="image/*" name="fileToUpload" id="fileToUpload" capture>
        <input type="submit" value="Upload Image" name="submit">
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
      </form>

    <!-- <form action="inc/db_test.inc.php" method="post" enctype="multipart/form-data">
      <input type="submit" value="test" name="test_db_connection">
    </form> -->

  <?php
  include_once("footer.php");
  ?>
