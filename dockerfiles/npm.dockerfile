FROM node:18.12.0-alpine3.16

ARG USER
ARG UID
ARG GID

ENV NPM_CONFIG_UPDATE_NOTIFIER false

RUN delgroup dialout
RUN deluser --remove-home node
RUN addgroup -g ${GID} --system ${USER}
RUN adduser -G ${USER} --system -D -s /bin/sh -u ${UID} ${USER}

WORKDIR /var/www/html
