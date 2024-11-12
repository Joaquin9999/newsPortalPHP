# Portal de Noticias de Tecnología(CiberTrends)

Este es un **proyecto web de noticias de tecnología** construido con **Laravel 10**, que permite a los usuarios leer artículos, dejar comentarios moderados, y gestionar notificaciones. También tiene un panel de administración basado en **Voyager** para gestionar artículos, comentarios y usuarios.


# Descripción

El portal de noticias de tecnología ofrece contenido actualizado sobre tecnología, con un sistema de comentarios moderados, notificaciones para los usuarios y filtrado de artículos por categorías. El sistema de administración basado en **Voyager** permite a los administradores gestionar el contenido de manera eficiente, mientras que los usuarios pueden interactuar con los posts.

El proyecto está construido con **Laravel 10**, un potente framework PHP, y utiliza **Voyager** para el panel de administración y **Breeze** para el sistema de autenticación.

## Tecnologías y Herramientas Usadas


-   **Laravel 10**: Framework PHP utilizado para el desarrollo del backend.
-   **Voyager**: Paquete de administración para Laravel que facilita la creación de un panel de administración para gestionar el contenido.
-   **Breeze**: Paquete de autenticación de Laravel para login, registro y gestión de sesiones de usuario.
-   **MySQL**: Base de datos para almacenar posts, comentarios, usuarios y notificaciones.
-   **Bootstrap**: Framework CSS utilizado para el diseño y la maquetación del portal.
-   **Blade**: Motor de plantillas de Laravel para las vistas.
-   **PHP 8.1 o superior**: Requerido para ejecutar Laravel.
-  **Apache Win64 VS17**: Requerido para ejecutar Laravel.

## Requisitos
-   **PHP**: 8.1 o superior.
-   **Composer**: Para gestionar las dependencias de PHP.
-   **MySQL**: Base de datos para almacenamiento.
-   **Node.js y NPM** (opcional si necesitas compilar assets o manejar el frontend).

## Instalación

### 1. Clonar el repositorio

`git clone https://github.com/tu-usuario/portal-de-noticias.git`
`cd portal-de-noticias`

### 2. Instalar dependencias
- Instalar dependencias de PHP

`composer install`

- Instalar dependencias de JavaScript

`npm install`
`npm run dev`

### 3. Configurar archivo `.env`

- Copia el archivo `.env.example` a `.env` y configura tus parámetros de conexión a la base de datos.

`cp .env.example .env`

- Modifica las siguientes variables en el archivo `.env`:

`DB_CONNECTION=mysql`
`DB_HOST=127.0.0.1`
`DB_PORT=3306`
`DB_DATABASE=nombre_de_base_de_datos`
`DB_USERNAME=tu_usuario`
`DB_PASSWORD=tu_contraseña`

### 4. Generar la clave de la aplicación
 `php artisan key:generate`

### 5. Ejecutar migraciones y sembrar la base de datos
`php artisan migrate --seed`

Esto configurará las tablas necesarias en la base de datos e insertará datos de ejemplo, incluidos usuarios predeterminados para administración.

## Rutas y Roles
El sistema utiliza tres roles:

-   **Admin**: Acceso total al panel de administración y todas las funciones.
-   **Editor**: Puede editar los posts, pero no tiene acceso total al panel de administración.
-   **User**: Puede leer posts y comentar, pero no puede editar contenido.

### Rutas principales:

-   **Página principal**: `/` (Página de inicio del portal de noticias).
-   **Dashboard de administración**: `/admin` (Acceso al panel de administración de Voyager).
-   **Login**: `/login` (Página de inicio de sesión).
-   **Registro**: `/register` (Página de registro de usuario).
-   **Artículos**: `/posts/{slug}` (Ver un artículo específico).
-   **Crear Artículo**: `/admin/posts/create` (Para crear un nuevo artículo, disponible para admins y editores).
-   **Comentarios**: Los usuarios pueden comentar en los artículos. Los administradores pueden moderar los comentarios.
-   **Notificaciones**: `/notificaciones/{id}` (Visualiza las notificaciones de los usuarios).
## Funcionalidades
### 1. Sistema de Comentarios

Los usuarios pueden dejar comentarios en los artículos, y estos pueden ser moderados por los administradores. Los administradores tienen la capacidad de aprobar, rechazar o eliminar comentarios.

### 2. Sistema de Notificaciones

Las notificaciones se almacenan en la base de datos y se muestran a los usuarios cuando hay nuevos posts o cambios importantes. El sistema está integrado con las operaciones CRUD y las acciones de comentarios.

### 3. Roles y Permisos

El sistema está protegido por un sistema de roles, donde:

-   **Admins** tienen acceso completo al sistema, incluida la creación y edición de artículos, gestión de comentarios y usuarios.
-   **Editors** pueden editar artículos, pero no tienen acceso al sistema de gestión de usuarios.
-   **Users** pueden interactuar con el portal, leer noticias y dejar comentarios.

### 4. Búsqueda y Filtros de Artículos

Los usuarios pueden buscar artículos por categorías y utilizar filtros para encontrar contenido relevante.

***
Este README ahora cubre todas las características principales del proyecto, proporcionando una guía para los usuarios y colaboradores.
