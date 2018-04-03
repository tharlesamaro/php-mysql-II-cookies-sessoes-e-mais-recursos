<?php

require_once("cabecalho.php");
require_once("banco-produto.php");
require_once("logica-usuario.php");

verifica_usuario();

$nome = $_POST["nome"];
$preco = $_POST["preco"];
$descricao = $_POST["descricao"];
$categoria_id = $_POST["categoria_id"];

if (array_key_exists('usado', $_POST)) {
  $usado = "true";
} else {
  $usado = "false";
}


if (insere_produto($conexao, $nome, $preco, $descricao, $categoria_id, $usado)) { ?>
  <p class="text-success">Produto <?= $nome ?>, R$ <?= $preco ?> adicionado com sucesso!</p>
<?php } else {
  $msg_error = mysqli_error($conexao);
  ?>
  <p class="text-danger">O Produto <?= $nome ?> não foi adicionado.<br>Erro: <?= $msg_error ?></p>
<?php }

require_once("rodape.php");

?>