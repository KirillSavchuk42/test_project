#!/bin/bash

envFile=.env

echo "Check $envFile file:"
if [ ! -f $envFile ]
then
    printf "\033[0;31mError: File $envFile not exists!\033[0m\n"
    echo "Please copy .env.example to $envFile:"
    echo "cp .env.example $envFile"
    echo "And set up your paths to projects"
    exit 0;
else
    echo ' - Export variables:'
    export $(cat $envFile)
    echo ' - OK'
fi

mysqlDirectory=$(pwd)/data/db/mysql5.7

printf "\n\033[0;32mChecking MySQL directory:\n"
if [ -d $mysqlDirectory ]
then
    echo " - Directory is already exists"
else
    mkdir -p $mysqlDirectory
    chmod 766 $mysqlDirectory
    echo " - Directory with 766 privileges is created"
fi

if [ ! -d "$DATADIR/mysql" ]; then

    for f in /docker-entrypoint-initdb.d/*; do
        case "$f" in
            *.sh)     echo "$0: running $f"; . "$f" ;;
            *.sql)    echo "$0: running $f"; "${mysql[@]}" < "$f"; echo ;;
            *.sql.gz) echo "$0: running $f"; gunzip -c "$f" | "${mysql[@]}"; echo ;;
            *)        echo "$0: ignoring $f" ;;
        esac
        echo
    done
fi

project_root=$CODE_DIR_APP
mkdir -p $project_root

mkdir -p $project_root/storage
chmod -R 777 $project_root/storage > /dev/null 2>/dev/null

printf "\nStarting Docker containers:\033[0m\n"

docker-compose -p 'test_project' up --build -d
