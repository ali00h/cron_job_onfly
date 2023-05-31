#!/bin/bash
printenv | grep -v "no_proxy" >> /var/www/html/.env

cron
tail -f /var/log/cron.log