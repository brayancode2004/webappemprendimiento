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
git clone https://github.com/brayancode/ferias-emprendimiento.git
cd ferias-emprendimiento
Instalar dependencias de PHP:

bash
Copiar
Editar
composer install
Instalar dependencias de frontend:

bash
Copiar
Editar
npm install
npm run dev
Crear archivo .env:

bash
Copiar
Editar
cp .env.example .env
Configurar la conexión a base de datos en el archivo .env:

ini
Copiar
Editar
DB_DATABASE=nombre_de_tu_bd
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña
Generar la clave de la app:

bash
Copiar
Editar
php artisan key:generate
Ejecutar migraciones:

bash
Copiar
Editar
php artisan migrate
Iniciar servidor local:

bash
Copiar
Editar
php artisan serve
Luego, podés acceder a la app en: http://localhost:8000
