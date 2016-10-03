FROM webdevops/php-nginx:centos-7
MAINTAINER Fabian Acero Garcia
LABEL NGINX con PGSQL
RUN yum install php-pgsql -y
ADD index.php /app/index.php