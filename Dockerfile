FROM richarvey/nginx-php-fpm:3.1.6

LABEL maintainer="Ali00h"
ENV RUN_SCRIPTS=1

RUN mkdir /var/log/cronlog
RUN chmod 755 /var/log/cronlog

# Change startup script
COPY config/custom_script.sh /var/www/html/scripts/custom_script.sh
RUN chmod +x /var/www/html/scripts/custom_script.sh
# End change startup script

