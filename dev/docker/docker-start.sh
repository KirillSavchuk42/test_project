#!/bin/bash

printf "\nStarting Docker containers:\033[0m\n"

docker-compose -p 'test_project' up -d
