include make/project.mk
-include local.mk

ENV ?= dev
USE_DOCKER ?= yes

ifeq ($(USE_DOCKER), yes)
include make/docker.mk
endif

PHP ?= php
COMPOSER ?= composer
SF_CONSOLE ?= $(PHP) bin/console

install: .env vendor/.dev assets

project: .env php assets

.env:
	$(file >> .env,APP_ENV=$(ENV))
	$(file >> .env,APP_DEBUG=true)
	$(file >> .env,APP_SECRET=4fe5a1a6488c591a4750fac8da20daeb)
	$(file >> .env,DOCKER_USER_ID=$(USER_ID))
	$(file >> .env,DOCKER_GROUP_ID=$(GROUP_ID))
	$(file >> .env,DOCKER_IP=$(DOCKER_IP))

vendor/.dev:
	@$(COMPOSER) install --no-interaction
	@touch vendor/.dev

php: vendor/.prod
	@$(SF_CONSOLE) cache:clear --env=$(ENV) --no-debug --no-warmup -n
	@$(SF_CONSOLE) cache:warmup --env=$(ENV) --no-debug -n

vendor/.prod:
	@$(COMPOSER) install --no-interaction --optimize-autoloader --no-dev --prefer-dist --no-scripts
	@touch vendor/.prod

assets:
	@$(SF_CONSOLE) assets:install --env=$(ENV) --no-debug -n

deploy:
	@$(SF_CONSOLE) doctrine:migrations:migrate --env=$(ENV) --no-debug -n

clean:
	$(info Cleaning...)
	@rm -rf var/cache/* || true
	@rm -f vendor/.dev || true
	@rm -f vendor/.prod || true
	$(info Done)

# Server

server: server-update server-stop git-pull project server-start deploy
	@echo Running $(ENV)

git-pull:
	@git pull origin master
