FROM richarvey/nginx-php-fpm:3.1.6

LABEL maintainer="Ali00h"
ENV RUN_SCRIPTS=1

# Create Log Directory
RUN mkdir /var/log/cronlog
RUN chmod 755 /var/log/cronlog
# End

# Copy laravel for reports
RUN mkdir /var/www/html/cron-logs
COPY public/cron-logs/ /var/www/html/cron-logs/
# End

# Copy Nginx Config
COPY config/nginx.conf /etc/nginx/sites-enabled/default.conf
# End

# Change startup script
COPY config/custom_script.sh /var/www/html/scripts/custom_script.sh
RUN chmod +x /var/www/html/scripts/custom_script.sh
# End

# Create timestamp.sh for add time to log
COPY config/timestamp.sh /var/www/html/timestamp.sh
RUN chmod +x /var/www/html/timestamp.sh
# End

