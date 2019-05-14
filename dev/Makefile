.DEFAULT_GOAL := help

.PHONY: help

help:
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

setup: ## setup the docker env
	@docker build -t jidoka1902/php:7.1 .
	@docker run --rm -w /html -v=`pwd`/../:/html jidoka1902/php:7.1 composer install
	@docker run --rm -w /html -v=`pwd`/../:/html jidoka1902/php:7.1 composer dump-autoload

cli: ## starts the php cli
	@docker run --rm -it -w /html -v=`pwd`/../:/html jidoka1902/php:7.1 sh

test: ## runs unit tests within the docker container
	@docker run --rm -w /html -v=`pwd`/../:/html jidoka1902/php:7.1 php vendor/bin/phpunit

stan: ## do phpstan code analyze
	@docker run --rm -w /html -v=`pwd`/../:/html jidoka1902/php:7.1 php vendor/bin/phpstan analyze src tests
