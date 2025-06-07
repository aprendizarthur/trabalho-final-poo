<?php
//declarando que o arquivo usa strict types
declare(strict_types=1);
//namespace da classe
namespace App\Classes;
//adicionando classe exception nativa do php
use Exception;

/**
 * Classe concreta que tem relação de composição com Missão
 * @package Classes
 * @author Arthur Borges Vieira <aprendizadoarthur@gmail.com>
 */
class Relatorio
{
    /**
     * Este construtor instancia um objeto relatório com descrição e data
     *
     * @param string $descricao
     * @param string $data
     */
    public function __construct(protected string $descricao, protected string $data){
        
    }
    
    /**
     * Método get que retorna a descrição do relatório
     * @return string
     */
    public function getDescricao(): string {
        return $this->descricao;
    }

    /**
     * Método get que retorna a data do relatório
     * @return string
     */
    public function getData() : string {
        return $this->data;
    }
}