<p align="center">Defensoria Universitaria</p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Acerca de app-du

App-du es una aplicación web para la gestion de quejas en la defensoria universitaria, con un interfaz de usuario elegante
y facil de poner en marcha, con las siguientes funcionalidades:

- Registro de quejas.
- Generación automatica de documentos a través de formularios.
- Seguimiento del estado de las quejas.
- Reporte general y específica de las quejas.

## Requisitos

- Instalación de xampp (Gestor de servidor y base de datos).
- Instalación de composer para instalar Laravel.
- Instalación de Node js y npm para la parte del frontend atraves de nvm.
- Instalación de git.

## Instalación de la App-du
En esta sección se muestra como instalar la aplicación desde este repositorio en nuestra computadora local, asi como las conmfiguraciones que se tiene que tomar en cuenta.

Crear una carpeta en el cual se clonara el proyecto directamente del repositorio

```
git clone https://github.com/royantoni/app-du.git
```

Crear una base de datos en phpmyadmin con nombre llamada bddu

A continuación abrir el proyecto en un editor de codigo por ejm en Visual Studio Code, luego hacer una copia del archivo .env.example, renombrar el archivo copiado a .env y finalmente modificar el archivo de esta manera:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bddu
DB_USERNAME=root
DB_PASSWORD=
```
Echo esto generamos la clave de la aplicación de esta forma:

```
php artisan key:generate
```
Hacemos las migraciones respectivas a nuestra base de datos creada:

```
php artisan migrate
```
Instalamos las depencias del Frontend:

```
npm install
```

Ejecutamos nuestra aplicación con los siguiente comandos:

```
php artisan serve
npm run dev
```
Finalmente probamos la aplicación a través de un navegador

## Para actualizar cambios en el repositorio principal

Para agregar un nuevo proyecto en nuestro repositorio:

```
git init
git add README.md
git commit -m "Poyecto base"
git branch -M main
git remote add origin https://github.com/royantoni/app-du.git
git push -u origin main
```
Para agregar cambios a nuestro proyecto remoto

```
git remote add origin https://github.com/royantoni/app-du.git
git branch -M main
git push -u origin main
```



## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Colaboradores

- **Karen Sheyla**
- **Licenciada encargada**
- **Jefe de defensoria universitaria**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
