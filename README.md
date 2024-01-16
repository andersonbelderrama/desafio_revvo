# Desafio Revvo

## Autor

Anderson Belderrama

## Tecnologias

- Em Desenvolvimento.


## Deploy

- Em Desenvolvimento.



Run Server Docker

`docker-compose up -d`

Run Server Local

`php -S localhost:8000 -t public`


Migração via Docker

`docker-compose exec web php database/migrate.php`

Migração Local ou em Produção

`php database/migrate.php`

Build Frontend(quando houver mudanças futuras)

`npm run build`

Run Server Test Frontend

`npm run dev`