<?php

class Autor
{
    private $mysql;

    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }

    public function exibirTodos(): array
    {

        $resultado = $this->mysql->query("SELECT id, titulo FROM autores");
        $autores = $resultado->fetch_all(MYSQLI_ASSOC);

        return $autores;
    }

    public function encontrePorId(string $id): array
    {
        $selecionaAutor = $this->mysql->prepare("SELECT id, titulo FROM autores WHERE id = ?");
        $selecionaAutor->bind_param('s', $id);
        $selecionaAutor->bind_param('s', $id);
        $selecionaAutor->execute();
        $categoria = $selecionaAutor->get_result()->fetch_assoc();
        return $categoria;
    }

    public function adicionar(string $titulo): void
    {
        $insereAutor = $this->mysql->prepare('INSERT INTO autores (titulo) VALUES(?);');
        $insereAutor->bind_param('s', $titulo);
        $insereAutor->execute();
    }

    public function remover(string $id): void
    {
        $removerAutor = $this->mysql->prepare('DELETE FROM autores WHERE id = ?');
        $removerAutor->bind_param('s', $id);
        $removerAutor->execute();
    }

    public function editar(string $id, string $titulo): void
    {
        $editarAutor = $this->mysql->prepare('UPDATE autores SET titulo = ? WHERE id = ?');
        $editarAutor->bind_param('ss', $titulo, $id);
        $editarAutor->execute();
    }
}
