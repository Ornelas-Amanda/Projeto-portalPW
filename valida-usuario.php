<?php
    $login = $_POST ['tLogin'];
    $senha = $_POST ['tSenha'];

    if(($login == 'adm') && ($senha == '123')){
        session_start();
        $_SESSION ['login-session'] = $login;
        $_SESSION ['senha-session'] = $senha;
        header("Location: area-restrita/index-area-restrita.php");
    }
    else{
        header("Location: index.php");
    }
?>