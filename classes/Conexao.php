<?php

class Conexao{

    public static function pegarConexao(){

        /*Mudar o nome de conexao confrome o nome do banco */
        $conexao = new PDO("mysql:host=localhost;dbname=bdnoticias","root","");

        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexao->exec("SET CHARACTER SET utf8");

        return $conexao;
    }
} 


?>
