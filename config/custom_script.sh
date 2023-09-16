#!/bin/bash

C_TEMP_LIST="$(printenv | grep -i 'cron_list')"
echo "$C_TEMP_LIST"
# Remove the string "CRON_LIST=" from the temp variable
C_TEMP_LIST=${C_TEMP_LIST#CRON_LIST=}
# Separate the temp variable by "," and loop through each element
echo "0 * * * * /var/www/html/remove_old_log.sh > /dev/null 2>&1" > /etc/crontabs/root
IFS=',' read -ra arr <<< "$C_TEMP_LIST"
for i in "${arr[@]}"; do
  echo "$i"

  MD5_LOG_ORG="$(echo $i | md5sum)"
  MD5_LOG="${MD5_LOG_ORG:0:20}"
  echo "$MD5_LOG"
  
  # if Log file not exist
  if [ ! -f "/var/log/cronlog/$MD5_LOG.log" ]
  then
    echo "$i
---cronjobline---
" > "/var/log/cronlog/$MD5_LOG.log"
  fi  

  echo "$i 2>&1 | /var/www/html/timestamp.sh >> /var/log/cronlog/$MD5_LOG.log" >> /etc/crontabs/root
done

# start cronjob
crond -l 2 -f > /dev/stdout 2> /dev/stderr &
# end cronjob