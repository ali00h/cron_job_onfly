#!/bin/bash

MAX_LINE_COUNT="$(printenv | grep -i 'log_max_line_count')"
MAX_LINE_COUNT=${MAX_LINE_COUNT#LOG_MAX_LINE_COUNT=}
echo "$MAX_LINE_COUNT"

# Find each file in the directory
for file in /var/log/cronlog/*.log
do
    # Find the count of lines in the file and store it in x variable
    x=$(wc -l < "$file")

    # Check if x is greater than MAX_LINE_COUNT
    if [ $x -gt "$MAX_LINE_COUNT" ]
    then
        # Calculate y as the difference between x and MAX_LINE_COUNT
        y=$((x - "$MAX_LINE_COUNT"))

        echo "$file"

        # Remove lines 3 to y+3 from the file
        sed -i '3,'$((y+3))'d' "$file"
    fi
done