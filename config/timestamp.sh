#!/bin/bash
echo -e "---newlogdate:---"
echo -e `date +%Y-%m-%d\ %H:%M:%S`;
echo -e "---newlog:---"
while read x; do
    echo $x;
done