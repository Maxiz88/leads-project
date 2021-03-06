<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Build project
Run:
- composer install

Configure your Database, then run:
- php artisan migrate
- php artisan snapshot:load lead-project-snapshot

Project uses Google Recaptcha 2 version, add your domain to Google configuration and set keys to env.php:
- NOCAPTCHA_SITEKEY=SITEKEY
- NOCAPTCHA_SECRET=SECRET

Configure mail options in env.php(use gmail host or other)
- MAIL_MAILER=smtp
- MAIL_HOST=smtp.gmail.com
- MAIL_PORT=465
- MAIL_USERNAME=USERNAME@gmail.com
- MAIL_PASSWORD=PASSWORD
- MAIL_ENCRYPTION=ssl
- MAIL_FROM_ADDRESS=null
- MAIL_FROM_NAME="${APP_NAME}"


Manager login credentials:
- email: maxiskosenko@gmail.com
- password: 123123123

Project uses Queue email notifications for manager on creating new lead. 
So for checking notifications change a manager email to your
