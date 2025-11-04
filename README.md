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

## Clona el repositorio
git clone https://github.com/tu-usuario/Proyecto_F5.git

##Desplazarse en la ruta del proyecto
cd Proyecto_F5

##Instalar composer para Synfony
composer install

##Crear la base de datos
php bin/console doctrine:database:create

## crea con las entidades o modifica las tablas de la base de datos
php bin/console doctrine:migrations:migrate

##Arrancar el Synfony
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
.env.example y reniombrerlo a .env en el directorio raiz de la app

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

# Entidad	Relación con	Tipo de relación
# Localizacion	Puesto	ManyToMany
# Puesto	Localizacion	ManyToMany
# Puesto	Personaje	ManyToOne
# Personaje	Puesto	OneToMany
