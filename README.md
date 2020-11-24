<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Follow below instrucution to setup server side code

<ol>
    <li>To install laravel dependencies run "composer install"</li>
    <li>
        To install and setup redis server on ubuntu run following commands:-
        <br/>
        <ul>
            <li>sudo apt update</li>
            <li>sudo apt install redis-server</li>
            <li>sudo nano /etc/redis/redis.conf</li>
            <li>find "supervised" and update its value to "systemd" from "no" (As we are using ubuntu)</li>
            <li>sudo systemctl restart redis.service</li>
        </ul>
    </li>
</ol>
