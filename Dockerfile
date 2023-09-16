FROM richarvey/nginx-php-fpm:3.1.6

LABEL maintainer="Ali00h"
ENV RUN_SCRIPTS=1

# Install NPM
RUN apk add --update npm
# End

# Create Log Directory
RUN mkdir /var/log/cronlog
RUN chmod 755 /var/log/cronlog
# End

# Copy laravel for reports
RUN mkdir /var/www/html/webui
COPY code/webui/ /var/www/html/webui/
WORKDIR /var/www/html/webui/
RUN composer install
RUN npm install
RUN npm run dev
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

# Create remove_old_log.sh for add time to log
COPY config/remove_old_log.sh /var/www/html/remove_old_log.sh
RUN chmod +x /var/www/html/remove_old_log.sh
# End
