<?php
class ProdutoDAO{

    public function getProdutos(){
        $query = " SELECT * FROM produto ";
        $dao = new DAO();
        $resultado = $dao->selecionarNLinhasSQL($query);

        $produtos=array();
        while ($linha = mysqli_fetch_assoc($resultado)) {
            $produto = new Produto();
            $produto->id = $linha["id"];
            $produto->descricao = $linha["descricao"];
            $produto->preco = $linha["preco"];
            $produto->unidade = $linha["unidade"];
            $produto->qtd_estoque = $linha["qtd_estoque"];
            array_push($produtos, $produto);
        }
        return $produtos;   
    }

    public function getProduto($id){
        $query = " SELECT * FROM produto WHERE id = ".$id;
        $dao = new DAO();
        $linha = $dao->selecionar1LinhaSQL($query);

        $produto = new Produto();
        $produto->id = $linha["id"];
        $produto->descricao = $linha["descricao"];
        $produto->preco = $linha["preco"];
        $produto->unidade = $linha["unidade"];
        $produto->qtd_estoque = $linha["qtd_estoque"];
    
        return $produto;       
    }
}