#!/bin/bash

while :
do

date +%Y-%m-%d%t%H:%M:%S >> log.txt
python fetch.py  >> log.txt
python mail.py >> log.txt
echo ' ' >>log.txt
sleep 1d

done
