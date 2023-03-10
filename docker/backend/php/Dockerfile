FROM php:8.2-fpm
WORKDIR /usr/share/nginx/html/
RUN ln -sf /usr/share/zoneinfo/Asia/Tokyo /etc/localtime

RUN apt update

RUN apt-get -y install gcc make jq curl git

RUN docker-php-ext-install pdo_mysql

RUN apt-get install zip unzip

RUN apt-get clean all

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php -r "if (hash_file('SHA384', 'composer-setup.php') === trim(file_get_contents('https://composer.github.io/installer.sig'))) { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
    && php composer-setup.php\
    && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /usr/sbin/composer

RUN echo 'alias cd_doc_root="cd /usr/share/nginx/html/"' >> ~/.bashrc
RUN echo 'alias at="php artisan"' >> ~/.bashrc
RUN echo 'alias ll="ls -al"' >> ~/.bashrc

EXPOSE 9000
