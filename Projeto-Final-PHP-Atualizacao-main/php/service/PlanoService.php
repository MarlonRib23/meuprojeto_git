<?php

    class PlanoService {
        
        private $repository;

        public function __construct() {
            $this->repository = new PlanoRepository();
        }

        public function cadastrar(Plano $plano): bool {
            return $this->repository->fnAddPLano($plano);
        }

        public function atualizar(Plano $plano): bool {
            return $this->repository->fnUpdatePlano($plano);
        }
        
        public function listar($limit) {
            return $this->repository->fnListPlano($limit);
        }
        
        public function localizar($id) {
            return $this->repository->fnLocalizarPlano($id);
        }

        public function deletar($id) {
            return $this->repository->fnDeletarPlano($id);
        }
    } 