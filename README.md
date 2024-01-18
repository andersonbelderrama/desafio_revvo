# Desafio Revvo

## Autor

Anderson Belderrama
andersonbelderrama@gmail.com

## Tecnologias

- PHP 8.2 with Composer
- Javascript
- TailwindCSS
- MariaDB/MySQL 
- Docker with Docker Compose
- Node/NPM

## Deploy

Run Server Docker

`docker-compose up -d`

Run Server Local

`php -S localhost:8000 -t public`

Migrar Banco de Bancos via Docker

`docker-compose exec web php database/migrate.php`

Popular Banco de Dados via Docker

`docker-compose exec web php database/seed.php`

Migrar Banco de Bancos Local ou em Produção

`php database/migrate.php`

Popular Banco de Dados ou em Produção

`php database/seed.php`

Build Frontend(quando houver mudanças futuras)

`npm run build`

Run Server Test Frontend

`npm run dev`

Permissao Extra Pasta Imagens

`chmod 777 public/assets/img/courses/`

## Informção de login

- E-mail: test@test.com
- Password: password

