<?php
//declarando que o arquivo usa strict types
declare(strict_types=1);
//carregando o autoload do composer
require("vendor/autoload.php");

use App\Classes\{Tripulante, NaveEspacial, EntidadeEspaco, Missao};

//criando tripulantes e exibindo dados
$tripulanteArthur = new Tripulante("Arthur Borges Vieira", "Piloto", 5);
echo $tripulanteArthur->getDados()."<br>";
$tripulanteChico = new Tripulante("Chico Joarez Saldanã", "Cientista", 2);
echo $tripulanteChico->getDados()."<br>";
$tripulanteCaio = new Tripulante("Caio Costa e Silva", "Piloto", 2);
echo $tripulanteCaio->getDados()."<br>";

//criando naves espaciais e exibindo dados
$naveC750 = new NaveEspacial("C750 Explorer", "Exploração", 2);
echo $naveC750->getDados();
echo "<br>";
$naveL2000 = new NaveEspacial("LS2000 Combat", "Combate", 1);
echo $naveL2000->getDados();
echo "<br>";

//adicionando tripulantes nas naves
$naveC750->setTripulante($tripulanteArthur);
$naveC750->setTripulante($tripulanteChico);
$naveL2000->setTripulante($tripulanteCaio);


//criando missão
$missaoMarte = new Missao("marte", 10, $naveC750);
$missaoMarte->setStatus("andamento");
$missaoMarte->criarRelatorio("Chegamos ao planeta vermelho sem nenhuma baixa.");
$missaoMarte->criarRelatorio("Senhor, estamos sendo atacad 'bzzzzzzzz' 'booooom'");
$missaoMarte->setStatus("concluida");

//exibindo dados da missão
echo $missaoMarte->getDados();
echo "<br>";

//exibindo o total de naves criadas
echo "Total de naves na frota: ".NaveEspacial::$quantidadeNaves."<br>";

//exibindo o total de missões concluídas
echo "Total de missões concluídas: ".Missao::$missoesConcluidas."<br>";

//logs de um tripulante
$logsArthur = $tripulanteArthur->getLogs();
foreach($logsArthur as $log){
    echo $log."<br>";
}

//logs de nave
$logsC750 = $naveC750->getLogs();
foreach($logsC750 as $log){
    echo $log."<br>";
}
$logsL2000 = $naveL2000->getLogs();
foreach($logsL2000 as $log){
    echo $log."<br>";
}

//logs de uma missão
$logsMissaoMarte = $missaoMarte->getLogs();
foreach($logsMissaoMarte as $log){
    echo $log."<br>";
}

//relatorios de uma missao
$relatoriosMissaoMarte = $missaoMarte->getRelatorios();

foreach($relatoriosMissaoMarte as $relatorio){
    echo $relatorio."<br>";
}