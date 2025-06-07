<?php
//declarando que o arquivo usa strict types
declare(strict_types=1);
//namespace da classe
namespace App\Classes;
//adicionando classe exception nativa do php
use Exception;

/**
 * Classe concreta que herda de EntidadeEspaço e usa as traits Exibivel e Logavel
 * @package Classes
 * @author Arthur Borges Vieira <aprendizadorthur@gmail.com>
 */
class Tripulante extends EntidadeEspaco
{
    //adicionando as traits Logavel(logs) e Exibivel(mostrar dados) na classe para que sejam utilizadas
    use \App\Traits\Logavel;
    use \App\Traits\Exibivel;

    /**
     * Propriedade protegida que armazena o id do tripulante
     * @var string
     */
    protected string $id;
    /**
     * Propriedade privada que armazena o nível de experiência que o tripulante tem em sua função
     * @var integer
     */
    private int $nivelExperiencia;

    /**
     * Propriedade privada array com a nave em que o tripulante está embarcado
     *
     * @var array
     */
    private array $nave = [];

    /**
     * Propriedade privada array com todas as missões que o tripulante foi associado
     * @var array
     */
    private array $missoes = [];

    /**
     * Método construtor que instancia um novo Tripulante exigindo nome, função e nível de 
     * experiência, passando parametros para o construtor da classe abstrata EntidadeEspaco
     *
     * @param string $nome
     * @param string $funcao
     * @param integer $nivelExperiencia
     */
    public function __construct(string $nome, string $funcao, int $nivelExperiencia){
        $this->id = $this->gerarID();
        //validando funcao e nivel de experiencia do tripulante
        if(!$this->validarFuncao($funcao)){ throw new Exception("Função inválida");}
        if(!$this->validarNivelExperiencia($nivelExperiencia)){ throw new Exception("Nível de experiência inválido, deve ser entre 0-10");}
        
        parent::__construct($nome, $funcao);
        $this->nivelExperiencia = $nivelExperiencia;   
        
        //adicionando log da criação do tripulante
        $log = "Tripulante ".$this->nome." ".$this->id." criado.";
        $this->criarLog($log);
    }

    /**
     * Método que valida a função inserida no construtor da classe, podendo lançar uma exception
     *
     * @param string $funcao
     * @return boolean
     */
    private function validarFuncao(string $funcao) : bool{
        $resultado = match(strtolower($funcao)){
            'piloto' => true,
            'engenheiro' => true,
            'cientista' => true,
            default => false,
        };
        return $resultado;
    }

    /**
     * Método que valida o nível de experiência inserido no construtor da classe, podendo lançar
     * uma excpetion
     *
     * @param integer $nivelExperiencia
     * @return boolean
     */
    private function validarNivelExperiencia(int $nivelExperiencia) : bool{
        if($nivelExperiencia < 0 || $nivelExperiencia > 10){return false;}
        return true;
    }

    /**
     * Método usado no construtor da missão que adiciona ela no array de missoes do tripulante
     * @param Missao $missao
     * @return void
     */
    public function setMissao(Missao $missao) : void {
        $this->missoes[] = $missao;
    }

    /**
     * Método que retira a missao do array missoes do tripulante ao ser retirado da nave
     * @param int $indice
     * @return void
     */
    public function unsetMissao(int $indice) : void {
        unset($this->missoes[$indice]);
    }

    /**
     * Método que adiciona a nave que o tripulante está embarcado
     *
     * @param NaveEspacial $nave
     * @return void
     */
    public function setNave(NaveEspacial $nave) : void {
        $this->nave[0] = $nave;
    }

    /**
     * Método que retira a nave do objeto tripulante quando ele desembarca
     * @return void
     */
    public function unsetNave() : void {
        unset($this->nave[0]);
    }

    /**
     * Método que retorna um bool dizendo se o tripulante está embarcado em alguma nave
     *
     * @return boolean
     */
    public function estaEmbarcado() : bool {
        if(empty($this->nave[0])){return false;}
        return true;
    }

    /**
     * Método herdado da classe abstrata EntidadeEspaco que retorna uma string com ID único
     *
     * @return string
     */
    public function gerarID(): string {
        return "TRIP-".uniqid("", true);
    }

    /**
     * Método get retornando um int com o nível de experiencia do tripulante
     *
     * @return integer
     */
    public function getNivelExperiencia() : int{
        return $this->nivelExperiencia;
    }

    /**
     * Método get retornando um array com as missoes que o tripulante foi associado
     *
     * @return array
     */
    public function getMissoes() : array{
        return $this->missoes;
    }
    
}