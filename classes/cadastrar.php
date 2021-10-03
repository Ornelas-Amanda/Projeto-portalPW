<?php


require_once ('../Global/global.php');

// spl_autoload_register('carregarClasse');

// function carregarClasse($nomeClasse){
//     if(file_exists('classes/'.$nomeClasse.'.php')){
//         require_once 'classes/'.$nomeClasse.'.php';
//     }
// }


try{
header("Location:../index.php");

$reporter = new reporter();
$noticia = new noticia();


$reporter->setNomeReporter($_POST['txtNome']);
$reporter->setCpfReporter($_POST['txtCpf']);
$reporter->setEmailReporter($_POST['txtEmail']);

$noticia->settituloNoticia($_POST['txttitulo']);
$noticia->setsubtituloNoticia($_POST['txtSubTitulo']);
$noticia->setdtNoticia($_POST['txtdata']);
$noticia->settextoNoticia($_POST['textoNoticia']);
$noticia->setidCategoria($_POST['idCategoria']);
$noticia->setidStatusNoticia($_POST['idStatusNoticia']);
$noticia->setidReporter($_POST['idReporter']);

$nomeImg = $_FILES['imgNoticia']['name'];
$imgNoticia = $_FILES['imgNoticia']['tmp_name'];

$caminhoImg = "./Imagens/".$nomeImg;
$caminhoFun = "../Imagens/".$nomeImg;

 move_uploaded_file($imgNoticia, $caminhoFun);



$noticia->setfotoNoticia($caminhoImg);

echo $reporter->cadastrar($reporter);
echo $noticia->cadastrar($noticia);

}
catch(Exception $e){
    echo'<pre>';
    print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}
?>