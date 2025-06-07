## Descrição do Projeto

Você deve desenvolver um sistema em PHP orientado a objetos que gerencie expedições intergalácticas. O sistema deve controlar `Nave Espacial`, `Tripulante`, `Missão` e `Relatório de Exploração`, com foco em abstração, modularidade e boas práticas de programação orientada a objetos. O objetivo é criar um sistema robusto que demonstre domínio dos conceitos de POO, manipulação de strings com funções nativas do PHP e documentação clara, incluindo um diagrama de classes.

---

## Requisitos Funcionais

### Entidades Principais

- **Nave Espacial**: Representa uma nave com os atributos:
  - `nome` (string)
  - `tipo` (exploração, transporte, combate)
  - `capacidadeTripulantes` (inteiro)
  - `nivelEnergia` (inteiro, entre 0 e 100)

- **Tripulante**: Um astronauta ou robô com os atributos:
  - `nome` (string)
  - `funcao` (piloto, engenheiro, cientista)
  - `nivelExperiencia` (inteiro, entre 1 e 10)

- **Missão**: Uma expedição com os atributos:
  - `destino` (planeta ou estação)
  - `duracao` (inteiro, em dias)
  - `status` (planejada, em andamento, concluída)
  - Uma nave associada

- **Relatório de Exploração**: Um registro com os atributos:
  - `descricao` (string)
  - `dataGeracao` (string no formato 'Y-m-d H:i:s')
  - Conteúdo formatado usando manipulação de strings

### Relacionamentos

- Uma `Nave` pode ter **muitos** `Tripulantes`, mas um `Tripulante` está associado a apenas **uma** `Nave` por vez (relacionamento **1:N**).
- Uma `Missão` está associada a **uma** `Nave` e pode gerar **muitos** `Relatórios` (relacionamento **1:N**).
- Um `Tripulante` pode participar de **muitas** `Missões`, e uma `Missão` pode ter **muitos** `Tripulantes` (relacionamento **N:N**).

### Funcionalidades

- Criar, atualizar e listar `Naves`, `Tripulantes`, `Missões` e `Relatórios`.
- Gerar relatórios formatados usando pelo menos duas funções nativas de strings do PHP (ex.: `strtoupper()`, `substr()`, `str_replace()`, `date()`, `trim()`) para por exemplo:
  - Capitalizar nomes de planetas (ex.: "mars" → "Mars").
  - Truncar descrições longas (máximo 100 caracteres).
- Validar dados:
  - `nivelEnergia` da nave deve estar entre 0 e 100.
  - `nivelExperiencia` do tripulante deve estar entre 1 e 10.
- Simular o início de uma missão, verificando:
  - Se a nave tem energia suficiente (`nivelEnergia` >= 50).
  - Se há pelo menos um piloto com `nivelExperiencia` >= 5.

---

## Requisitos Técnicos

- Use **strict types** (`declare(strict_types=1);`) em todos os arquivos PHP.
- Use **union types** para métodos que aceitam múltiplos tipos (ex.: um método que aceita `string|int` para IDs).
- Use **match** para ao menos uma funcionalidade (ex.: determinar o tipo de missão com base no `destino`, como "planeta" ou "estação").
- Crie **métodos e propriedades estáticas** para funcionalidades globais (ex.: contador de missões concluídas ou método para formatar strings globalmente).
- Use **traits** para compartilhar comportamentos entre classes (ex.: um trait `Loggable` para registrar atividades como "Missão iniciada").
- Defina **interfaces** para garantir contratos (ex.: `Reportable` para classes que geram relatórios).
- Crie **classes abstratas** para fatores comuns (ex.: uma classe abstrata `SpaceEntity` para `Nave` e `Tripulante`).
- Implemente **getters e setters** para todos os atributos privados, com validação nos setters (ex.: lançar exceção se o `nivelEnergia` for inválido).
- Use pelo menos duas **funções nativas de manipulação de strings** do PHP para formatar relatórios e outros dados.
- Documente **todas as classes, métodos e propriedades** com **DocBlocks** detalhados.
- Use **Composer** para gerenciar as classes, interfaces e traits, configurando um arquivo `composer.json` com autoload PSR-4.

