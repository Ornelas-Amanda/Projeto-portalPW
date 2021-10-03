<?php

class Categoria{

    private $idCategoria;
    private $descCategoria;

    public function getidCategoria(){
        return $this->idCategoria;
    }

    public function getdescCategoria(){
        return $this ->descCategoria;
    }

    public function setidCategoria($id){
        $this->idCategoria = $id;
    }

    public function setdescCategoria($desc){
        $this->descCategoria = $desc;
    }

   /* public function cadastrar($categoria){
        $conexao = Conexao::pegarConexao();
        $queryInsert = "INSERT INTO tbcategoria (descStatusNoticia)
        VALUES ('" . $categoria->getdescCategoria() . "')";
        $conexao->exec($queryInsert);
        return'Categoria Cadastrada';
    }*/

   public function cadastrar($categoria){
        $conexao = Conexao::pegarConexao();
        
        $stmt = $conexao->prepare("INSERT INTO tbcategoria
                                     (descCategoria)
                                     VALUES(?)");

        $stmt->bindValue(1, $categoria->getdescCategoria());
        $stmt->execute();

        return 'Cadastro realizado com sucesso';
    }


public function listar(){
    $conexao = Conexao::pegarConexao();
    $querySelect = " select idCategoria,descCategoria from tbcategoria";
    $resultado = $conexao->query($querySelect);
    $lista = $resultado->fetchAll();
    return $lista;
}
}