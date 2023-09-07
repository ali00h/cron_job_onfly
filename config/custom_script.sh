#!/bin/bash

# start cronjob
echo "* * * * * echo 'I love running my crons'" >> /etc/crontabs/root
crond -l 2 -f > /dev/stdout 2> /dev/stderr &
# end cronjob