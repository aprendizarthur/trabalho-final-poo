<?php
//declarando que o arquivo usa strict types
declare(strict_types=1);
//namespace da classe
namespace App\Classes;
//adicionando classe exception nativa do php
use Exception;
//adicionando classes utilizadas no arquivo
use \App\Interfaces\Reportavel;
use \App\Classes\{Relatorio, EntidadeEspaco, Tripulante};

/**
 * Classe concreta missão que implementa a interface reportável responsável por gerar relatórios
 */
class Missao implements Reportavel
{
    /**
     * Propriedade estática que armazena a quantidade de missões que foram concluídas
     * @var integer
     */
    public static $missoesConcluidas = 0;
    /**
     * Propriedade privada array que armazena objetos instancias de relatório
     * @var array
     */
    private array $relatorios = [];
    
    /**
     * Propriedade privada que armazena o status da missao como string
     * @var string
     */
    private string $status = "Planejada";

    //adicionando as traits Logavel(logs) e Exibivel(mostrar dados) na classe para que sejam utilizadas
    use \App\Traits\Logavel;
    use \App\Traits\Exibivel;

    /**
     * Construtor que instancia um objeto missão com destino, duracao e nave
     *
     * @param string $destino
     * @param integer $duracao
     * @param NaveEspacial $nave
     */
    public function __construct(private string $destino, private int $duracao, private NaveEspacial $nave){
        if(!$this->verificacaoInicial()){throw new Exception("Para iniciar a missão, na nave deve haver um tripulante piloto com no mínimo nível de experiência 5");}
        
        $tripulantesNave = $nave->getTripulantes();

        foreach($tripulantesNave as $tripulante){
            $tripulante->setMissao($this);
        }
        $nave->setMissao($this);

        $log = "Planejada missão com destino ".$this->destino." de duração ".$this->duracao." dias usando a nave ".$nave->getNome().".";
        $this->criarLog($log);
    }

    /**
     * Método privado que verifica se na nave existe um piloto com experiencia >= 5 para iniciar a missão
     * @return boolean
     */
    private function verificacaoInicial() : bool {
        $tripulantesNave = $this->nave->getTripulantes();

        foreach($tripulantesNave as $tripulante){
            if(strtolower($tripulante->getFuncao()) === 'piloto' && $tripulante->getNivelExperiencia() >= 5){
                return true;
            }
        }
        return false;
    }

    /**
     * Método que define o status da missão, com validação para status inválidos
     * @param string $status
     * @return void
     */
    public function setStatus(string $status) : void {
        switch (strtolower($status)){
            case 'planejamento':
                throw new Exception("Uma missão não pode voltar para o planejamento");                break;
            break;
            
            case 'andamento': 
                $this->status = $status;
                if(!$this->nave->conferirEnergia()){$this->nave->recarregarEnergia();}
                $log = "Missão com destino ".strtoupper($this->destino)." usando a nave ".$this->nave->getNome()." em andamento.";
                $this->criarLog($log);
            break;

            case 'concluida':
                $this->status = $status;
                $log = "Missão com destino ".strtoupper($this->destino)." usando a nave ".$this->nave->getNome()." concluída.";
                $this->criarLog($log);
                self::$missoesConcluidas++;
            break;

            default:
                throw new Exception("Status inválido");
            break;
        }
    }

    /**
     * Método que instancia e armazena um novo objeto relatório da missão, que só deve ser
     * gerado se a missão estiver no status andamento
     * @param string $descricao
     * @return void
     */
    public function criarRelatorio(string $descricao) : void{
        if(strtolower($this->status) != "andamento"){ throw new Exception("Relatórios só podem ser criados quando a missão está em andamento");}
        $data = date('Y-m-d H:i:s');
        $relatorio = new Relatorio($descricao, $data, $this);
        $this->relatorios[] = $relatorio;

        $log = "Relatório gerado com sucesso em ".$data;
        $this->criarLog($log);
    }

    /**
     * Método get que retorna um array com todos os relatórios da missão formatados
     *
     * @return array
     */
    public function getRelatorios() : array {
        $formatados = [];

        foreach($this->relatorios as $index => $relatorio){
            $formatados[] = "Relatório ".($index + 1)." (".$relatorio->getData().") ".$relatorio->getDescricao();
        }
        return $formatados;
    }

    /**
     * Método get que retorna o destino da missão
     * @return string
     */
    public function getDestino() : string {
        return $this->destino;
    }

    /**
     * Método get que retorna a duração da missão em dias
     * @return integer
     */
    public function getDuracao() : int {
        return $this->duracao;
    }

    /**
     * Método get que retorna o status da missão
     * @return string
     */
    public function getStatus() : string {
        return $this->status;
    }
    
    /**
     * Método get que retorna o nome da nave utilizada na missão
     * @return string
     */
    public function getNave() : string {
        return $this->nave->getNome();
    }
}