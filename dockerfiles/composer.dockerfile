FROM composer:2

ARG USER
ARG UID
ARG GID

RUN delgroup dialout
RUN addgroup -g ${GID} --system ${USER}
RUN adduser -G ${USER} --system -D -s /bin/sh -u ${UID} ${USER}

WORKDIR /var/www/html
