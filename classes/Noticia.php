<?php

class Noticia{

    private $idNoticia;
    private $tituloNoticia;
    private $subTituloNoticia;
    private $textoNoticia;
    private $dtNoticia;
    private $fotoNoticia;
    private $idCategoria;
    private $idstatusNoticia;
    private $idReporter;
    
    public function getidNoticia(){
        return $this->idNoticia;
    }
    public function gettituloNoticia(){
        return $this->tituloNoticia;
    }
    public function getsubTituloNoticia(){
        return $this->subTituloNoticia;
    }
    public function gettextoNoticia(){
        return $this->textoNoticia;
    }
    public function getdtNoticia(){
        return $this->dtNoticia;
    }
    public function getfotoNoticia(){
        return $this->fotoNoticia;
    }
    public function getidCategoria(){
        return $this->idCategoria;
    }
    public function getidstatusNoticia(){
        return $this->idstatusNoticia;
    }
    public function getidReporter(){
        return $this->idReporter;
    }
    
    public function setidNoticia($id){
       $this->idNoticia =$id;
    }
    public function settituloNoticia($titulo){
       $this->tituloNoticia =$titulo;
    }
    public function setsubTituloNoticia($subtitulo){
       $this->subTituloNoticia =$subtitulo;
    }
    public function settextoNoticia($texto){
       $this->textoNoticia =$texto;
    }
    public function setdtNoticia($dtNoticia){
        $this->dtNoticia =$dtNoticia;
     }
    public function setfotoNoticia($fotoNoticia){
        $this->fotoNoticia =$fotoNoticia;
     }
     public function setidCategoria($idCategoria){
         $this->idCategoria=$idCategoria;
     }

     public function setidstatusNoticia($idstatusNoticia){
         $this->idstatusNoticia = $idstatusNoticia;
     }
     public function setidReporter($idReporter){
         $this->idReporter = $idReporter;
     }

    public function cadastrar($noticia){
        $conexao = Conexao::pegarConexao();
        
        $stmt = $conexao->prepare("INSERT INTO tbnoticia 
        (tituloNoticia, subTituloNoticia,textoNoticia,dtNoticia,fotoNoticia,idCategoria,idStatusNoticia,idReporter)
                                     VALUES(?,?,?,?,?,?,?,?)");

        $stmt->bindValue(1, $noticia->gettituloNoticia());
        $stmt->bindValue(2, $noticia->getsubTituloNoticia());
        $stmt->bindValue(3, $noticia->gettextoNoticia());
        $stmt->bindValue(4, $noticia->getdtNoticia());
        $stmt->bindValue(5, $noticia->getfotoNoticia());
        $stmt->bindValue(6, $noticia->getidCategoria());
        $stmt->bindValue(7, $noticia->getidstatusNoticia());
        $stmt->bindValue(8, $noticia->getidReporter());
        $stmt->execute();

        return 'Cadastro realizado com sucesso';
    }

    public function listar(){
        $conexao = Conexao::pegarConexao();
        $querySelector = "SELECT idNoticia, tituloNoticia, subTituloNoticia, textoNoticia, dtNoticia AS dataPublicacaoNoticia, fotoNoticia, descCategoria, descStatusNoticia, nomeReporter FROM tbnoticia 
        INNER JOIN tbcategoria ON tbnoticia.idCategoria = tbcategoria.idcategoria
        INNER JOIN tbstatusnoticia ON tbnoticia.idStatusNoticia = tbstatusnoticia.idStatusNoticia
        INNER JOIN tbreporter ON tbnoticia.idReporter = tbreporter.idReporter
        ORDER BY idNoticia";

        $resultado = $conexao->query($querySelector);
        $lista = $resultado->fetchAll();
        return $lista;
    }
}