<?php
require_once("banco-usuario.php");
require_once("logica-usuario.php");

$usuario = busca_usuario($conexao, $_POST["email"], $_POST["senha"]);

if ($usuario == null) {
  $_SESSION["danger"] = "Usuário ou seha inválidos";
  header("Location: index.php");
} else {
  $_SESSION["success"] = "Usuário logado com sucesso";
  loga_usuario($usuario["email"]);
  header("Location: index.php");
}

die();
