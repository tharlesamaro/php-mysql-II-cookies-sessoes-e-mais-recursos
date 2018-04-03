<?php

session_start();

function usuario_esta_logado() {
  return isset($_SESSION["usuario_logado"]);
}

function verifica_usuario()
{
  if (!usuario_esta_logado()) {
    $_SESSION["danger"] = "Você não tem acesso a essa funcionalidade";
    header("Location: index.php");
    die();
  }
}

function usuario_logado() {
  return $_SESSION["usuario_logado"];
}

function loga_usuario($email) {
  $_SESSION["usuario_logado"] = $email;
}

function logout() {
  session_destroy();
  session_start();
}