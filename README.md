<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Пошаговые инструкции:

Клонировать репозиторий (если еще не сделано)

Если вы еще не клонировали репозиторий проекта, выполните следующую команду:
```
git clone https://github.com/daniyalkozhakmet/masnaget/
cd <project-directory>
```
Установить зависимости

После того как вы скачаете проект, необходимо установить все необходимые зависимости через Composer. Это установит Laravel и все другие пакеты, от которых зависит ваш проект.
```
composer install
```
Настроить файл окружения
```
cp .env.example .env
```
Далее нужно настроить подключение к базе данных в файле .env.

Откройте файл .env и измените следующие строки, чтобы они соответствовали вашим данным для подключения к базе данных:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```
Запустить миграции

Теперь, когда подключение к базе данных настроено, вы можете запустить миграции. Это создаст необходимые таблицы в вашей базе данных.
```
php artisan migrate
```
Заполнить базу данных начальными данными

После выполнения миграций, вы можете заполнить базу данных начальными данными с помощью команды db:seed:
```
php artisan db:seed
```
После того как все настроено, вы можете запустить сервер разработки Laravel:
```
php artisan serve
```
