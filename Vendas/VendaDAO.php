<?php

class VendaDAO{


    public function novaVenda(){

        $idUltimaVenda = $this->getUltimaVenda();
        $idNovaVenda =$idUltimaVenda+1; 
        //session_start();

        $idVendedorLogado = $_SESSION['idVendedorLogado'];
        $query =
        " INSERT INTO venda(id, data_hora, forma_pagamento, id_vendedor, id_cliente, valor )".
        "      VALUES (".$idNovaVenda.",".
                      " NOW(), ".
                      " 0, ".
                      $idVendedorLogado.", ".
                      "0, 0)";

        // echo $query;
        $dao = new DAO();
        $retorno = -1;
        if ($dao->executarSQL($query)){
            $retorno = $idNovaVenda;
            //echo "venda inserida";
        }
        return $retorno;
        
    }

    public function getUltimaVenda(){
        $query = " SELECT MAX(id) as id FROM venda";
        $dao = new DAO();
        $resultado = $dao->selecionar1LinhaSQL($query);

        $id =0;
        try {
            if ( isset($resultado["id"]) ){
                $id = $resultado["id"];
            }
        } catch(Exception $e) {
            $id =0;
        }

        return $id;
    }

    public function addProduto($idVenda, $idProduto, $qtd){
        $produtoDAO = new ProdutoDAO();
        $produto = $produtoDAO->getProduto($idProduto);

        $valor_unit = $produto->preco;
        $valor_calc = $produto->preco * $qtd;

        $query =
        " INSERT INTO venda_produto(id_venda, id_produto, qtd, valor_unit, valor_calc )".
        "      VALUES (".$idVenda.",".
                         $idProduto.",".
                         $qtd.",".
                         $valor_unit.",".
                         $valor_calc.")";
        
        //echo $query;
        $dao = new DAO();
        $retorno = -1;
        if ($dao->executarSQL($query)){
            $retorno = 1;
        }
        return $retorno;

    }

    public function getItens($idVenda){

        $query = "SELECT * FROM venda_produto WHERE id_venda = ".$idVenda;

        $dao = new DAO();
        $resultado = $dao->selecionarNLinhasSQL($query);
        $itens=array();

        while ($linha = mysqli_fetch_assoc($resultado)) {
            $produto = new Produto();
            $produtoDAO = new ProdutoDAO();
            $produto = $produtoDAO->getProduto($linha["id_produto"]);
            $item = new Item();
            $item->venda_id = $idVenda;
            $item->produto = $produto;
            $item->qtd = $linha["qtd"];
            $item->valor_unit = $linha["valor_unit"];
            $item->valor_calc = $linha["valor_calc"];

            array_push($itens, $item);
        }
        return $itens;
    }

    public function getVenda($idVenda){
        $query = "SELECT * FROM venda WHERE id = ".$idVenda;
    
        $dao = new DAO();
        $linha = $dao->selecionar1LinhaSQL($query);
        
        $venda = new Venda();
        $venda->id = $linha["id"];
        $venda->data_hora = $linha["data_hora"];
        $venda->forma_pagamento = $linha["forma_pagamento"];
        $venda->id_vendedor = $linha["id_vendedor"];
        $venda->id_cliente = $linha["id_cliente"];
        $venda->valor = $linha["valor"];
        return $venda;

    }

    public function somarVenda($idVenda){
        
        $query = " SELECT sum(valor_calc) as SOMA FROM venda_produto WHERE id_venda = ".$idVenda;
        $dao = new DAO();
        $linha = $dao->selecionar1LinhaSQL($query);
        
        //echo $linha["SOMA"];
        $soma = $linha["SOMA"];

        $query = "UPDATE venda SET valor = '$soma' WHERE id = '$idVenda'";
        
        //echo $query;
        $dao = new DAO();
        $retorno = -1;
        if ($dao->executarSQL($query)){
            $retorno = 1;
        }
        return $retorno;



    }
}
?>