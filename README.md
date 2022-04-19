
# Запуск:

* создайте пустой .env.local
* `docker-compose run test-symfony composer install`
* `docker-compose up -d`
* `docker-compose exec test-symfony bin/console d:m:m`
* `docker-compose exec test-symfony bin/console lexik:jwt:generate-keypair`
* http://localhost:8181/login
