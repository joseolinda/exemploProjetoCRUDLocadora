<?php
namespace App\Delete;

use DB\Conexao as DB;

class Deletar {
    private $tabela;
    private $banco;
    private $elemento;

    public function __construct($nomeTabela, $idElemento)
    {
        $this->tabela = $nomeTabela;
        $this->banco = DB::getInstance();
        $this->elemento = $idElemento;
    }

    private function apagar() {
        $bd = $this->banco;
        $sql = "DELETE FROM {$this->tabela} where {$this->tabela}_id = {$this->elemento} ";

        $consulta = $bd->prepare($sql);
        $resultado = $consulta->execute();

        if( $resultado ) {
            return "Registro removido com sucesso.<br>";
        }
        return "Erro ao excluir o registro.<br>";
    }

    public function __toString() {
        return $this->apagar();
    }


}