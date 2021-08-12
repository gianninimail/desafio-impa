<p align="center"><a href="" target="_blank"><img src="logo-sys.png" width="400"></a></p>

<p align="center">
<a href=""><img src="linkdin-logo.png" width="80" alt="Perfil no Linkedin"></a>
<a href=""><img src="lattes.png" width="80" alt="Currículo Lattes"></a>
</p>

## Sobre a API Restful de Gerenciamento de Tarefas

Api desenvolvida como parte do Edital de Seleção para uma Vaga de Desenvolvedor Especialista em PHP/Laravel. 
A API foi desenvolvida no intuito de prover um funcionalidades de gerenciamento de Tarefas do usuário.
Sendo possível Listar, Cadastrar, Exibir, Atualizar, Deletar e mudar o status para Concluído.

As tecnologias utilizadas para a implementação do projeto foram as suas versões mais atuais.
A linguagem de programação foi PHP versão 8, o framework escolhido foi o Laravel versão 8, e o
Banco de Dados para armazenamento das informações foi o MySQL versão 8 comunitária.

Junto à API também foi implementado uma interface do usuário (UI) simples. Com intuido de mostrar
de forma mais ituitiva um exemplo de sistema utilizando a API. Nessa UI foi utilizado também
o Framework Laravel, com seu módulo Blade, no qual faz um papel falicilitador para o desenvolvedor
criar rápidas paǵinas com Design elegante. Foi utilizado um pouco de CSS com o Framework Tailwindcss.
Na qual o Blade já possui uma integração amigável.

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
