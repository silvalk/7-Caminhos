<?php

namespace App\Contracts;

interface PromocaoInterface
{
    public function listarPromocoes();
    public function adicionarPromocao(array $dados);
    public function atualizarPromocao(int $id, array $dados);
    public function removerPromocao(int $id);
    public function encontrarPorProdutoId(int $produtoId);
}
