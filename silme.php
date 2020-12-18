<?php

echo $_POST['silme'];

unlink("./YapılacaklarListesi/".$_POST['silme'].".json");

header("Location:anasayfa.php");

?>