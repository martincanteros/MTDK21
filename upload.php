<?php

$arquivo =$_FILES ["arquivo"];
$nome= $arquivo["name"];
$tmp_name= $arquivo["tmp_name"];
$tamanhomax= 2*1024*1024;

if($arquivo["error"]){
    echo "Erro ao enviar arquivo";
    exit;
}

if ($tamanho > $tamanhomax){
    echo "Arquivo muito grande. Tamanho máximo permitido: 2MB";
    exit;
}


$nomeUnico = time() . "_" . $nome;


$destino ="uploads/" . $arquivo["name"];

if(move_uploaded_file($tmp_name, $destino)){


    $texto = "Arquivo" . $nome . "- tamanho". $tamanho . "bytes \n";
    file_put_contents("registros.txt", $texto, FILE_APPEND);

    echo "Nome original: " . $nome . "<br>";
    echo "Nome salvo: " . $nomeUnico;
    echo "Arquivo enviado com sucesso";


    echo " <a href='uploads/" . $nomeUnico . "'> Baixar Arquivo </a>";
    file_put_contents("registros.txt")
}else{
    echo "Erro ao enviar arquivo";
}
