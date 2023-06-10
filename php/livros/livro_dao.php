<?php

    class LivroDAO
    {
        public $id;
        public $nome;
        public $autor;
        public $data_pb;
        public $edicao;

        public function set($prop, $value) {
            $this->$prop = $value;
        }

        public function cadastrar() {
            $objeto = new Conexao();
            $SQL = "INSERT INTO livro (id, nome, autor, data_pb, edicao)
                    VALUES ('$this->id', '$this->nome', '$this->autor', '$this->data_pb', '$this->edicao');";
            $objeto->set("sql", $SQL);  
            $objeto->query();
            return "Cadastrado com Sucesso";
        }
        
        public function alterar()
        {
            $objeto = new Conexao();
            $SQL = "UPDATE livro
                    SET 
                    nome='$this->nome', 
                    autor='$this->autor', 
                    data_pb='$this->data_pb', 
                    edicao='$this->edicao'
                    WHERE id='$this->id'";
            $objeto->set("sql", $SQL);  
            $objeto->query();
            return "Alterado com Sucesso";
        }

        public function excluir()
        {
            $objeto = new Conexao();
            $SQL = "DELETE FROM livro
                    WHERE id='$this->id'";
            $objeto->set("sql", $SQL);  
            $objeto->query();
            return "Excluído com Sucesso";
        }
    }

?>