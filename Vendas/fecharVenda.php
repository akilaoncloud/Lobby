<?php


$fpag = $_POST["forma_pag"];

$vendaId = $_POST["vendaId"];
$valor_venda = $_POST["valor_venda"];

echo "<h1>Venda COD: " . $vendaId . "</h1><br>";


if ($fpag=="avista"){
    $fpag = "A VISTA";
}else{
    $fpag = "A PRAZO";
}

echo "<h1>Receber  R$ " . $valor_venda ." ". $fpag."</h1>";

session_start();
$_SESSION['idvenda'] = 0;

echo "<a href='menu.php'>Menu</a>";


?>