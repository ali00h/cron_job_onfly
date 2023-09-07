#!/bin/bash


C_TEMP_LIST="$(printenv | grep -i 'cron_list')"
echo "$C_TEMP_LIST"
# Remove the string "CRON_URL_LIST=" from the temp variable
C_TEMP_LIST=${C_TEMP_LIST#CRON_LIST=}
# Separate the temp variable by "," and loop through each element
IFS=',' read -ra arr <<< "$C_TEMP_LIST"
for i in "${arr[@]}"; do
  # Trim any leading or trailing spaces from the element
  # i=$(echo "$i" | xargs)
  echo "$i"
  # Append the element to the result.txt file
  echo "$i >> /var/log/cronlog/`date +\%Y\%m\%d\%H\%M\%S`-cron.log 2>&1" >> /etc/crontabs/root
done

# start cronjob
# echo "* * * * * echo 'I love running my crons'" >> /etc/crontabs/root
crond -l 2 -f > /dev/stdout 2> /dev/stderr &
# end cronjob