FROM webdevops/php-nginx:centos-7
MAINTAINER Fabian Acero Garcia <acero01@gmail.com>
LABEL NGINX con PGSQL

ENV PG_PASSWD=C4mbi0
RUN yum install php-pgsql -y
ADD index.php /app/index.php