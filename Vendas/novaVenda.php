<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Nova Venda</title>
    <meta charset="utf-8">
  </head>

  <body>

    <?php
    include ("configBd.php");
    include ("DAO.php");
    include ("VendaDAO.php");
    include ("ProdutoDAO.php");
    include ("Produto.php");
    include ("Item.php");    
    include ("Venda.php");    

    session_start();
    $idVenda = 0;
    if ( isset($_SESSION['idvenda']) ){
      $idVenda = $_SESSION['idvenda'];  
    }

    $vendaDAO = new VendaDAO();
    if ($idVenda == 0){
      //  Gerar nova venda

      $idVenda = $vendaDAO->novaVenda();
      $_SESSION['idvenda'] = $idVenda;
    } 



    echo "<h1>Venda - COD: " . $idVenda . "</h1>";
    
    $produtoDAO = new ProdutoDAO();
    $produtos = $produtoDAO->getProdutos();
    ?>

    <h1>Adicionar Produto</h1>
    <form action="addProduto.php" method="post">
     
      <?php
      echo "<input type='hidden' id='vendaId' name='vendaId' value='".$idVenda. "'>";

      echo "<div>";
      echo "<label for='produtos'>Produto:</label>";
      echo " <select name='produtos' id='produtos'>";
      foreach ($produtos as $produto) {

        $preco = number_format($produto->preco, 2, ',', '.');
        echo "<option value='".$produto->id."'>".$produto->descricao."- R$: ". $preco." ".$produto->unidade."</option>";
      }
      echo "</select>";  
      echo "</div>";
      ?>

      <div>
      <label for='qtd'>Quantidade:</label>
      <input type="text" id="qtd" name="qtd" size="5">
      </div>

      <div class="button">
      <input type="submit" value="Adicionar Produto"></input>
      </div>
    </form>

  </br></br>

  <h1>Produtos Incluídos</h1>


  <table border="1">
    <tr>
        <td>Produto</td>
        <td>Quantidade</td>
        <td>Unidade</td>
        <td>Valor Unit</td>
        <td>Valor Total</td>
    </tr>
      <?php
      $itens = $vendaDAO->getItens($idVenda);

      foreach ($itens as $item) {
        echo "<tr>";
        echo "  <td>". $item->produto->descricao . "</td> \n";
        echo "  <td>". $item->qtd. "</td> \n";
        echo "  <td>". $item->produto->unidade. "</td> \n";
        $v_unit = number_format($item->valor_unit, 2, ',', '.');
        echo "  <td>". $v_unit. "</td> \n";
        $v_calc = number_format($item->valor_calc, 2, ',', '.');
        echo "  <td>". $v_calc. "</td> \n";
        echo "</tr>";
      }

      echo "<tr>";
      echo "  <td> </td> \n";
      echo "  <td> </td> \n";
      echo "  <td> </td> \n";
      echo "  <td> Total: </td> \n";
      $vendaDAO->somarVenda($idVenda);
      $soma0 = $vendaDAO->getVenda($idVenda)->valor;
      $soma = number_format($soma0, 2, ',', '.');
      echo "  <td> ".$soma." </td> \n";
      echo "</tr>";

      ?>
  </table>

  <h1>FORMA DE PAGAMENTO</h1>

  <form action="fecharVenda.php" method="post">
    <?php
    echo "<input type='hidden' id='vendaId' name='vendaId' value='".$idVenda. "'>";
    echo "<input type='hidden' id='valor_venda' name='valor_venda' value='".$soma. "'>";
    ?>
      
    <input type="radio" id="avista" name="forma_pag" value="avista" checked>   
    <label for="avista">A VISTA</label><br>
        
    <input type="radio" id="aprazo" name="forma_pag" value="aprazo"> 
    <label for="aprazo">A PRAZO</label><br>
    
    <input type="submit" value="Fechar Venda"></input>  
  </form>

  </body>
</html>