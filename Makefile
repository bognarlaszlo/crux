## Docker Compose management
up: down check-traefik ## Up containers
	docker compose up -d

down: ## Down containers
	docker compose down --remove-orphans

pull: ## Pull images
	docker compose pull

docker-network-create: ## Creates the traefik_proxy network
	docker network inspect traefik_proxy > /dev/null 2>&1 || docker network create traefik_proxy

check-traefik: ## Check if traefik proxy running
	@(docker ps | grep traefik_proxy) > /dev/null 2>&1 || echo "\n\n\033[0;31m* FIGYELEM!\n* Nem fut a traefik proxy, indítsd el az alábbi leírás alapján:\n* https://github.com/ingatlancom/.github-private/blob/master/docs/environment/configuration.md\n\n\033[0m"

## Project
install: down pull docker-network-create npm-install npm-build up composer-install

composer-install: ## Composer install
	docker compose run --rm php composer install

composer-require: ## Composer require
	docker compose run --rm php composer require $(pkg)

composer-update: ## Composer update
	docker compose run --rm php composer update

## Frontend assets
npm: ## General NPM commands
	docker compose run --rm node npm $(cmd)

npm-install: ## Install npm dependencies
	docker compose run --rm node npm i $(pkg)

npm-build: ## Build all assets
	docker compose run --rm node npm run dev

npm-watch: ## Watch all assets
	docker compose run --rm node npm run watch
