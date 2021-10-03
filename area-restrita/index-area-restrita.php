<?php
    require_once('../Global/global.php');
    include_once("sentinela.php");
    ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../CSS/styleArea-R.css">
    <title>Noticias</title>
</head>

<body>
    
    <header>
        <h1><a href="../index.php">Winx Portal de Noticias</a></h1>
        <p><a href="../logout.php">Sair</a></p>
    </header>
    <main>
        <h1>Cadastrando Materia</h1>
        <section>
            <?php
            try {
            $statusNoticia = new StatusNoticia();
            $categoria = new Categoria();
            $noticia = new Noticia();
            $reporter = new Reporter();
            

            $idReporter = count($reporter->listar())+1;

            $listaStatus = $statusNoticia->listar();
            $listaCategoria = $categoria->listar();
            $listaNoticia = $noticia->listar();

            } catch (Exception $e) {
                echo '<pre>';
                print_r($e);
                echo '</pre>';
                echo $e->getMessage();
            }

            ?>
            <form method="POST" action="../classes/cadastrar.php" enctype="multipart/form-data"> 
                <article class="caixa1">
                    <div>
                        <h1>Categoria</h1>
                        <select name="idCategoria">
                        <?php foreach($listaCategoria as $linha){  ?>

                            <option value= <?php echo $linha['idCategoria'] ?>>
                            <?php echo $linha['descCategoria'] ?>
                            </option>
                        <?php } ?>
                        </select>
                    </div>
                    <div>
                        <h1>Status da noticia</h1>
                        <select name="idStatusNoticia">
                        <?php foreach($listaStatus as $linha){  ?>

                            <option value= <?php echo $linha['idStatusNoticia'] ?>>
                            <?php echo $linha['descStatusNoticia'] ?>
                            </option>
                        <?php } ?>
                        </select>
                    </div>
                </article>
                <article class="caixa2">
                    <h1>Cadastrando Reporter</h1>
                    <div>
                    <input type="hidden" name="idReporter" value="
                        <?php echo $idReporter; 
                            ?>">
                        <label>Nome</label>
                        <input type="text" name="txtNome">
                        <label>CPF</label>
                        <input type="text" name="txtCpf">
                        <label>Email</label>
                        <input type="Email" name="txtEmail">
                    </div>

                    <h1>Cadastrando Noticia</h1>

                    <label>Titulo</label>
                    <input type="text" name="txttitulo">
                    <label>SubTitulo</label>
                    <input type="text" name="txtSubTitulo">
                    <div>
                        <label>Data de publição</label>
                        <input type="date" name="txtdata">
                        <label>Foto da noticia</label>

                        <input type="file" id="imgNoticia" name="imgNoticia">

                    </div>
                    <label>Noticia:</label>
                    <textarea id="textoNoticia" name="textoNoticia" rows="28" cols="150"></textarea>
                </article>
                <input type="submit" value="Enviar" class="btn">
            </form>
        </section>
    </main>
</body>
<footer>
    <h1 class="footer-titulo">Desenvolvido por:
        <p>Alanis Emanuela Amanda Ornelas Vitoria Rodrigues</p>
    </h1>
</footer>

</html>