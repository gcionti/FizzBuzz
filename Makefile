.PHONY: install
install: build start

.PHONY: build
build:
	docker compose build

.PHONY: start
start:
	test -f .env.dev || cp .env .env.dev
	docker compose up -d --no-build --remove-orphans --force-recreate --wait
	docker compose exec php composer install

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

.PHONY: check
check:
	docker compose exec php composer check

permissions:
	docker compose run -it -u root php sh -c "chown -R 1000:1000 /var/www/symfony"
	rm -rf var/cache/* .*.cache

