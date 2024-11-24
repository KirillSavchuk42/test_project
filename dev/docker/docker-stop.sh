#!/bin/bash

printf "\033[0;32mStoppping Docker containers:\n"
printf "\033[0m"

docker-compose -p 'test_project' down
