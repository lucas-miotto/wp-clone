<?php

class Artigo
{
    private $mysql;

    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }

    public function exibirTodos(): array
    {

        $resultado = $this->mysql->query("SELECT id, titulo, conteudo FROM artigos");
        $artigos = $resultado->fetch_all(MYSQLI_ASSOC);

        return $artigos;
    }

    public function encontrePorId(string $id): array
    {
        $selecionaArtigo = $this->mysql->prepare("SELECT id, titulo, conteudo FROM artigos WHERE id = ?");
        $selecionaArtigo->bind_param('s', $id);
        $selecionaArtigo->bind_param('s', $id);
        $selecionaArtigo->execute();
        $artigo = $selecionaArtigo->get_result()->fetch_assoc();
        return $artigo;
    }

    public function adicionar(string $titulo, string $conteudo, string $resumo, string $data): void
    {
        $insereArtigo = $this->mysql->prepare('INSERT INTO artigos (titulo, conteudo, resumo, data) VALUES(?,?,?,?);');
        $insereArtigo->bind_param('ssss', $titulo, $conteudo, $resumo, $data);
        $insereArtigo->execute();
    }

    public function remover(string $id): void
    {
        $removerArtigo = $this->mysql->prepare('DELETE FROM artigos WHERE id = ?');
        $removerArtigo->bind_param('s', $id);
        $removerArtigo->execute();
    }

    public function editar(string $id, string $titulo, string $conteudo): void
    {
        $editarArtigo = $this->mysql->prepare('UPDATE artigos SET titulo = ?, conteudo = ? WHERE id = ?');
        $editarArtigo->bind_param('sss', $titulo, $conteudo, $id);
        $editarArtigo->execute();
    }
}
