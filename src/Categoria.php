<?php

class Categoria
{
    private $mysql;

    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }

    public function exibirTodos(): array
    {

        $resultado = $this->mysql->query("SELECT id, titulo FROM categorias");
        $categorias = $resultado->fetch_all(MYSQLI_ASSOC);

        return $categorias;
    }

    public function encontrePorId(string $id): array
    {
        $selecionaCategoria = $this->mysql->prepare("SELECT id, titulo FROM categorias WHERE id = ?");
        $selecionaCategoria->bind_param('s', $id);
        $selecionaCategoria->bind_param('s', $id);
        $selecionaCategoria->execute();
        $categoria = $selecionaCategoria->get_result()->fetch_assoc();
        return $categoria;
    }

    public function adicionar(string $titulo): void
    {
        $insereCategoria = $this->mysql->prepare('INSERT INTO categorias (titulo) VALUES(?);');
        $insereCategoria->bind_param('s', $titulo);
        $insereCategoria->execute();
    }

    public function remover(string $id): void
    {
        $removerCategoria = $this->mysql->prepare('DELETE FROM categorias WHERE id = ?');
        $removerCategoria->bind_param('s', $id);
        $removerCategoria->execute();
    }

    public function editar(string $id, string $titulo): void
    {
        $editarCategoria = $this->mysql->prepare('UPDATE categorias SET titulo = ? WHERE id = ?');
        $editarCategoria->bind_param('ss', $titulo, $id);
        $editarCategoria->execute();
    }
}
