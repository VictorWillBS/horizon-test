# Surf Champ API [Horizon-Test]

## Descrição
Este projeto é uma API desenvolvida em Laravel que fornece serviços de gestão de um campeonato de Surf.

## Requisitos
- PHP [`8.1`]
- Composer
- Laravel [`10.x`]
- MYSQL [`8.0`]

## Instalação
1. Clone o repositório: `git clone https://github.com/VictorWillBS/horizon-test`
2. Navegue até o diretório do projeto: `cd horizon-test`
3. Instale as dependências: `composer install`
4. Copie o arquivo de configuração: `cp .env.example .env`
5. Configure o arquivo `.env` com suas configurações de banco de dados e outras necessárias.
6. Gere a chave de aplicativo: `php artisan key:generate`
7. Execute as migrações do banco de dados: `php artisan migrate`

## Uso
- Execute o servidor de desenvolvimento: `php artisan serve`
- Acesse a API em: `http://localhost:8000`

## Rotas


- **Obter todos os surfistas:**
  - Método: `GET`
  - URL: `http://localhost:8000/api/surfer/all`

- **Criar um novo surfista:**
  - Método: `POST`
  - URL: `http://localhost:8000/api/surfer`
  - Parâmetros: 
    - `name` (string): Nome do surfista
    - `country` (string): País do surfista
    - `number` (number): Número do surfista
  - Exemplo usando cURL:
    ```bash
    curl -X POST -H "Content-Type: application/json" -d '{"name": "Gabriel Medina", "country": "Brasil", "number": "01"}' http://localhost:8000/api/surfer/all
    ```

- **Criar uma nova Bateria de Ondas:**
  - Método: `POST`
  - URL: `http://localhost:8000/api/battery`
  - Parâmetros: 
    - `participants_numbers`(object): Objetos com os participantes
    - `participants_numbers.surfer_1` (number): Número do surfista
    - `participants_numbers.surfer_2` (number): Número do surfista
  - Exemplo usando cURL:
    ```bash
    curl -X POST -H "Content-Type: application/json" -d '{"participants_numbers": "{"surfer_1":1,surfer_2:2}"}' http://localhost:8000/api/battery
    ```

- **Obter o vencedor de uma bateria por id:**
  - Método: `GET`
  - URL: `http://localhost:8000/api/battery/{$id}/winner`
  
- **Criar uma nova Onda:**
  - Método: `POST`
  - URL: `http://localhost:8000/api/wave`
  - Parâmetros: 
    - `surfer_id` (number): Id do surfista
    - `battery_id` (number): Id da bateria 
  - Exemplo usando cURL:
    ```bash
    curl -X POST -H "Content-Type: application/json" -d '{"surfer_id":1,"battery_id":1}' http://localhost:8000/api/wave
    ```


- **Criar uma nova Nota:**
  - Método: `POST`
  - URL: `http://localhost:8000/api/score`
  - Parâmetros: 
    - `wave_id`(number): Id da onda
    - `scores` (array|size:3): Array de notas parciais
  - Exemplo usando cURL:
    ```bash
    curl -X POST -H "Content-Type: application/json" -d '{"wave_id": 01, "scores":[8,10,9]}' http://localhost:8000/api/score
    ```

## Teste E2E Manual
- **Utilização**
    - Instale uma plataforma de API. Ex: Thunder Client, Insomnia, Postman.
    - Importe a ```routes_collections.json```.
    - Teste as rotas.
