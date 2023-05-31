FROM ubuntu:22.04

# COPY ./public/ /var/www/html/   

# Install cron
ARG DEBIAN_FRONTEND=noninteractive
RUN apt-get update -y \
  && apt-get install -y --no-install-recommends \
       cron \
       php8.1-fpm

# Setup cron job
# RUN (crontab -l ; echo "* * * * * php /var/www/html/runJob.php > /dev/null 2>&1") | crontab

# Run the command on container startup
# CMD cron
