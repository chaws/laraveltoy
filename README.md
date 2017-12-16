# Laratoy
Projeto simples demontrando uso do framework Laravel 5: http://ochaws.com/laratoy

## Funcionalidades
## Área autenticada
O Laravel dispõe de comandos que permitem a criação completa autenticação. Logo em poucos passos foi possível a criação da tela de [Login](http://ochaws.com/laratoy/login), [Registro](http://ochaws.com/laratoy/register) e [Recuperação de Senha](http://ochaws.com/laratoy/password/reset)

## Cadastro 
O core da aplicação está em um cadastro de números. Isso mesmo, inserir/consultar/editar/deletar (CRUD) um registro com apenas 2 campos: `Nome` e `Valor`.

## Temperatura atual / Relógio
Foi feita interação com uma API para consultar a temperatura atual da cidade de São Paulo, SP, ficando essa informação no rodapé de todas as páginas, junto com um relógio simples implementado em javascript

## Mini news-crawler
A tela de dashboard contém uma notícia diferente a cada vez que a página é carregada. A notícia é extraída da revista online Exame com assuntos imobiliários. Note que há uma limitação em que notícias não são guardadas no banco, apenas foi criado um serviço para extração das mesmas em site de 3o.

## Dependências usadas no projeto
### Apache 2
A configuração padrão é quase suficiente, lembrado que é necessário habilitar `mod_rewrite` e também se certificar que a diretiva `AllowOverwrite` esteja habilitada para o diretório de instalação do Laravel

### MySQL
A configuração básica do banco de dados é suficiente para suportar o Laravel. Lembre-se de criar um banco de dados e usuário, necessários na configuração (arquivo '.env') da aplicação

### PHP
O framework Laravel requere que seja usado PHP 7+ por ser mais moderno. É importante também a instalação das extensões do PHP7+: common, zip, mysql, mbstring e dom. Os nomes dos pacotes podem variar de acordo com cada systema.

### Composer
A versão mais atual do composer é suficiente para o propósito desse projeto

### Node.js
Para compilar os assets (css e js) é necessário uma instância do npm na máquina

### Laravel
Laravel 5, versão mais atual até então (dez/2017), foi utilizado. Com ele, também foi utilizado o plugin `LaravelCollective`, para auxiliar na criação de formulários 

#### Subdependências
A instalação básica do Laravel trás por padrão o framework front-end Bootstrap e o jQuery, que auxiliam bastante em layout e dinâmica das páginas.

### Servidor
Este projeto encontra-se hospedado em uma droplet da DigitalOcean, configurado com Debian 9 pela facilidade de encontrar as dependências pré-empacotadas, simples de instalar

## Melhorias
O projeto foi desenvolvido em 4 noites + 1 madrugada, logo é esperado encontrar **bugs**. Além de bugs, note que o site **NÃO** está habilitado com SSL, logo **NÃO** utilize senhas reais caso queira testar a aplicação criando, por exemplo, um registro com senha.


Dicas e sugestões são bem-vindas!


