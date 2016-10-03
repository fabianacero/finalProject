NGINX and PHP:  Combine two powerful tools to create this useful container
==============


## USAGE


For this exercise you need to run the following commands:

* *Run DB Container* docker run --name pgdb -e POSTGRES_PASSWORD=C4mbi0 -d postgres

* *Run NGINX Container* docker run -d --name ngxweb --link pgdb fabianacero/finalproject

Finally you can access your NGINX container from you web browser using the container's ip.

* docker inspect -f "{{ .NetworkSettings.Networks.bridge.IPAddress }}" ngxweb

