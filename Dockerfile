#link
#https://gameconsole-gwiyfpdd3q-uc.a.run.app

#Docker image path on google cloud
#us-central1-docker.pkg.dev/numberinquiry0/numberinquiry

#Eğer login olunması gerekiyorsa
#gcloud auth configure-docker us-central1-docker.pkg.dev
#Image push to path #  HOST-NAME/PROJECT-ID/REPOSITORY/IMAGE
#docker tag gameconsole europe-west1-docker.pkg.dev/numberinquiry0/console/gameconsole
#docker push europe-west1-docker.pkg.dev/numberinquiry0/console/gameconsole

#Docker image build and run
#docker build -t console .
#docker run -it -p 80:80 console

#docker run -it -p 80:80 console /bin/bash -c "apache2-foreground"

FROM php:7.4-apache
RUN apt-get update -y && apt-get install -y systemctl software-properties-common gnupg2 gnupg wget ca-certificates lsb-release #cron openssl zip unzip git

WORKDIR /var/www
COPY . /var/www

RUN chmod 777 -R /var/www
RUN a2enmod rewrite

ENV DEBIAN_FRONTEND noninteractive
ENV APACHE_DOCUMENT_ROOT /var/www

COPY ./console.conf /etc/apache2/sites-available/console.conf
RUN a2dissite 000-default.conf
RUN a2ensite console.conf

#RUN docker-php-ext-install pdo pdo_sqlite

#install mysql
#RUN apt update -y && apt upgrade -y
#RUN apt-key adv --keyserver keyserver.ubuntu.com --recv-keys 467B942D3A79BD29
#RUN wget https://dev.mysql.com/get/mysql-apt-config_0.8.20-1_all.deb
#RUN apt install ./mysql-apt-config_*_all.deb
#RUN dpkg-reconfigure mysql-apt-config
#RUN apt update -y && apt upgrade -y
#RUN apt install -y mysql-server
#RUN systemctl enable --now mysql
#RUN docker-php-ext-install pdo pdo_mysql

#RUN systemctl start apache2
#RUN systemctl start mysql
#RUN mysql -u root -e "create database gameconsole"
#RUN mysql -u root -p gameconsole < ./gameconsole.sql
#RUN mysql -u root -e "ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY '';"

#docker-php-ext-install pdo pdo_mysql
#apt-key adv --keyserver keyserver.ubuntu.com --recv-keys 467B942D3A79BD29

#RUN apt install -y mariadb-server

#WORKDIR /tmp
#RUN wget https://dev.mysql.com/get/mysql-apt-config_0.8.13-1_all.deb
#RUN apt install -y lsb-release
#RUN apt clean all
#RUN dpkg -i mysql-apt-config*
#RUN apt-get update

#RUN wget http://repo.mysql.com/mysql-apt-config_0.8.13-1_all.deb
#RUN apt-get install ./mysql-apt-config_0.8.13-1_all.deb
#RUN apt-get update

#RUN apt-get install -y mysql-server

CMD /bin/bash -c 'apache2-foreground'