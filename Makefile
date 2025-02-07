.PHONY: menu
menu:
	@echo ""
	@echo "======================================="
	@echo "           Available Commands          "
	@echo "======================================="
	@echo "1) make start       - Start the environment with Docker and Composer"
	@echo "2) make database    - Create the database and apply migrations"
	@echo "3) make bash        - Access the PHP container"
	@echo "4) make restart     - Restart the environment"
	@echo "5) make down        - Stop and remove containers"
	@echo "6) make stop        - Stop running containers"
	@echo "7) make permissions - Fix application permissions"
	@echo "8) make test        - Run tests with PHPUnit"
	@echo "9) make execute    - Execute API with a test request"
	@echo ""
	@echo "Usage example: make start"
	@echo ""

.PHONY: start
start:
	test -f .env.dev || cp .env .env.dev
	docker compose up -d --remove-orphans --force-recreate --wait
	docker compose exec php composer install
	make database

.PHONY: database
database:
	docker compose exec php bin/console doctrine:database:create
	docker compose exec php bin/console doctrine:migrations:migrate --no-interaction
	docker compose exec php bin/console doctrine:database:create --env=test
	docker compose exec php bin/console doctrine:migrations:migrate --no-interaction --env=test

.PHONY: bash
bash:
	docker compose exec php sh

.PHONY: restart
restart: down start

.PHONY: down
down:
	docker compose down -v --remove-orphans

.PHONY: stop
stop:
	docker compose stop

.PHONY: permissions
permissions:
	docker compose run --rm -u root php sh -c "chown -R 1000:1000 /var/www/symfony"
	rm -rf var/cache/* .*.cache

.PHONY: test
test:
	docker compose exec php bin/phpunit

.PHONY: execute
execute:
	curl -X POST -H "Content-Type: application/json" -d '{"initial_number":1,"final_number":30}' http://localhost:8080/desafio/fizz/buzz