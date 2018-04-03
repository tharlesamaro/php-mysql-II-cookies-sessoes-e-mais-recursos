<?php

require_once("conecta.php");

function busca_usuario($conexao, $email, $senha) {
  $senha_md5 = md5($senha);
  $email = mysqli_escape_string($conexao, $email);
  $query = "SELECT * FROM usuarios WHERE email='{$email}' and senha='$senha_md5'";
  $resultado = mysqli_query($conexao, $query);
  $usuario = mysqli_fetch_assoc($resultado);
  return $usuario;
}