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

        $resultado = $this->mysql->query("SELECT id, titulo, conteudo, resumo, data, categoria_id, autor_id, midia_caminho FROM artigos");
        $artigos = $resultado->fetch_all(MYSQLI_ASSOC);

        return $artigos;
    }

    public function encontrePorId(string $id): array
    {
        $selecionaArtigo = $this->mysql->prepare("SELECT id, titulo, conteudo, resumo, data, categoria_id, autor_id, midia_caminho FROM artigos WHERE id = ?");
        $selecionaArtigo->bind_param('s', $id);
        $selecionaArtigo->execute();
        $artigo = $selecionaArtigo->get_result()->fetch_assoc();
        return $artigo;
    }

    public function adicionar(string $titulo, string $conteudo, string $resumo, string $data, int $categoria_id, int $autor_id, string $midiaCaminho): void
    {
        $insereArtigo = $this->mysql->prepare('INSERT INTO artigos (titulo, conteudo, resumo, data, categoria_id, autor_id, midia_caminho ) VALUES(?,?,?,?,?,?,?);');
        $insereArtigo->bind_param('sssssss', $titulo, $conteudo, $resumo, $data, $categoria_id, $autor_id, $midiaCaminho);
        $insereArtigo->execute();
    }

    public function remover(string $id): void
    {
        $removerArtigo = $this->mysql->prepare('DELETE FROM artigos WHERE id = ?');
        $removerArtigo->bind_param('s', $id);
        $removerArtigo->execute();
    }

    public function editar(string $id, string $titulo, string $conteudo, string $resumo, string $data, int $categoria_id, int $autor_id, string $midiaCaminho): void
    {
        $editarArtigo = $this->mysql->prepare('UPDATE artigos SET titulo = ?, conteudo = ?, resumo = ?, data = ?, categoria_id = ?, autor_id = ?, midia_caminho = ? WHERE id = ?');
        $editarArtigo->bind_param('ssssssss', $titulo, $conteudo, $resumo, $data, $categoria_id, $autor_id, $midiaCaminho, $id);
        $editarArtigo->execute();
    }
}
