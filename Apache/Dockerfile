FROM httpd:2.4
RUN apt-get -y update
RUN apt-get -y install software-properties-common
RUN apt-get -y install gnupg
RUN apt-get -y install vim
#installazione certificati ubuntu per php on debian
#https://computingforgeeks.com/how-to-install-php-on-debian-linux-2/
RUN  apt install -y lsb-release ca-certificates apt-transport-https software-properties-common gnupg2
RUN apt update
RUN apt -y install curl
RUN apt -y upgrade
RUN apt install -y mariadb-client
RUN apt update
RUN echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" |  tee /etc/apt/sources.list.d/sury-php.list
RUN curl -fsSL  https://packages.sury.org/php/apt.gpg|  gpg --dearmor -o /etc/apt/trusted.gpg.d/sury-keyring.gpg
RUN apt update
RUN apt -y upgrade
RUN apt -y install php8.1 php8.1-mysql
RUN apt -y install php8.1-bcmath php8.1-fpm php8.1-xml php8.1-mysql php8.1-zip php8.1-intl php8.1-ldap php8.1-gd php8.1-cli php8.1-bz2 php8.1-curl php8.1-mbstring php8.1-pgsql php8.1-opcache php8.1-soap php8.1-cgi
RUN a2enmod proxy
RUN a2enmod proxy_fcgi
WORKDIR /var/www
RUN mkdir otherdomain
ADD apache2.conf /etc/apache2 
ADD info.php /var/www/html 
ADD 000-default.conf /etc/apache2/sites-available
ADD php-fpm.conf /etc/php/8.1/fpm
WORKDIR /usr/local/apache2/conf
RUN ln -s /etc/apache2/conf-enabled/ conf-enabled
RUN ln -s /etc/apache2/conf-available/ conf-available
RUN ln -s /etc/apache2/envvars envvars
RUN ln -s /etc/apache2/mods-available/ mods-available
RUN ln -s /etc/apache2/mods-enabled/ mods-enabled
RUN ln -s /etc/apache2/ports.conf ports.conf
RUN ln -s /etc/apache2/sites-available/ sites-available
RUN ln -s /etc/apache2/sites-enabled/ sites-enabled
RUN a2enmod rewrite
RUN mv httpd.conf httpd.conf.orig
COPY apache2.conf /usr/local/apache2/conf/httpd.conf
WORKDIR /run
RUN mkdir php-fpm
ADD start.sh /
WORKDIR /
RUN chmod 755 /start.sh
ENTRYPOINT ["/start.sh", "-D", "FOREGROUND"]


