FROM nginx:stable-alpine

ARG USER
ARG UID
ARG GID

RUN delgroup dialout
RUN addgroup -g ${GID} --system ${USER}
RUN adduser -G ${USER} --system -D -s /bin/sh -u ${UID} ${USER}

RUN sed -i "s/user  nginx/user ${USER}/g" /etc/nginx/nginx.conf

ADD ./configs/nginx/default.conf /etc/nginx/conf.d/