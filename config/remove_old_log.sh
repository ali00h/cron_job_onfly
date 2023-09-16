#!/bin/bash

# Find each file in the directory
for file in /var/log/cronlog/*.log
do
    # Find the count of lines in the file and store it in x variable
    x=$(wc -l < "$file")

    # Check if x is greater than 100
    if [ $x -gt 100 ]
    then
        # Calculate y as the difference between x and 100
        y=$((x - 100))

        echo "$file"

        # Remove lines 3 to y+3 from the file
        sed -i '3,'$((y+3))'d' "$file"
    fi
done