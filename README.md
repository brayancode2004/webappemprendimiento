# 🧑‍🌾 Sistema de Registro de Ferias Comunitarias de Emprendimiento

Aplicación web desarrollada en Laravel para registrar ferias comunitarias de emprendimiento en barrios de Managua, así como los emprendedores que participarán en cada feria.

Este sistema fue desarrollado como parte del taller práctico de la clase de **Diseño Web** de la **Universidad Americana (UAM)**.

---

## 📌 Funcionalidades principales

- Registro, edición y eliminación de **Ferias**
- Registro, edición y eliminación de **Emprendedores**
- Asociación **muchos a muchos** entre ferias y emprendedores
- Listado detallado con vínculos entre ambas entidades
- Autenticación con Laravel Breeze
- Formularios con validaciones y mensajes amigables
- Control de versiones con Git y colaboración por ramas

---

## 🛠️ Tecnologías utilizadas

- Laravel 10
- Laravel Breeze (Blade + Tailwind CSS)
- PHP 8+
- MySQL
- Node.js y npm
- Git y GitHub
- Laragon (recomendado como entorno local)

---

## 🧱 Requisitos del sistema

- PHP >= 8.1
- Composer
- Node.js y npm
- MySQL
- Laravel 10+
- Navegador web moderno
- Entorno como **Laragon**, **XAMPP** o similar

---

## 🚀 Instalación paso a paso

1. Clonar el repositorio:

```bash
git clone https://github.com/brayancode/webappemprendimiento.git
cd webappemprendimiento
Instalar dependencias de PHP:
composer install

Instalar dependencias de frontend:

npm install
npm run dev

Crear archivo .env:

cp .env.example .env

Configurar la conexión a base de datos en el archivo .env:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dbemprendedores
DB_USERNAME=root
DB_PASSWORD=

Generar la clave de la app:
php artisan key:generate

Ejecutar migraciones:
php artisan migrate

Iniciar servidor local:
php artisan serve

