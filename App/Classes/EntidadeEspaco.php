<?php
//declarando que o arquivo usa strict types
declare(strict_types=1);
//namespace da classe
namespace App\Classes;

/**
 * Classe abstrata definindo propriedades e métodos requeridos 
 * para entidades do espaço (extendida por NaveEspacial e Tripulante)
 * @package Classes
 * @author Arthur Borges Vieira <aprendizadorthur@gmail.com>
 */
abstract class EntidadeEspaco
{
    /**
     * Propriedade privada que vai armazenar o ID da entidade
     *
     * @var string
     */
    protected string $id;

    /**
     * Este construtor define que toda classe que herdar de EntidadeEspaço deve
     * ter no mínimo estes parâmetros
     *
     * @param string $nome
     * @param string $funcao
     */
    public function __construct(protected string $nome, protected string $funcao){

    }

    /**
     * Toda classe que herdar de EntidadeEspaco deve implementar este método 
     * abstrato que gera um ID
     * @return string
     */
    abstract public function gerarID() : string;


    /**
     * Método concreto que retorna o nome da entidade herdado por todas subsclasses
     *
     * @return string|int
     */
    public function getNome() : string|int{
        return $this->nome;
    }

     /**
     * Método concreto que retorna a funcao da entidade herdado por todas subsclasses
     *
     * @return string
     */
    public function getFuncao() : string {
        return $this->funcao;
    }

     /**
     * Método concreto que retorna o id da entidade herdado por todas subsclasses
     *
     * @return string
     */
    public function getID() : string {
        return $this->id;
    }
}