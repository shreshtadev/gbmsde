# Deployment
## Installation

1. Install PHP 8.2
2. Install Mysql 8
3. Install Apache Server
4. Install Composer
5. composer install (--no-dev for production)
6. Put the application directory inside the server directory
7. cp .env.example .env ```php artisan key:generate```
8. ## Optional
   1. Install docker desktop for windows/mac
      1. Make sure docker is running before running the compose file.

### Starting the application (dev)
1. ```php artisan serve```

### Docker setup
1. Run the docker-compose file ``` docker-compose up --build -d ```

[reference deployment (https://www.iankumu.com/blog/how-to-deploy-laravel-on-apache-server/)]

