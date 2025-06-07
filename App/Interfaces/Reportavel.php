<?php
//declarando que o arquivo usa strict types
declare(strict_types=1);
//namespace da interface
namespace App\Interfaces;

/**
 * Interface para classes que geram relatórios especificando dois métodos (implementada por Missao)
 * @package Interfaces
 * @author Arthur Borges Vieira <aprendizadorthur@gmail.com>
 */
interface Reportavel
{   
    /**
     * Método que vai criar e armazenar o relatório na classe
     *
     * @return void
     */
    public function criarRelatorio(string $descricao) : void;
    
    /**
     * Método que vai retornar um array om todos os relatórios da classe formatados
     *
     * @return array
     */
    public function getRelatorios() : array;
}