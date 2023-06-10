<?php

    class Livro {
        public $id;
        public $nome;
        public $autor;
        public $data_pb;
        public $edicao;
        
        public function set($prop, $value) {
            $this->$prop = $value;
        }

        public function cadastrar()
        {
            $objeto = new LivroDAO();
            $objeto->set("id", $this->id);
            $objeto->set("nome", $this->nome);
            $objeto->set("autor", $this->autor);
            $objeto->set("data_pb", $this->data_pb);
            $objeto->set("edicao", $this->edicao);
            return $objeto->cadastrar();
        }

        public function alterar()
        {
            $objeto = new LivroDAO();
            $objeto->set("id", $this->id);
            $objeto->set("nome", $this->nome);
            $objeto->set("autor", $this->autor);
            $objeto->set("data_pb", $this->data_pb);
            $objeto->set("edicao", $this->edicao);
            return $objeto->alterar();
        }

        public function excluir()
        {
            $objeto = new LivroDAO();
            $objeto->set("id", $this->id);
            return $objeto->excluir();
        }
    }

?>