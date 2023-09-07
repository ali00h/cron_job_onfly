FROM richarvey/nginx-php-fpm:3.1.6

LABEL maintainer="Ali00h"
ENV RUN_SCRIPTS=1


# Change startup script
COPY config/custom_script.sh /var/www/html/scripts/custom_script.sh
RUN chmod +x /var/www/html/scripts/custom_script.sh
# End change startup script

