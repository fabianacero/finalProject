NGINX, PHP and POSTGRES Environment
===================================

[![](https://images.microbadger.com/badges/image/fabianacero/finalproject.svg)](https://microbadger.com/images/fabianacero/finalproject "Get your own image badge on microbadger.com") [![](https://images.microbadger.com/badges/license/fabianacero/finalproject.svg)](https://microbadger.com/images/fabianacero/finalproject "Get your own license badge on microbadger.com")
![alt tag](https://github.com/fabianacero/finalProject/blob/master/images/finalProject.png?raw=true)
## USAGE

For this awesome project you need to run the following commands:


* *Run DB Container:*  

```bash
docker run --name pgdb -e POSTGRES_PASSWORD=C4mbi0 -d postgres
```

* *Run NGINX Container:*  

```bash
docker run -d --name ngxweb --link pgdb fabianacero/finalproject
```


* *Finally you can access your NGINX container from you web browser using the container's ip:*

```bash
docker inspect -f "{{ .NetworkSettings.Networks.bridge.IPAddress }}" ngxweb
```


* *If you want to put your domain you can add it to the host file. *Remember!* to replace yourdomain by your own:*

```bash
echo -e "$(docker inspect -f "{{ .NetworkSettings.Networks.bridge.IPAddress }}" ngxweb)\tyourdomain.com" >> /etc/hosts
```