<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./CSS/style.css">
    <title>Noticias</title>
</head>

<body>
    <?php
    require_once('./global.php');
    ?>
    <header>
        <h1><a href="index.php">Winx Portal de Noticias</a></h1>
        <form method="post" action="valida-usuario.php">
            <div>
                <label>Login</label>
                <input type="text" name="tLogin" placeholder="Digite Seu Login">
            </div>
            <div>
                <label>senha</label>
                <input type="password" name="tSenha" placeholder="Digite Sua Senha">

                <input type="submit" value="Entrar" id="btn">
            </div>
        </form>
    </header>
    <section>
        <ul>
            <li class="cat1">Pandemia</li>
            <li class="cat2">cientifico</li>
            <li class="cat3">Politica</li>
            <li class="cat4">Esportes</li>
            <li class="cat5">Saúde</li>
            <li class="cat6">Tecnologia</li>
            <li class="cat7">Educação</li>
            <li class="cat8">Celebridades</li>
        </ul>
    </section>

    <main>
        <?php $noticias = new Noticia();
        $listaNoticias = $noticias->listar();

        foreach ($listaNoticias as $noticia) {
        ?>
            <div class="noticia">
                <h1><?php echo $noticia['tituloNoticia'];  ?></h1>
                <h2><?php echo $noticia['subTituloNoticia'];  ?></h2>
                <div class="descs">
                    <h3><?php echo $noticia['descCategoria'];  ?></h3>
                    <h3 style="color:gray"><?php echo $noticia['descStatusNoticia'];  ?></h3>
                </div>
                <img id="imgs" src=<?php echo $noticia['fotoNoticia'];  ?>>
                <div class="text">
                    <p><?php echo $noticia['textoNoticia'];  ?></p>
                    <p>Autor(a):<?php echo $noticia['nomeReporter'];  ?></p>
                </div>
            </div>
        <?php } ?>
    </main>
    <footer>
        <h1 class="footer-titulo">Desenvolvido por:
            <p>Alanis Emanuela Amanda Ornelas Vitoria Rodrigues</p>
        </h1>
    </footer>
</body>

</html>