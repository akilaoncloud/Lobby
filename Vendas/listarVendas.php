<?php
  include ("configBd.php");
  include ("DAO.php");
  include ("Venda.php");
  include ("VendedorDAO.php");

  $id_vendedor = $_POST["id"];

  echo "ID Vendedor: " . $id_vendedor . '<BR>';

  $vendedorDAO = new VendedorDAO();
  $vendas = $vendedorDAO->getVendas($id_vendedor);

  foreach ($vendas as $venda) {
      echo "<h1>ID Venda:". $venda->id . "; Valor: " . $venda->valor . '</h1><BR>';
  }    

  $vendas = $vendedorDAO->getSomaVendas($id_vendedor);

  echo "Soma: ". $vendas;
?>