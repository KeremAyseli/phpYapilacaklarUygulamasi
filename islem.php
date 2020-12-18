<?php

$jsonKayıtEtme=new stdClass();
$jsonKayıtEtme->icerik=$_POST["içerik"];
$jsonKayıtEtme->tarih=date('d.m.y');
$jsonKayıtEtme->id=rastgeleAnahtar();
$jsonDosya=fopen("./YapılacaklarListesi/".$jsonKayıtEtme->id.".json","w+");
fwrite($jsonDosya,json_encode($jsonKayıtEtme));
fclose($jsonDosya);

header("Location:anasayfa.php");
function rastgeleAnahtar(){
    $karakterler="1234567890abcdefghijKLMNOPQRSTuvwxyzABCDEFGHIJklmnopqrstUVWXYZ0987654321";
    $sifre="";
    for($i=0;$i<8;$i++){
        $sifre.=$karakterler{rand()%72};
    }
    return $sifre;
}
?>
