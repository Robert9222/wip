FROM php:8.2-apache
RUN apt-get clean && apt-get update \
    &&  apt-get install -y --no-install-recommends \
        apt-utils \
        git \
        libicu-dev \
        g++ \
        libpng-dev \
        libxml2-dev \
        libzip-dev \
        libonig-dev \
        libxslt-dev \
        unzip \
        libpq-dev \
        nodejs \
        npm \
        wget \
        apt-transport-https \
        lsb-release \
        ca-certificates \
        libfreetype-dev \
        libjpeg-dev \
        optipng \
        jpegoptim \
        pngquant \
        gifsicle \
        tcpdump \
        inetutils-ping \
        iproute2 \
        psmisc \
        vim \
        procps \
        libbz2-dev

RUN apt-get update && apt-get install -y apt-transport-https ca-certificates curl gnupg && \
    curl -sLf --retry 3 --tlsv1.2 --proto "=https" 'https://packages.doppler.com/public/cli/gpg.DE2A7741A397C129.key' | apt-key add - && \
    echo "deb https://packages.doppler.com/public/cli/deb/debian any-version main" | tee /etc/apt/sources.list.d/doppler-cli.list && \
    apt-get update && \
    apt-get -y install doppler

RUN curl -sS https://getcomposer.org/installer | php -- \
    &&  mv composer.phar /usr/local/bin/composer

# Instalacja rozszerzeń pdo_mysql
RUN docker-php-ext-install pdo_mysql
# Instaluj potrzebne zależności i rozszerzenia PHP
RUN apt-get update && apt-get install -y \
        libpq-dev \
        default-libmysqlclient-dev \
    && docker-php-ext-install \
        pdo pdo_mysql
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd
RUN pecl install apcu && docker-php-ext-enable apcu
RUN docker-php-ext-install soap
RUN docker-php-ext-install bcmath
RUN docker-php-ext-install bz2
RUN /bin/sh -c php bin/console doctrine:migrations:migrate --no-interaction
RUN npm install --global yarn
# Uruchom migracje (upewnij się, że konfiguracja bazy danych jest dostępna dla aplikacji)
WORKDIR /var/www/app/

# Ustaw domyślny port na 80
EXPOSE 80
