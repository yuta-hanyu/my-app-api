.PHONY: help

build:
	docker compose -f docker-compose.yml build --no-cache

up:
	docker compose -f docker-compose.yml up --remove-orphans

in:
	docker compose exec app bash

down:
	docker compose down

composer-install:
	docker compose -f docker-compose.yml run php composer install

install:
	make composer-install

migrate:
	docker run --rm -v `pwd`/databases:/opt/src mysql:8.0 bash /opt/src/scripts/import_database_schema.sh -t my_app -d my_app -P 51111 -y

# autoload:
# docker compose exec app bash && cd my-app && composer dump-autoload

# composer dump-autoload
# php artisan cache:clear
# php artisan config:clear
# php artisan route:clear
# php artisan view:clear