### Diagrama de Classes

- Crie um diagrama de classes usando o **Astah** (ou outra ferramenta de modelagem UML) mostrando todas as classes, interfaces, traits, relacionamentos (1:N, N:N) e heranças.
- Envie uma **imagem do diagrama** (formato PNG ou JPG) junto com o projeto.

### Estrutura do Projeto

- Configure o autoload no `composer.json` para carregar automaticamente as classes, interfaces e traits.

---

## Requisitos Não-Funcionais

- **Código limpo**: Siga as convenções **PSR-12** para estilo de código.
- **Documentação**: Use DocBlocks para descrever o propósito de classes, métodos, parâmetros e retornos.
- **Modularidade**: As classes devem ter responsabilidades únicas (princípio SOLID).
- **Validação**: Trate erros com exceções (ex.: lançar uma exceção se o `nivelEnergia` da nave for inválido).
- **Portabilidade**: O sistema deve rodar em qualquer ambiente com PHP 8.0 ou superior, com dependências gerenciadas pelo Composer.

---

## Entregáveis

1. **Código-fonte do projeto**, incluindo:
   - Arquivos PHP com as classes, interfaces, traits e lógica implementada.
   - Arquivo `composer.json` configurado com autoload PSR-4.
2. **Imagem do diagrama de classes** (PNG ou JPG) criado no Astah.
3. **Documentação** via DocBlocks em todos os elementos do código.

---

## Critérios de Avaliação

O projeto será avaliado com base nos seguintes critérios:

### Correção (30%)
- O sistema atende a todos os requisitos funcionais (criação, atualização, listagem, validação, etc.).
- As funcionalidades são implementadas sem erros e produzem os resultados esperados.
- Os relacionamentos (1:N, N:N) estão corretamente modelados e implementados.

### Uso de Conceitos de POO (30%)
- Implementação correta de classes abstratas, interfaces, traits, métodos/propriedades estáticas e getters/setters.
- Uso adequado de union types, strict types e match expression.
- Aplicação correta de herança, polimorfismo e encapsulamento.

### Qualidade do Código (20%)
- Código segue PSR-12 e está bem organizado (estruturado em pastas, classes com responsabilidades claras).
- Uso correto de manipulação de strings com funções nativas do PHP (ex.: `strtoupper()`, `substr()`, `date()`).
- Configuração correta do Composer com autoload PSR-4.
- Tratamento de erros com exceções.

### Documentação e Diagrama (20%)
- DocBlocks completos e bem redigidos para todas as classes, métodos e propriedades.
- Diagrama de classes claro, com todos os relacionamentos, heranças e interfaces representados.
- 
---

## Instruções para Submissão

- Envie o código-fonte em um repositório Git (ex.: GitHub) ou como um arquivo ZIP.
- Inclua a imagem do diagrama de classes (PNG ou JPG) no mesmo repositório ou arquivo.
- Certifique-se de que o projeto inclui o `composer.json` configurado e que o comando `composer install` funciona corretamente.
- Teste o sistema localmente antes de enviar para garantir que ele funciona sem erros.

---

## Dicas

- Comece modelando o diagrama de classes no Astah para visualizar as entidades e relacionamentos.
- Use funções nativas do PHP como `date()` para manipulação de datas.
- Configure o autoload no `composer.json` com a estrutura PSR-4 (ex.: `"autoload": {"psr-4": {"App\\": "src/"}}`).
- Teste cada funcionalidade incrementalmente para evitar erros acumulados.
- Consulte a documentação do PHP para funções de strings e recursos avançados como `match` e union types.
