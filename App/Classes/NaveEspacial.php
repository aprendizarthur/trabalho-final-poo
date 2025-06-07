<?php
//declarando que o arquivo usa strict types
declare(strict_types=1);
//namespace da classe
namespace App\Classes;
//adicionando classe exception nativa do php
use Exception;
//adicionando as classes referenciadas arquivo
use App\Classes\{EntidadeEspaco};

/**
 * Classe concreta NaveEspacial que herda de EntidadeEspaço e usa traits Logavel e Exibivel
 * @package Classes
 * @author Arthur Borges Vieira <aprendizadoarthur@gmail.com>
 */
class NaveEspacial extends EntidadeEspaco
{
    //adicionando as traits Logavel(logs) e Exibivel(mostrar dados) na classe para que sejam utilizadas
    use \App\Traits\Logavel;
    use \App\Traits\Exibivel;

    /**
     * Propriedade estática que armazena o total de naves na frota
     * @var integer
     */
    public static $quantidadeNaves = 0;
    /**
     * Propriedade protegida que armazena o ID da nave
     * @var string
     */
    protected string $id;
    /**
     * Propriedade privada que armazena o nível de energia da nave
     *
     * @var integer
     */
    private int $nivelEnergia = 100;
    /**
     * Propriedade privada que armazena o limite de tripulantes que a nave pode transportar
     *
     * @var integer
     */
    private int $capacidadeTripulantes = 4;
    /**
     * Propriedade privada array que armazena os objetos tripulantes a bordo da nave
     *
     * @var array
     */
    private array $tripulantes = [];

    /**
     * Propriedade privada que armazena a missão da nave 1:1
     *
     * @var array
     */
    private array $missao = [];

    /**
     * Este contrutor instancia um objeto NaveEspacial verificando sua função e 
     * passando parâmetros para o construtor da classe abstrata pai
     *
     * @param string $nome
     * @param string $funcao
     * @param integer $capacidadeTripulantes
     */
    public function __construct(string|int $nome, string $funcao, int $capacidadeTripulantes){
        if(!$this->validarFuncao($funcao)){throw new Exception("Função de nave inválida");}
        parent::__construct($nome, $funcao);

        $this->id = $this->gerarID();
        $this->capacidadeTripulantes = $capacidadeTripulantes;
        self::$quantidadeNaves++;

        $log = "Nave espacial ".$this->nome." criada.";
        $this->criarLog($log);
    }
    
    /**
     * Método que verifica se a nave pode receber mais um tripulante segundo sua capacidade
     *
     * @return boolean
     */
    public function conferirCapacidade() : bool {
        if(count($this->tripulantes) == $this->capacidadeTripulantes){ return false;}
        return true;
    }

    /**
     * Método que verifica se a função inserida no construtor é uma das disponíveis para nave
     *
     * @param string $funcao
     * @return boolean
     */
    public function validarFuncao(string $funcao) : bool{
        $resultado = match(strtolower($funcao)){
            'exploração' => true,
            'combate' => true,
            'transporte' => true,
            default => false
        };
        return $resultado;
    }

    /**
     * Método utilizado sempre que uma missão inicia, se a nave não tiver 20 de energia (necessário)
     * para uma missão, retorna false
     *
     * @param int $nivelEnergia
     * @return boolean
     */
    public function conferirEnergia() : bool {
        if($this->nivelEnergia < 50){return false;}
        return true;
    }

    /**
     * Método que adiciona um tripulante na nave, verificando se a nave tem espaço e se ele já
     * não está dentro dela
     * 
     * @param Tripulante $tripulante
     * @return void
     */
    public function setTripulante(Tripulante $tripulante) : void {
        if(!$this->conferirCapacidade()){ throw new Exception("Capacidade da nave esgotada"); }
        if($tripulante->estaEmbarcado()){ throw new Exception("Este tripulante está embarcado em outra nave");}
        $tripulante->setNave($this);
        
        foreach($this->tripulantes as $dentroNave){
            if($tripulante === $dentroNave){
                throw new Exception("Este tripulante já está na nave.");
            }
        }

        $this->tripulantes[] = $tripulante;
        $log = "Tripulante ".$tripulante->getNome()." embarcou na nave ".$this->nome.".";
        $this->criarLog($log);
    }

    /**
     * Método set para definir a missao da nave
     *
     * @param Missao $missao
     * @return void
     */
    public function setMissao(Missao $missao) : void {
        $this->missao[0] = $missao;
    }

    /**
     * Método que verifica se o tripulante está na nave e remove 
     *
     * @param Tripulante $tripulante
     * @return void
     */
    public function removeTripulante(Tripulante $tripulante): void {
        $verificacaoAbordo = false;
        foreach($this->tripulantes as $index => $abordo){
            $indiceTripulante = $index;
            if($abordo === $tripulante){ $verificacaoAbordo = true;}
            break;
        }

        if(!$verificacaoAbordo){throw new Exception("Este tripulante não está na nave.");}

        $tripulante->unsetNave();
        $missoesTripulante = $tripulante->getMissoes();

        foreach($missoesTripulante as $index => $missao){
            if($missao == $this->missao[0]){
                $tripulante->unsetMissao($index);
            }
            break;
        }

        unset($this->tripulantes[$indiceTripulante]);
        $this->tripulantes = array_values($this->tripulantes);

        $log = "Tripulante ".$tripulante->getNome()." desembarcou da nave ".$this->nome.".";
        $this->criarLog($log);
    }

    /**
     * Método que adiciona 50 de energia para a nave (1 viagem) 
     *
     * @return void
     */
    public function recarregarEnergia() : void{
        if($this->nivelEnergia + 50 > 100){
            $this->nivelEnergia = 100; 
            $log = "Nave ".$this->nome." está com a energia completamente carregada.";
            $this->criarLog($log);
            return;
        }
        
        $this->nivelEnergia += 50;

        $log = "Nave ".$this->nome." recarregou a energia";
        $this->criarLog($log);
    }

    /**
     * Método get retornando os tripulantes da nave
     *
     * @return array
     */
    public function getTripulantes() : array{
        return $this->tripulantes;
    }

    /**
     * Método get retornando a capacidade de tripulantes da nave
     *
     * @return integer
     */
    public function getCapacidade() : int {
        return $this->capacidadeTripulantes;
    }

    /**
     * Método get retornando a energia atual da nave
     *
     * @return integer
     */
    public function getEnergia() : int {
        return $this->nivelEnergia;
    }

    /**
     * Método herdado da classe abstrata responsável por gerar ID
     * @return string
     */
    public function gerarID() : string{
        return "NAVE-".uniqid("", true);
    }
}