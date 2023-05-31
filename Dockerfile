FROM ubuntu:22.04


# Install cron
ARG DEBIAN_FRONTEND=noninteractive
RUN apt-get update -y \
  && apt-get install -y --no-install-recommends \
       cron \
       php8.1-fpm \
       php8.1-curl

COPY ./public/ /var/www/html/   
COPY config/entry.sh /home/entry.sh
RUN chmod +x /home/entry.sh


RUN touch /var/log/cron.log

# Setup cron job
RUN (crontab -l ; echo "* * * * * php /var/www/html/runJob.php > /var/log/cron.log") | crontab

# Run the command on container startup
CMD ["/bin/bash","/home/entry.sh"]