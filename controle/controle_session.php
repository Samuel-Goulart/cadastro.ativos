<?php
session_start();
if ($_SESSION['controle_login'] == false || $_SESSION['login_ok'] == false) {
    header('location:../visao/tela_login_usuario.php?erro=sem_acesso');
}
