# SN-back

## PRE
set up docker: min 6 GiB memory, 2 CPU cores

### System requirements

- PHP 7.3
- Composer
- Docker 

### Installation

`cd docker`

`docker-compose up -d --build`

`cd ..`

`composer install`

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

`cd ..`

`cd sn`
