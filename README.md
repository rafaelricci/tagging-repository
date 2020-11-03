# Tagging-Repository

Tagging-Repository permite criar Tags e associa-las a Repositórios que vem diretamente do GitHub.


### Como Installar

Execute o `composer install` para instalar as dependências que a aplicação utiliza. Caso não possua o composer utilize estas [instruções](https://getcomposer.org/download/) para instalar.

Excutando `composer install`

```
  composer install    
```

Gerar `token` para utilizar a API do GitHub você precisará de um token para autenticação, acesse este [link](https://developer.github.com/v3/auth/#via-oauth-and-personal-access-tokens) para receber as instruções. Com o token em mãos basta ir no ser arquivo `.env` e alterar a variavel de ambiente.

```
  GIT_HUB_API_TOKEN=meu_token_gerado_no_git_hub    
```

Após instalar as dependências crie o seu banco de dados, **atualmente a App está configurada para utilizar o banco de dados MySQL**, mas caso queria alterar basta ir no seu arquivo `.env` e alterar as variaveis de ambiente de conexão com banco de dados.

Para gerar a estrutura de tabelas do seu banco de dados basta excutar o seguinte comando para que as migrations sejam executadas (para saber mais sobre migrations acesse este [link](https://laravel.com/docs/8.x/migrations).):

```
  php artisan migrate    
```

## Como executar os testes

Execute este comando:

```
  php artisan test    
```

**Outputs esperados**

!["Output"](doc/tess-outputs/output1.png) 
!["Output"](doc/tess-outputs/output2.png) 


### Dependências

Tagging-Repository depende de:

* PHP >= 7.3
* [Dependências do Laravel](https://laravel.com/docs/8.x)

## Bibliotecas utilizadas

PHP:

* Laravel/ui
* guzzlehttp/guzzle
* lucascudo/laravel-pt-br-localization
* felixkiss/uniquewith-validator
* php-vcr/phpunit-testlistener-vcr

JS:

* chart.js 
* choices.js

Observação: todos as bibliotecas JS forão baixadas a mão e movidas para o projeto.  

### Documentação

[Link para descrição do projeto](https://docs.google.com/document/d/1VZGcGndH3VTJEupkM3Pt_NNeApo-qiJFWEvffTfYjS4/edit?usp=sharing)

**Modelo de entidade relacional**

!["Entidades relacionais"](doc/modelagem/entidades.png)

**Board do Trello**

Para ter acesso ao board no Trello basta entrar em contato solicitando acesso. (Imagem do board)  
!["Board do Trello"](doc/board/trello.png)
