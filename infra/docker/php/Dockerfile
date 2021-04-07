FROM php:8.0-fpm-buster
LABEL maintainer="ucan-lab <yes@u-can.pro>"
SHELL ["/bin/bash", "-oeux", "pipefail", "-c"]

# timezone environment
ENV TZ=UTC \
  # locale
  LANG=en_US.UTF-8 \
  LANGUAGE=en_US:en \
  LC_ALL=en_US.UTF-8 \
  # composer environment
  COMPOSER_ALLOW_SUPERUSER=1 \
  COMPOSER_HOME=/composer

COPY --from=composer:2.0 /usr/bin/composer /usr/bin/composer

RUN apt-get update && \
  apt-get -y install git libicu-dev libonig-dev libzip-dev unzip locales && \
  apt-get clean && \
  rm -rf /var/lib/apt/lists/* && \
  locale-gen en_US.UTF-8 && \
  localedef -f UTF-8 -i en_US en_US.UTF-8 && \
  mkdir /var/run/php-fpm && \
  docker-php-ext-install intl pdo_mysql zip bcmath && \
  composer config -g process-timeout 3600 && \
  composer config -g repos.packagist composer https://packagist.org
  
ENV NODE_VERSION 15.0.1
  
# RUN ARCH= && dpkgArch="$(dpkg --print-architecture)" \
#     && case "${dpkgArch##*-}" in \
#     amd64) ARCH='x64';; \
#     ppc64el) ARCH='ppc64le';; \
#     s390x) ARCH='s390x';; \
#     arm64) ARCH='arm64';; \
#     armhf) ARCH='armv7l';; \
#     i386) ARCH='x86';; \
#     *) echo "unsupported architecture"; exit 1 ;; \
#     esac \
#     && set -ex \
#     && curl -fsSLO --compressed "https://nodejs.org/dist/v$NODE_VERSION/node-v$NODE_VERSION-linux-$ARCH.tar.xz" \
#     && tar -xJf "node-v$NODE_VERSION-linux-$ARCH.tar.xz" -C /usr/local --strip-components=1 --no-same-owner \
#     && rm "node-v$NODE_VERSION-linux-$ARCH.tar.xz" \
#     && ln -s /usr/local/bin/node /usr/local/bin/nodejs \
#     && node --version \
#     && npm --version
    
# Install Node.js 13
RUN curl -sL https://deb.nodesource.com/setup_13.x | bash - \
 && apt install -y nodejs
  
COPY ./infra/docker/php/php-fpm.d/zzz-www.conf /usr/local/etc/php-fpm.d/zzz-www.conf
COPY ./infra/docker/php/php.ini /usr/local/etc/php/php.ini

WORKDIR /work/backend
