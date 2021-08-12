<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
</p>

## Sobre a API Restful de Gerenciamento de Tarefas

Api desenvolvida como parte do Edital de Seleção para uma Vaga de Desenvolvedor Especialista em PHP/Laravel. 
A API foi desenvolvida no intuito de prover um funcionalidades de gerenciamento de Tarefas do usuário.
Sendo possível Listar, Cadastrar, Exibir, Atualizar, Deletar e mudar o status para Concluído.

Para suporte do projeto em Servidor deve-se instalar os seguintes softwares:

- Apache 2.x
- PHP 8.x
- Composer 2.x
- MySQL 8.x ( criação de um schema/db com o nome de "tarefas")

Para execução do projeto deve-se executar os seguintes passos:

- git clone https://github.com/gianninimail/desafio-impa.git (Clonagem do projeto)
- composer install (Dentro da pasta do projeto)
- cp .env.exemplo .env (Para criar o arquivo de configuração da aplicação à partir do arquivo de exemplo)
- php artisan key:generate (Para gerar a chave única da aplicação - requisito do Laravel)
- gedit .env (Configuração do arquivo da aplicação para acesso ao BD e outros parâmetros adicionais)
  - DB_CONNECTION=mysql
  - DB_HOST=127.0.0.1
  - DB_PORT=3306
  - DB_DATABASE=
  - DB_USERNAME=php
  - DB_PASSWORD=
  - APP_NAME=Laravel (nome da aplicação)
- php artisan migrate (Comando para gerar as tabelas no Banco de Dados configurado no arquivo .env)
- php -S localhost:8000 -t public (comando executado dentro da pasta do projeto para executar a aplicação localmente) 

## Interfaces da API
Levando em consideração que o projeto esteja executando localmente na porta 8000:

- Consulta de todas as tarefas:
  - Método GET : http://localhost:8000/api/tasks

    <br />  
- Detalhar uma determinada Tarefa pelo ID:
    - Método GET : http://localhost:8000/api/tasks/{id}

      <br />  
- Criar uma nova Tarefa:
    - Método POST : http://localhost:8000/api/tasks
    - Campos necessários no cabeçalho:
      - X-CSRF-TOKEN: valor_do_token
  - Campos necessários para o modelo:
      - title 
      - description
      - finish
      - finish_at

      <br />  
- Alterar uma nova Tarefa:
    - Método PUT : http://localhost:8000/api/tasks/update/{id}
    - Campos necessários no cabeçalho:
        - X-CSRF-TOKEN: valor_do_token
    - Campos necessários para o modelo:
        - title
        - description
        - finish
        - finish_at

        <br /> 
- Mudar o Status de uma Tarefa para Completa pelo ID:
    - Método PUT : http://localhost:8000/api/tasks/complete/{id}
    - Campos necessários no cabeçalho:
        - X-CSRF-TOKEN: valor_do_token
      
        <br /> 
- Deletar uma Tarefa pelo ID
    - Método DELETE : http://localhost:8000/api/tasks/{id}
    - Campos necessários no cabeçalho:
        - X-CSRF-TOKEN: valor_do_tok
