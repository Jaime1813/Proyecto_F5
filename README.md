# Proyecto F5 - Gestión de Puestos

Este proyecto es una aplicación web desarrollada con Symfony para gestionar puestos de trabajo, incluyendo su número, ocupación, observaciones y localización.

## Tecnologías utilizadas

- PHP 8.x
- Symfony 6.x
- Doctrine ORM
- Twig
- MySQL
- Docker (opcional)

## Instalación sin Docker


git clone https://github.com/tu-usuario/Proyecto_F5.git
cd Proyecto_F5
composer install
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
symfony server:start

## Instalación y ejecución con Docker

### Requisitos previos

- Docker
- Docker Compose

## Pasos para levantar el entorno

# Clona el repositorio
git clone https://github.com/tu-usuario/Proyecto_F5.git
cd Proyecto_F5

# Copia el archivo de entorno
cp .env.docker .env

# Levanta los contenedores
docker-compose up -d

# Instala dependencias dentro del contenedor
docker exec php composer install

# Crea la base de datos
docker exec php php bin/console doctrine:database:create

# Ejecuta las migraciones
docker exec php php bin/console doctrine:migrations:migrate

# Accede a la app en el navegador
http://localhost:8080
