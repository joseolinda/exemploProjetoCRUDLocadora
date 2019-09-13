<?php
namespace App\Read;

use DB\Conexao as DB;

class Visualizar
{
    private $tabela;
    private $banco;
    private $totalPagina;

    public function __construct($nomeTabela)
    {
        $this->tabela = $nomeTabela;
        $this->banco = DB::getInstance();
        $this->totalPagina = 10;
    }

    public function buscarFilmes( $pagina ) {
        $bd = $this->banco;
        $inicio_resultado = ($pagina - 1) * $this->totalPagina;
        $sql = "SELECT * FROM {$this->tabela} limit {$inicio_resultado},{$this->totalPagina}";

        $consulta = $bd->prepare($sql);
        $resultado = $consulta->execute();

        if( $resultado ) {
            $array_resultado = $consulta->fetchAll(\PDO::FETCH_ASSOC);
            return $array_resultado;
        }

        return false;

    }

}