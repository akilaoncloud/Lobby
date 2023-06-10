<?php
include ("configBd.php");
include ("DAO.php");
include ("VendaDAO.php");
include ("ProdutoDAO.php");
include ("Produto.php");
include ("_bid.php");

$idProduto = $_POST["produtos"];
$qtd = $_POST["qtd"];
$vendaID = $_POST["vendaId"];

$qtd = deVirgulaParaPonto($qtd);
$vendaDAO = new VendaDAO();
$ret = $vendaDAO->addProduto($vendaID, $idProduto, $qtd);

if ($ret>0){
   echo $idProduto . "--". $qtd . " Cadastrado";
   $newURL = 'novaVenda.php';
   header('Location: '.$newURL);
}else{
    echo "erro";
}


?>