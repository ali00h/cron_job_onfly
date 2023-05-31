FROM ubuntu:latest

# Install cron
RUN apt-get update && apt-get -y install cron && apt-get -y install php8.1-fpm

# Create the log file to be able to run tail
RUN touch /var/log/cron.log

# Setup cron job
RUN (crontab -l ; echo "* * * * * echo "Hello world" >> /var/log/cron.log") | crontab

# Run the command on container startup
CMD cron && tail -f /var/log/cron.log