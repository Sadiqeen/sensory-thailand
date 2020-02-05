# sensory-thailand
=============================================================
show error
=============================================================
go to ./laradock/php-fpm/Dockerfile
add "COPY ./laravel.ini /usr/local/etc/php/conf.d" under line 318
go to ./laradock/php-laravel.ini
change "display_errors=Off" to "display_errors=On"

=============================================================
Run laradock
=============================================================
cd laradock
docker-compose up -d nginx mysql phpmyadmin workspace
docker-compose exec --user laradock workspace bash

=============================================================
force rebuild
=============================================================
docker-compose up -d --force-recreate --build php-fpm
