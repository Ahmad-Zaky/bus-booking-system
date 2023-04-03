.PHONY: help

CONTAINER_PHP=bus_booking_app
CONTAINER_DATABASE=bus_booking_mysql

VOLUME_DATABASE=

help: ## Print help.
	@awk 'BEGIN {FS = ":.*##"; printf "\nUsage:\n  make \033[36m<target>\033[0m\n\nTargets:\n"} /^[a-zA-Z_-]+:.*?##/ { printf "  \033[36m%-10s\033[0m %s\n", $$1, $$2 }' $(MAKEFILE_LIST)

ps: ## Show containers.
	@docker compose ps

build: ## Build all containers
	@docker build --no-cache .

start: ## Start all containers
	@docker compose up --force-recreate -d

fresh: stop destroy build start ## Destroy & recreate all containers

stop: ## Stop all containers
	@docker compose stop

restart: stop start ## Restart all containers

destroy: stop ## Destroy all containers
	@docker compose down
	@if [ "$(shell docker volume ls --filter name=${VOLUME_DATABASE} --format {{.Name}})" ]; then \
		@docker volume rm ${VOLUME_DATABASE}; \
	fi

optimize: ## Cache project
	docker exec ${CONTAINER_PHP} php artisan optimize

cache: ## Cache project
	docker exec ${CONTAINER_PHP} php artisan view:cache
	docker exec ${CONTAINER_PHP} php artisan config:cache
	docker exec ${CONTAINER_PHP} php artisan event:cache
	docker exec ${CONTAINER_PHP} php artisan route:cache

cache-clear: ## Clear cache
	docker exec ${CONTAINER_PHP} php artisan cache:clear
	docker exec ${CONTAINER_PHP} php artisan view:clear
	docker exec ${CONTAINER_PHP} php artisan config:clear
	docker exec ${CONTAINER_PHP} php artisan event:clear
	docker exec ${CONTAINER_PHP} php artisan route:clear

migrate: ## Run migration files
	docker exec ${CONTAINER_PHP} php artisan migrate

migrate-fresh: ## Clear database and run all migrations
	docker exec ${CONTAINER_PHP} php artisan migrate:fresh

logs: ## Print all docker logs
	docker compose logs -f

logs-php: ## Print all php container logs
	docker logs ${CONTAINER_PHP}

logs-database: ## Print all php container logs
	docker logs ${CONTAINER_DATABASE}

ssh-php: ## SSH inside php container
	docker exec -it ${CONTAINER_PHP} sh

ssh-database: ## SSH inside database container
	docker exec -it ${CONTAINER_DATABASE} sh

exec-php: ## SSH inside php container with bash
	docker exec -it ${CONTAINER_PHP} /bin/bash
