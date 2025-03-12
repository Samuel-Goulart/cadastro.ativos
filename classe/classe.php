<?php 
class Caneta {
    public $cor;
    public $ponta;
    public $tem_tinta;
    public $tampada;
     
    public function escrever() {
        if ($this->tampada == 'S') {
            echo 'Caneta tampada<br>';
        } else if ($this->tem_tinta == 'N') {
            echo 'Caneta não pode escrever sem tinta<br>';
        } else {
            echo 'Escrevendo<br>';
        }
    }
    public function tampar() {
        $this->tampada = 'S';
        echo 'Caneta tampada<br>';
    }
    public function destampar() {
        $this->tampada = 'N';
        echo 'Caneta destampada<br>';
    }
}


$caneta1 = new Caneta();
$caneta1->cor = 'verde';
$caneta1->tem_tinta = 'S';
$caneta1->ponta = 0.9;


$caneta1->escrever();
$caneta1->tampar();
$caneta1->escrever();
$caneta1->destampar();
$caneta1->tem_tinta = 'N';
$caneta1->escrever();
?>
