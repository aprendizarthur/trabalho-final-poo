Você deve desenvolver um sistema em PHP orientado a objetos para gerenciar expedições intergalácticas. O sistema deve controlar naves espaciais, tripulantes, missões e relatórios de exploração, com foco em abstração, modularidade e boas práticas de programação orientada a objetos. O objetivo é criar um sistema robusto que demonstre domínio dos conceitos de POO, manipulação de strings com funções nativas do PHP, e documentação clara, incluindo um diagrama de classes.

Requisitos Funcionais

Entidades Principais:

Nave Espacial: Representa uma nave com atributos como nome, tipo (exploração, transporte, combate), capacidade de tripulantes (inteiro) e nível de energia (0 a 100, float).
Tripulante: Um astronauta ou robô com nome, função (piloto, engenheiro, cientista) e nível de experiência (1 a 10, inteiro).
Missão: Uma expedição com destino (planeta ou estação), duração (em dias, inteiro), status (planejada, em andamento, concluída) e uma nave associada.
Relatório de Exploração: Um registro com descrição da missão, data de geração (string no formato 'Y-m-d H:i:s') e conteúdo formatado usando manipulação de strings.


Relacionamentos:

Uma Nave pode ter muitos Tripulantes, mas um Tripulante está associado a apenas uma Nave por vez (relacionamento 1:N).
Uma Missão está associada a uma Nave e pode gerar muitos Relatórios (relacionamento 1:N).
Um Tripulante pode participar de muitas Missões, e uma Missão pode ter muitos Tripulantes (relacionamento N:N).


Funcionalidades:

Criar, atualizar e listar naves, tripulantes, missões e relatórios.
Gerar relatórios formatados usando funções nativas de strings do PHP (ex.: strtoupper, substr, str_replace, date, trim) para:
Capitalizar nomes de planetas (ex.: "mars" → "Mars").
Truncar descrições longas (máximo 100 caracteres).
Formatar datas no padrão 'd/m/Y H:i'.


Validar dados (ex.: nível de energia da nave entre 0 e 100, experiência do tripulante entre 1 e 10).
Simular o início de uma missão, verificando se a nave tem energia suficiente (>= 50) e pelo menos um piloto com experiência >= 5.


Requisitos Técnicos:

Use strict types (declare(strict_types=1);) em todos os arquivos PHP.
Use union types para métodos que aceitam múltiplos tipos (ex.: um método que aceita string|int para IDs).
Use match para ao menos uma funcionalidade (ex.: determinar o tipo de missão com base no destino, como "planeta" ou "estação").
Crie métodos e propriedades estáticas para funcionalidades globais (ex.: contador de missões concluídas ou método para formatar strings globalmente).
Use traits para compartilhar comportamentos entre classes (ex.: um trait Loggable para registrar atividades como "Missão iniciada").
Defina interfaces para garantir contratos (ex.: Reportable para classes que geram relatórios).
Crie classes abstratas para fatores comuns (ex.: uma classe abstrata SpaceEntity para Nave e Tripulante).
Implemente getters e setters para todos os atributos privados, com validação nos setters (ex.: lançar exceção se o nível de energia for inválido).
Use métodos mágicos:
__get e __set para acessar propriedades dinamicamente.
__toString para representar objetos como strings (ex.: nome da nave ou missão).
__invoke para executar uma ação específica (ex.: iniciar uma missão).


Use funções nativas de manipulação de strings do PHP para formatar relatórios e outros dados.
Documente todas as classes, métodos e propriedades com DocBlocks detalhados.
Gerencie arquivos PHP com includes manuais, organizando-os em uma estrutura clara (sem usar Composer).


Diagrama de Classes:

Crie um diagrama de classes usando o Astah (ou outra ferramenta de modelagem UML) mostrando todas as classes, interfaces, traits, relacionamentos (1:N, N:N) e heranças.
Envie uma imagem do diagrama (formato PNG ou JPG) junto com o projeto.


Estrutura do Projeto:

Organize o projeto em pastas como src/ (código-fonte), tests/ (testes unitários, se aplicável), e docs/ (documentação).
Use includes ou require para carregar classes manualmente, garantindo que o sistema funcione sem dependências externas.
Forneça um arquivo README.md no projeto com instruções para rodar o sistema e uma explicação breve de cada classe.



Requisitos Não-Funcionais

Código limpo: Siga as convenções PSR-12 para estilo de código.
Documentação: Use DocBlocks para descrever o propósito de classes, métodos, parâmetros, retornos e exceções.
Modularidade: As classes devem ter responsabilidades únicas (princípio SOLID).
Validação: Trate erros com exceções (ex.: lançar uma exceção se a energia da nave for inválida).
Portabilidade: O sistema deve rodar em qualquer ambiente com PHP 8.0 ou superior, sem dependências externas.

Entregáveis

Código-fonte do projeto, incluindo:
Arquivos PHP com as classes, interfaces, traits e lógica implementada.
Arquivo README.md com instruções de instalação e uso.


Imagem do diagrama de classes (PNG ou JPG) criado no Astah.
Documentação via DocBlocks em todos os elementos do código.

Critérios de Avaliação
O projeto será avaliado com base nos seguintes critérios:

Correção (30%):

O sistema atende a todos os requisitos funcionais (criação, atualização, listagem, validação, etc.).
As funcionalidades são implementadas sem erros e produzem os resultados esperados.
Os relacionamentos (1:N, N:N) estão corretamente modelados e implementados.


Uso de Conceitos de POO (30%):

Implementação correta de classes abstratas, interfaces, traits, métodos/propriedades estáticas, getters/setters e métodos mágicos (__get, __set, __toString, __invoke).
Uso adequado de union types, strict types e match expression.
Aplicação correta de herança, polimorfismo e encapsulamento.


Qualidade do Código (20%):

Código segue PSR-12 e está bem organizado (estruturado em pastas, classes com responsabilidades claras).
Uso correto de manipulação de strings com funções nativas do PHP (ex.: strtoupper, substr, date).
Gerenciamento correto de arquivos com includes/require, sem dependências externas.
Tratamento de erros com exceções.


Documentação e Diagrama (20%):

DocBlocks completos e bem redigidos para todas as classes, métodos e propriedades.
Diagrama de classes claro, com todos os relacionamentos, heranças e interfaces representados.
README.md claro, com instruções de instalação e uso.



Instruções para Submissão

Envie o código-fonte em um repositório Git (ex.: GitHub) ou como um arquivo ZIP.
Inclua a imagem do diagrama de classes (PNG ou JPG) no mesmo repositório ou arquivo.
Certifique-se de que o projeto inclui todos os arquivos PHP necessários e que os includes/require estão configurados corretamente.
Teste o sistema localmente antes de enviar para garantir que ele funciona sem erros.

Dicas

Comece modelando o diagrama de classes no Astah para visualizar as entidades e relacionamentos.
Use funções nativas do PHP como date() para manipulação de datas, em vez de bibliotecas externas.
Organize os includes em um arquivo central (ex.: autoload.php) para simplificar o carregamento de classes.
Teste cada funcionalidade incrementalmente para evitar erros acumulados.
Consulte a documentação do PHP para funções de strings e recursos avançados como match e union types.

Boa sorte na construção do sistema de expedições intergalácticas!
