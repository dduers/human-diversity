#!/bin/bash

# variables
#dir_target=$PWD
docker_mariadb_container_name=humandiversity-web-mariadb-1
docker_mariadb_container_id=$(docker ps -aqf "name=^${docker_mariadb_container_name}$")
ssh_user=danield4@xsite.ch
database_name=danield4_humdiv
database_user=danield4_humdiv
database_host=danield4.mysql.db.internal
database_password=QUjqvXg5-s4WVjgxUnMN
database_charset=utf8mb4
database_collate=utf8mb4_unicode_ci
#rsync_config=("--delete-after;~/www/typo3-web/public/fileadmin;${dir_target}/public;")

# load remote database to local docker mariadb container
docker exec -i ${docker_mariadb_container_id} mariadb -e "DROP DATABASE IF EXISTS ${database_name}"
docker exec -i ${docker_mariadb_container_id} mariadb -e "CREATE DATABASE ${database_name} CHARACTER SET = '${database_charset}' COLLATE = '${database_collate}'"
ssh ${ssh_user} "mariadb-dump --user=${database_user} --host=${database_host} --password=${database_password} --lock-tables --databases ${database_name}" | docker exec -i ${docker_mariadb_container_id} mariadb -uroot ${database_name}

# rsync files
#for i in "${rsync_config[@]}";
#do
#    readarray -d ";" -t config <<< "$i"
#    mkdir -p ${config[2]}
#    rsync -chazr --stats --info=progress2 --info=name0 ${config[0]} ${ssh_user}:${config[1]} ${config[2]}
#done
