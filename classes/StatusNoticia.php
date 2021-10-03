<?php 

class StatusNoticia{

    private $idStatusNoticia;
    private $descNoticia;

    public function getidStatusNoticia(){
        return $this->idStatusNoticia;
    }

    public function getdescNoticia(){
        return $this->descNoticia;
    }

    public function setidStatusNoticia($id){
        $this->idStatusNoticia = $id;
    }

    public function setdescNoticia($desc){
      $this->descNoticia = $desc;

}

public function cadastrar($StatusNoticia){
    $conexao = Conexao::pegarConexao();
    
    $stmt = $conexao->prepare("INSERT INTO tbstatusnoticia
                                 (descStatusNoticia)
                                 VALUES(?)");

    $stmt->bindValue(1, $StatusNoticia->getdescNoticia());
    $stmt->execute();

    return 'Cadastro realizado com sucesso';
}
public function listar(){
    $conexao = Conexao::pegarConexao();
    $querySelect = " select  idStatusNoticia,descStatusNoticia from tbstatusnoticia";
    $resultado = $conexao->query($querySelect);
    $lista = $resultado->fetchAll();
    return $lista;
}
}
