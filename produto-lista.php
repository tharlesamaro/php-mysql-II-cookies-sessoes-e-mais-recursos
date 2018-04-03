<?php
require_once("cabecalho.php");
require_once("banco-produto.php");
require_once("logica-usuario.php");

verifica_usuario();
?>

  <table class="table table-striped table-bordered">
    <?php
    $produtos = lista_produtos($conexao);

    foreach ($produtos as $produto) : ?>
      <tr>
        <td><?= $produto['nome'] ?></td>
        <td><?= $produto['preco'] ?></td>
        <td><?= substr($produto['descricao'], 0, 40) ?></td>
        <td><?= $produto['categoria_nome'] ?></td>
        <td><a class="btn btn-primary" href="produto-altera-formulario.php?id=<?= $produto['id'] ?>">Alterar</a></td>
        <td>
          <form action="produto-remove.php" method="post">
            <input type="hidden" name="id" value="<?= $produto['id'] ?>">
            <button class="btn btn-danger" type="submit">Remover</button>
          </form>
        </td>
      </tr>
    <?php
    endforeach; ?>
  </table>

<?php include("rodape.php") ?>