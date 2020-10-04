FROM php:7.4-fpm-alpine

ARG USER_ID=1000
ARG GROUP_ID=1000


ADD https://raw.githubusercontent.com/mlocati/docker-php-extension-installer/master/install-php-extensions /usr/local/bin/

RUN chmod uga+x /usr/local/bin/install-php-extensions && sync && \
    install-php-extensions \
        http \
        pdo_mysql \
        xdebug \
    && \
    php -v && \
    php -m

#COPY docker-xdebug-* /usr/local/bin/

ADD ./php.ini /usr/local/etc/php/conf.d/40-custom.ini

RUN grep -qE ^"${GROUP_ID}:x|:${GROUP_ID}:" /etc/group || addgroup -g"${GROUP_ID}" "${GROUP_ID}"
RUN grep -qE ^"${USER_ID}:x|x:${USER_ID}:" /etc/passwd || adduser "${GROUP_ID}" -u"${USER_ID}" -G"${GROUP_ID}" -D
#RUN adduser -D -H -u ${USER_ID} -s /bin/bash www-data -G www-data

WORKDIR /var/www

USER "${USER_ID}:${GROUP_ID}"


