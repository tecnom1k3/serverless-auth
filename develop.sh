#!/usr/bin/env bash

# Create docker-compose command to run
COMPOSE="docker-compose"

# If we pass any arguments...
if [[ $# -gt 0 ]];then

    # If "composer" is used, pass-thru to "composer"
    # inside a new container
    if [[ "$1" == "composer" ]]; then
        shift 1
        ${COMPOSE} run --rm \
            -w /application \
            php-fpm \
            composer "$@"
    elif [[ "$1" == "test" ]]; then
        shift 1
        ${COMPOSE} run --rm \
            -w /application \
            php-fpm \
            ./vendor/bin/phpunit -v --debug --colors=auto tests
    elif [[ "$1" == "bash" ]]; then
        shift 1
        ${COMPOSE} run --rm \
            -w /application \
            php-fpm \
            bash
    elif [[ "$1" == "deploy" ]]; then
        shift 1
        ${COMPOSE} run --rm \
            -w /application \
            php-fpm \
            serverless deploy
    elif [[ "$1" == "remove" ]]; then
        shift 1
        ${COMPOSE} run --rm \
            -w /application \
            php-fpm \
            serverless remove
    elif [[ "$1" == "artisan" ]]; then
        shift 1
        ${COMPOSE} run --rm \
            -w /application \
            php-fpm \
            ./artisan "$@"
    # Else, pass-thru args to docker-compose
    else
        ${COMPOSE} "$@"
    fi

else
    ${COMPOSE} ps
fi
