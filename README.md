# Open Food Facts
Esta aplicação tem o objetivo de consumir a API da [Open Food Facts](https://br.openfoodfacts.org/data), persitir os dados em um banco de dados local e manipular esses dados persistidos na própria aplicação, através de uma API RESTful.
## Índice
- [Open Food Facts]
    - [Índice](#índice)
    - [Dependências para executar local](#dependências-para-executar-local)
    - [Tecnologias](#tecnologias)
    - [Setup](#setup)
    - [CRON](#cron)
    - [Rodando a aplicação](#rodando-a-aplicação)
    - [Autenticação](#autenticação)
    - [Documentação](#documentação)
    - [Testes](#testes)
    - [Vídeo](#vídeo)
    - [Mais informações](#mais-informações)

## Dependências para executar local
- [Docker](https://www.docker.com/)
## Tecnologias
- [Laravel](https://laravel.com)
- [Nginx](https://www.nginx.com/)
- [MySQL](https://www.mysql.com/)
- [Docker](https://www.docker.com/)
- [Supervisor](http://supervisord.org/)
- [Composer](https://getcomposer.org/)
- [Docker Compose](https://docs.docker.com/compose/)
## Setup
Clone este repositório
```
git clone https://github.com/alvesblackv/fitness-foods-lc.git
```
Execute o docker para buildar o ambiente
```
docker-compose build
```
Instale as dependências do projeto
```
docker-compose exec web composer install
```
Gere o arquivo .env
```
docker-compose exec web cp .env.example .env
```
Crie a chave da aplicação
```
docker-compose exec web php artisan key:generate
```
Execute as migrations
```
docker-compose exec web php artisan migrate
```
## CRON
A aplicação possui um CRON para executar diariamente o fluxo de processar os arquivos, ela executa de forma automatizada com o uso do supervisor
## Rodando a aplicação
Execute o comando para subir os containers
```
docker-compose up
```
Por padrão ao executar o comando ele irá subir o Laravel na porta `8000`

## Autenticação
Para conseguir acessar os endpoints, é necessário definir uma API_KEY, abra o arquivo .env e defina a sua key
```
API_KEY=SUAKEYAQUI
```
Caso for realizar qualquer autenticação nos endpoints (exceto o da documentação) é necessário enviar um header da chave 'x-api-token' e o seu valor será o que está no env API_KEY

## Documentação
Após rodar a aplicação, basta acessar o link abaixo para conferir o swagger (Open API 3.0) ou [clique aqui](https://www.postman.com/dentos-team/workspace/marcelo-public-workspace/collection/19681059-f0483e70-a36d-42dc-ac01-e276658cea53?action=share&creator=19681059)
para visualizar a colection do Postman
```
http://localhost:8000/documentation
```

## Testes
Para executar testes da aplicação, basta executar o comando abaixo
```
docker-compose exec web php artisan test
```
## Vídeo
O link do vídeo mostrando um pouco do projeto :)
```
https://www.loom.com/share/0f3d99958d704d5d80456e48f9482ac0
```
## Mais informações
Segue sites que foram essenciais para executar esse projeto
- [Refactoring Guru](https://refactoring.guru/design-patterns/)
- [Dias de Dev](https://www.youtube.com/@DiasdeDev)
- [Laravel Documentação](https://laravel.com/docs/10.x)
- [Alura](https://alura.com.br)
- [PHP-FIG](https://www.php-fig.org/psr/)
