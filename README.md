# Proyecto F5 - Gestión de Puestos

Este proyecto es una aplicación web desarrollada con Symfony para gestionar puestos de trabajo, incluyendo su número, ocupación, observaciones y localización.

## 🚀 Tecnologías utilizadas

- PHP 8.x
- Symfony 6.x
- Doctrine ORM
- Twig
- MySQL
- Docker (opcional)

## 📦 Instalación

```bash
git clone https://github.com/tu-usuario/Proyecto_F5.git
cd Proyecto_F5
composer install
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
symfony server:start
