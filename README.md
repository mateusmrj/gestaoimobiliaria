# Desafio Vista

Sistema de gestão imobiliária.

## Sobre a aplicação

Aplicação de base Docker.
PHP-7.4-FPM Alpine + Nginx + MySQL 5.6
Bootstrap + JQuery
Desenvolvido em ambiente linux.

## Para rodar o projeto

Clone o projeto:
```sh
git clone https://github.com/mateusmrj/gestaoimobiliaria.git
```
Vá há a pasta do projeto.

Build o docker.
Execute:

```sh
docker-compose up -d --build

```

Projeto está rodando na porta 80 inicialmente.

### Banco de Dados
O dump do banco se encontra na pasta db, raiz do projeto.
O banco é criado automaticamente pelo docker e poder ser acessado na porta 8080, via Adminer. 


