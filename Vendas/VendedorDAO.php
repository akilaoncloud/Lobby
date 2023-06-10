<?php

class VendedorDAO{


    public function validarLogin($login, $senha){
        $query =
        " SELECT * ".
        "   FROM vendedor ".
        "  WHERE login= '".$login."'".
        "    AND senha= '".$senha."'";
        
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
        
        $retorno = -1;
        if ($id>=1){
            $retorno = $id;
        }
        return $retorno;
    }


    public function getVendas($vendedor_id){
    
        $query = " SELECT * ".
                 "   FROM venda ".
                 "  WHERE id_vendedor = ".$vendedor_id;

        $dao = new DAO();
        $resultado = $dao->selecionarNLinhasSQL($query);
        $vendas=array();

        while ($linha = mysqli_fetch_assoc($resultado)) {
            $venda = new Venda();
            $venda->id = $linha["id"];
            $venda->forma_pagamento = $linha["forma_pagamento"];
            $venda->id_vendedor = $linha["id_vendedor"];
            $venda->valor = $linha["valor"];
            
            array_push($vendas, $venda);
        }
        return $vendas;

    }


    
    public function getSomaVendas($vendedor_id){

        $query = " SELECT SUM(valor) soma ".
                 "   FROM venda ".
                 "  WHERE id_vendedor = ".$vendedor_id;

        $dao = new DAO();
        $resultado = $dao->selecionar1LinhaSQL($query);
        $soma = $resultado["soma"];
        
        return $soma;

    }

}
?>