#!/bin/bash
echo -e "---newlogdate:---"
echo -e `date +%d/%m/%Y\ %H:%M:%S`;
echo -e "---newlog:---"
while read x; do
    echo $x;
done