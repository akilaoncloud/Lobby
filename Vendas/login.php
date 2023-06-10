<?php
include ("configBd.php");
include ("DAO.php");
include ("VendedorDAO.php");

$usuario = $_POST["login"];
$senha = $_POST["senha"];

$usuarioDAO = new VendedorDAO();

$idVendedor = $usuarioDAO->validarLogin($usuario, $senha);

if ($idVendedor >= 1){
    //echo "usuario logado";
    session_start();
    $_SESSION['idVendedorLogado'] = $idVendedor;
    $_SESSION['idvenda'] = 0;

    $newURL = 'menu.php';
    header('Location: '.$newURL);
}else{
    echo "problema ao realizar o login";
}



?>