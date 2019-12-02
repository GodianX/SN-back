# SN-back

## PRE
set up docker: min 6 GiB memory, 2 CPU cores

### System requirements

- Docker 

### Installation

`cd docker`

`docker-compose up -d --build`

`docker exec -it sn_php bash`

`cd /var/www/sn`

`composer install --prefer-dist`

`php bin/console d:m:m`

`http://localhost:1080/`

### Start after installation

`cd docker`

`docker-compose up -d`

`http://localhost:1080/`

### Stop

`cd docker`

`docker-compose down`

### All migrations and commands launch here:

`docker exec -it sn_php bash`

`cd /var/www/sn`

### Testing

`php bin/phpunit`
