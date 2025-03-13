<?php
class sala
{
    public $capacidade;
    public $estado_ocupacao;
    public $aberto;
    public $ocupantes;

    public function entrar_na_sala()
    {
        if ($this->ocupantes > $this->capacidade) {
            echo 'capacidade excedida<br>';
        } else if ($this->estado_ocupacao == 'S') {
            echo 'sala em uso<br>';
        } else if ($this->aberto == 'N') {
            echo 'sala fechada<br>';
        }else{
            echo'entra na sala<br>';
        }
    }
    public function sair_da_sala()
    {
        if ($this->aberto == 'N') {
            echo 'não pode sair<br>';
        } else {
            echo 'pode sair<br>';
        }
    }
    public function reservar_sala()
    {
        if ($this->estado_ocupacao == 'S') {
            echo 'não pode reservar sala ja ocupada <br>';
        } else {
            echo 'pode reservar';
        }
    }
}


$sala1 = new sala();
$sala1->capacidade = 100;
$sala1->estado_ocupacao = 'N';
$sala1->aberto = 'S';
$sala1->ocupantes = 89;


$sala1->entrar_na_sala();
$sala1->sair_da_sala();
$sala1->reservar_sala();
