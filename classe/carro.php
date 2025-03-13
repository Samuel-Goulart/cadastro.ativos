<?php
class carro
{
    private $cor;
    private $marca;
    private $modelo;
    private $status_porta;

 public function setstatus_porta($status_porta){
$this->status_porta=$status_porta;
 }
    public function andar()
    {
        if ($this->status_porta == 'aberta') {
            echo 'carro não pode andar, porta aberta <br>';
        } else {echo 'carro pode andar<br>';}
    }
    public function abrir_porta()
    {
        if ($this->status_porta == 'aberta') {
            echo 'pode fechar';
        } else {
            echo 'porta fechada<br>';
        }
    }
    public function fechar_porta()
    { 
        if ($this->status_porta == 'fechada') {
        echo 'pode abrir';
    } else {
        echo 'porta aberta<br>';
    }
}
}

$carro1 = new carro();
$carro1->setstatus_porta('N');
var_dump($carro1);
exit;
$carro1->cor = 'azul';
$carro1->marca = '';
$carro1->modelo = '';
$carro1->status_porta = 'fechada';


$carro1->andar();
$carro1->abrir_porta();
$carro1->fechar_porta();
