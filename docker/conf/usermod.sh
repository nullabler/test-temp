#!/bin/sh

HTTP_UID_ORIGIN=$(id -u www-data)
HTTP_GID_ORIGIN=$(id -g www-data)

HTTP_UID=$(stat -c %u /var/www/html/)
HTTP_GID=$(stat -c %g /var/www/html/)

if [ $HTTP_UID != $HTTP_UID_ORIGIN ]; then
    usermod -u $HTTP_UID www-data
    find / \
        -path /var/www \
        -prune \
        -false \
        -o \
        -user $HTTP_UID_ORIGIN \
        -exec chown -h $HTTP_UID {} \;
fi

if [ $HTTP_GID != $HTTP_GID_ORIGIN ]; then
    groupmod -g $HTTP_GID www-data
    find / \
        -path /var/www \
        -prune \
        -false \
        -o \
        -group $HTTP_GID_ORIGIN \
        -exec chgrp -h $HTTP_GID {} \;
fi
