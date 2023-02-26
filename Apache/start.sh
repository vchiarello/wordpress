#!/bin/bash

/etc/init.d/php8.1-fpm start
apachectl $1 $2