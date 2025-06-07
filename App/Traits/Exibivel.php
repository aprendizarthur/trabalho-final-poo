<?php
//declarando que o arquivo usa strict types
declare(strict_types=1);
//namespace da trait
namespace App\Traits;
//adicionando as classes ao arquivo para reconhecer no instanceof
use \App\Classes\{Tripulante, NaveEspacial, Missao};

/**
 * Trait responsável por retornar dados || relatórios da classe formatados em forma de string
 */
trait Exibivel
{
    /**
     * Método que retorna uma string contendo os dados da classe
     * @return string
     */
    public function getDados() : string{
        $dados = '';

        if($this instanceof Tripulante){
            $dados = "<strong>Dados do tripulante</strong>: <br> Nome: ".$this->getNome()."<br> Id: ".$this->getId()."<br> Função: ".$this->getFuncao()."<br> Nível de Experiência: ".$this->getNivelExperiencia()."<br>";
        }
            
        if($this instanceof NaveEspacial){
            $dados = "<strong>Dados da nave</strong>: <br> Nome: ".$this->getNome()."<br> Id: ".$this->getID()."<br> Função: ".$this->getFuncao()."<br> Capacidade: ".$this->getCapacidade()."<br> Energia atual: ".$this->getEnergia()."<br>";
        } 

        if($this instanceof Missao){
            $dados = "<strong>Dados da missão</strong>: <br> Destino: ".strtoupper($this->getDestino())."<br> Duração: ".$this->getDuracao()." dias <br> Nave Utilizada: ".$this->getNave()."<br> Status: ".strtoupper($this->getStatus())."<br>";
        }
        return $dados;
    }
}