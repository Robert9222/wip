#!/bin/sh
php bin/console doctrine:migrations:migrate --no-interaction
exec php-fpm