#!/bin/bash
printenv | grep -i 'cron_' > /var/www/html/.env

cron
tail -f /var/log/cron.log