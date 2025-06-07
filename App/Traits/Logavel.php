<?php
//declarando que o arquivo usa strict types
declare(strict_types=1);
//namespace da trait
namespace App\Traits;

/**
 * Trait responsável por armazenar logs, criar logs e retornar logs de uma classe 
 * @package Traits
 * @author Arthur Borges Vieira <aprendizadoarthur@gmail.com>
 */
trait Logavel
{
    /**
     * Propriedade do tipo array que vai armazenar logs em forma de string
     * @var array
     */
    private array $logs = [];

    /**
     * Método que vai receber uma string da classe e armazená-la como log
     * 
     * @param string $mensagem
     * @return void
     */
    public function criarLog(string $log) : void {
        $this->logs[] = $log;
    }

    /**
     * Método get que vai retornar todos os logs daquela classe
     *
     * @return array
     */
    public function getLogs() : array{
        return $this->logs;
    }
}