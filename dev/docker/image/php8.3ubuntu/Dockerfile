FROM ubuntu:22.04

ARG DEBIAN_FRONTEND=noninteractive
ENV TZ=GMT

RUN apt-get clean && apt-get -y update \
    && apt-get install -y fuse \
    && apt install libfuse2 \
    && apt-get install -y locales \
    curl \
    git \
    libmagickwand-dev \
    imagemagick \
    libmcrypt-dev \
  && locale-gen en_US.UTF-8

RUN apt-get install -y software-properties-common
RUN LC_ALL=en_US.UTF-8 add-apt-repository ppa:ondrej/php -y
RUN apt-get update && apt-get install -y php8.3 \
    php8.3-bcmath \
    php8.3-cli \
    php8.3-common \
    php8.3-curl \
    php8.3-dev \
    php8.3-fpm \
    php8.3-gd \
    php8.3-intl \
    php8.3-mbstring \
    php8.3-mysql \
    php8.3-opcache \
    php8.3-soap \
    php8.3-sqlite3 \
    php8.3-xml \
    php8.3-xmlrpc \
    php8.3-xsl \
    php8.3-zip \
    php8.3-xdebug \
    nano \
    vim

#RUN add-apt-repository universe
#RUN usermod -aG fuse $(whoami)
RUN apt-get update && apt-get install -y mysql-client
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN sed -i -e "s/pid =.*/pid = \/var\/run\/php8.3-fpm.pid/" /etc/php/8.3/fpm/php-fpm.conf \
    && sed -i -e "s/error_log =.*/error_log = \/proc\/self\/fd\/2/" /etc/php/8.3/fpm/php-fpm.conf \
    && sed -i -e "s/;daemonize\s*=\s*yes/daemonize = no/g" /etc/php/8.3/fpm/php-fpm.conf \
    && sed -i "s/listen = .*/listen = 9000/" /etc/php/8.3/fpm/pool.d/www.conf \
    && sed -i "s/;catch_workers_output = .*/catch_workers_output = yes/" /etc/php/8.3/fpm/pool.d/www.conf

ARG MYUID
ARG MYGUID
ARG MYUSER
ARG XDEBUG_REMOTE_HOST

RUN echo "xdebug.remote_enable=1" >> /etc/php/8.3/mods-available/xdebug.ini \
    && echo "xdebug.remote_autostart=on" >> /etc/php/8.3/mods-available/xdebug.ini \
    && echo "xdebug.idekey=PHPSTORM" >> /etc/php/8.3/mods-available/xdebug.ini \
    && echo "xdebug.client_host=host.docker.internal" >> /etc/php/8.3/mods-available/xdebug.ini \
    && echo "xdebug.log=/var/log/xdebug.log " >> /etc/php/8.3/mods-available/xdebug.ini \
    && echo "xdebug.start_with_request=yes" >> /etc/php/8.3/mods-available/xdebug.ini \
    && echo "xdebug.mode=develop,debug" >> /etc/php/8.3/mods-available/xdebug.ini \
    && echo "xdebug.max_nesting_level=1000 " >> /etc/php/8.3/mods-available/xdebug.ini \
    && echo "error_reporting=E_ALL" >> /etc/php/8.3/mods-available/error_reporting.ini

RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*
RUN update-alternatives --set php /usr/bin/php8.3

EXPOSE 9000
CMD ["php-fpm8.3"]
