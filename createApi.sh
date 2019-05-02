#!/bin/bash
php artisan make:migration create$1s_table --create=$1s
php artisan make:seeder ${1^}sTableSeeder
php artisan make:model ${1^}
php artisan make:test ${1^}Test --unit
php artisan make:factory ${1^}Factory
php artisan make:request Store${1^}Request
php artisan make:controller ${1^}Controller --resource
php artisan make:resource ${1^}
php artisan migrate:fresh
php artisan db:seed
