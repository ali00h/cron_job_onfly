FROM ubuntu:22.04

# Install cron
ARG DEBIAN_FRONTEND=noninteractive
RUN apt-get update -y \
  && apt-get install -y --no-install-recommends \
       cron \
       php8.1-fpm

# Create the log file to be able to run tail
RUN touch /var/log/cron.log

# Setup cron job
RUN (crontab -l ; echo "* * * * * echo "Hello world" >> /var/log/cron.log") | crontab

# Run the command on container startup
CMD cron && tail -f /var/log/cron.log
