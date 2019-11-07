DOCKER_IP = $(shell docker network inspect bridge -f '{{ range .IPAM.Config }}{{ .Gateway }}{{ end }}')

USER_ID = $(shell id -u)
GROUP_ID = $(shell id -g)

PHP_BUILD_IMAGE  = $(REGISTRY)/lynx-team/docker/php:7.3

DOCKER_RUN = docker run --rm --init \
			 -v $(PWD):/opt/workdir \
			 --net sberbank-profile_default \
			 -e GOSU=yes \
			 -e USER_ID=$(USER_ID) \
			 -e GROUP_ID=$(GROUP_ID)

PHP_PARAMS =  -v composer:/home/$(CONTAINER_USER)/.composer \
			  -e PHP_CONF_MEMORY_LIMIT=2G

PHP = $(DOCKER_RUN) $(PHP_PARAMS) $(PHP_BUILD_IMAGE) php
COMPOSER = $(DOCKER_RUN) $(PHP_PARAMS) $(PHP_BUILD_IMAGE) composer

# Server docker-compose

ifeq ($(ENV), prod)
DOCKER_COMPOSE_FILE = docker-compose.prod.yml
endif

DOCKER_COMPOSE_FILE ?= docker-compose.yml
DOCKER_COMPOSE = docker-compose -f $(DOCKER_COMPOSE_FILE)

server-update:
	@$(DOCKER_COMPOSE) pull

server-start:
	@$(DOCKER_COMPOSE) up -d

server-stop:
	@$(DOCKER_COMPOSE) stop
