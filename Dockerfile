FROM webdevops/php-nginx:centos-7
MAINTAINER Fabian Acero Garcia <acero01@gmail.com>
LABEL NGINX con PGSQL

# Creando vhost
ENV DOMAIN_NAME	fabianacero
RUN mkdir /etc/nginx/sites-available; mkdir /etc/nginx/sites-enabled
ADD vhost.conf /etc/nginx/sites-available/$DOMAIN_NAME.conf
RUN ln -s /etc/nginx/sites-available/$DOMAIN_NAME.conf /etc/nginx/sites-enabled/$DOMAIN_NAME.conf
RUN cp /etc/nginx/nginx.conf /etc/nginx/nginx.conf.bkp
RUN cat /etc/nginx/nginx.conf.bkp | sed 's/\/etc\/nginx\/conf\.d\/\*\.conf;/\/etc\/nginx\/sites-enabled\/\*\.conf;\n    server_names_hash_bucket_size 64;/g' > /etc/nginx/nginx.conf

# Configurando postgres
ENV PG_PASSWD=C4mbi0
RUN yum install php-pgsql -y
ADD index.php /app/index.php
ADD ndex.php  /usr/share/nginx/html/index.php