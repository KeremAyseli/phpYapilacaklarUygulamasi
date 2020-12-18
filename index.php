<!DOCTYPE html>
<html lang="tr">
<meta charset="UTF-8">
<head>
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet"href="css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title</title>
</head>
<body id="Taşıyıcı" style="background:  no-repeat center center fixed url('./resimler/fog-forest-mountain-world-clouds-158672.jpeg'); overflow: scroll; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size:cover;" class="scrolGizleme" >
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <form action="islem.php" method="post" >

                <input type="text" name="içerik" class="form-control">

                <button type="submit" class="btn btn-primary m-3">Yeni görev ekle</button>

            </form>
        </div>
    </div>
</div >
<script type="text/javascript" src="js/bootstrap.bundle.js"></script>
</body>
<style>
    .scrolGizleme::-webkit-scrollbar{
        display: none;
    }
</style>

<?php

$klasor=glob("YapılacaklarListesi/*");

echo '
<div class="container-fluid">
<div class="row-cols-auto">
<div class="col ">
<div style="max-height: 100%;overflow: scroll;" class="scrolGizleme" >

';

$dosyaAdeti=count($klasor);
for ($i=0;$i<$dosyaAdeti;$i++) {


    $okunanDosya = file_get_contents($klasor[$i]);

    $okunanVeriler = json_decode($okunanDosya);

    echo '



<div class="list-group align-items-center"id="gorevler">
<div class="input-group-text şefaflık input-group-sm m-4"  >

<div class="form-check p-4 m-3 " style="width: 100%;opacity: 0.9" id="işaretAlan">
<form action="silme.php" method="post">
    <input class="form-check-input isaretleme m-3" type="checkbox" id="işaretKutu" onclick="GorevSilme('.$i.')" >
              <p id="p'.$i.'" class="mb-0 isaretlemeYazı ">'.$okunanVeriler->{'icerik'}.'</p>
               
               <input type="hidden" value="'.$okunanVeriler->{'id'}.'" name="silme">
               <button type="submit" class="btn btn-danger">Görevi Sil</button>
               </form>
    </div>
    </div>
    </div>

  
    

';
}echo '<style>
.isaretleme{
 opacity: 1.5;
 height:16vw;
 width: 16vw;
}
.isaretlemeYazı{
color: #0b5ed7;
font-size: 3vw;
opacity: 1.5;
}
.şefaflık{
text-align-all: center;
word-wrap: break-word;
overflow-x: scroll;
opacity: 0.9;
width: 80%;

}
.listeEnfazlaBoyut{
 max-height: 100vw;
 overflow: scroll;
}
</style>
 ';
echo '</div>
</div>
</div>
</div>
<style>
.scrolGizleme::-webkit-scrollbar{
display: none;
}
</style>

<script>
 function GorevSilme(id){
    var x= document.querySelector("#işaretKutu:checked")!==null;
    console.log(x);
    var yazı=document.querySelector("#p"+id);
     if(x==true){
         yazı.style.textDecoration="line-through";
     }
     else {
         yazı.style.textDecoration="none";
     }
}
    

</script>';

?>
